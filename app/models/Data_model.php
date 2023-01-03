<?php
class Data_model
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }
    public function getAllData($tables)
    {
        $query = "SELECT * FROM $tables";
        $this->db->query($query);
        $this->db->execute();
        return $this->db->result_set();
    }
    public function getAmountData($table)
    {
        $query = "SELECT COUNT(*) AS amount FROM $table";
        $this->db->query($query);
        $this->db->execute();
        $data = $this->db->single();
        return $data['amount'];
    }
    public function getAllBasisKasusPerKluster($kluster)
    {
        $query = "SELECT * FROM basis_kasus WHERE kluster=:kluster";
        $this->db->query($query);
        $this->db->bind_param("kluster", $kluster);
        $this->db->execute();
        return $this->db->result_set();
    }
    public function getAllDataBy($table, $column, $value_column)
    {
        $query = "SELECT * FROM " . $table . " WHERE $column=:value_column";
        $this->db->query($query);
        $this->db->bind_param("value_column", $value_column);
        $this->db->execute();
        return $this->db->result_set();
    }
    public function getAllDataKasusBaruById($id_data)
    {
        $query = "SELECT * FROM data_asli AS da INNER JOIN data_transform AS dt ON da.id_datatransformasi = dt.id_data  WHERE da.id_data=:id_data";
        $this->db->query($query);
        $this->db->bind_param("id_data", $id_data);
        $this->db->execute();
        return $this->db->single();
    }

    public function getAllColumns()
    {
        $columns = array(
            'A1',
            'A2',
            'A3',
        );
        for ($i = 1; $i <= 41; $i++) {
            $attr_name = "K" . ($i);
            array_push($columns, $attr_name);
        }
        array_push($columns, "Class");
        array_push($columns, "Bantuan");
        return $columns;
    }
    public function transformasiData($postData)
    {
        $attributes = array();
        $encoding = array();
        // Pisahkan label dan encoding nya 
        $input = "input-";
        // Atribut A1-3
        for ($i = 1; $i <= 3; $i++) {
            $str = $input . "A" . $i;
            $attributes["A" . $i] = $postData[$str];
            $encoding["A" . $i] = $postData[$str];
        }
        // Atribut K1-K41
        for ($i = 1; $i <= 41; $i++) {
            $str = $input . "K" . $i;
            $value_input = explode('*', $postData[$str]);
            $attributes["K" . $i] = $value_input[0];
            $encoding["K" . $i] = $value_input[1];
        }
        // Atribute class
        $attributes['Class'] = $postData[$input . "Class"];
        $encoding['Class'] = $postData[$input . "Class"];
        // Attribute Program Bantuan Prioritas
        $attributes['Bantuan'] = $postData[$input . "Bantuan"];
        $encoding['Bantuan'] = $postData[$input . "Bantuan"];
        // Attribute Tanggal dan Type
        $attributes['date'] = $postData[$input . "date"];
        $encoding['date'] = $postData[$input . "date"];
        $attributes['type'] = $postData[$input . "type"];
        $encoding['type'] = $postData[$input . "type"];

        return array($attributes, $encoding);
    }


    public function insertNewKasus($data, $table)
    {
        $columns = $this->getAllColumns();

        $columns_table = "";
        for ($i = 1; $i <= 3; $i++) {
            $columns_table .= ":A" . $i . ",";
        }
        for ($i = 1; $i <= 41; $i++) {
            $columns_table .= ":K" . $i . ",";
        }
        $columns_table .= ":Class,:Bantuan";

        if ($table == "basis_kasus" || $table == "kasus_uji") {
            $columns_table .= ",:kluster";
            if ($table == "kasus_uji") {
                $columns_table .= ",:class_cbr,:class_cbrkmeans,:bantuan_cbr,:bantuan_cbrkmeans";
            }
            $query = "INSERT INTO " . $table . " VALUES (:id," . $columns_table . " )";
            $this->db->query($query);
            $this->db->bind_param("kluster", 0);
            if ($table == "kasus_uji") {
                $this->db->bind_param("class_cbr", null);
                $this->db->bind_param("class_cbrkmeans", null);
                $this->db->bind_param("bantuan_cbr", null);
                $this->db->bind_param("bantuan_cbrkmeans", null);
            }
        } elseif ($table == "data_asli" || $table == "data_transform") {
            if ($table == "data_asli") {
                array_unshift($columns, 'id_datatransformasi');
                $columns_table .= ",:date,:type";
                $query = "INSERT INTO " . $table . " VALUES (:id,:id_datatransformasi," . $columns_table . " )";
                $this->db->query($query);
                $this->db->bind_param("date", $data['date']);
                $this->db->bind_param("type", $data['type']);
            } else {
                $query = "INSERT INTO " . $table . " VALUES (:id," . $columns_table . " )";
                $this->db->query($query);
            }
        } elseif ($table == "kasusbaru_original" || $table == "kasusbaru_transform") {
            if ($table == "kasusbaru_original") {
                array_unshift($columns, "id_kasusbaru_transform");
                $columns_table .= ",:revise";

                $query = "INSERT INTO " . $table . " VALUES (:id,:id_kasusbaru_transform," . $columns_table . " )";
                $this->db->query($query);
                $this->db->bind_param("revise", $data['revise']);
            } else {
                $columns_table .= ",:kluster";
                $query = "INSERT INTO " . $table . " VALUES (:id," . $columns_table . " )";
                $this->db->query($query);
                $this->db->bind_param("kluster", $data['kluster']);
            }
        }
        $this->db->bind_param("id", null);
        foreach ($columns as $col) {
            $this->db->bind_param($col, $data[$col]);
        }
        $this->db->execute();

        return $this->db->lastID();
    }
    public function insertNilaiCentroidOptimal($centroids)
    {
        $delete_error = 0;
        //check kalau tabel pusat_kluster tidak kosong
        if ($this->getAmountData("pusat_kluster") != 0) {
            // Bersihkan tabel pusat_kluster
            $num_delete_1 = $this->deleteAllData("pusat_kluster");
            if ($num_delete_1 <= 0) {
                $delete_error = 1;
            }
        }
        $row_count = array();
        $columns_tables = "";
        for ($indeks_kolom = 1; $indeks_kolom <= 41; $indeks_kolom++) {
            $columns_tables .= ":K" . $indeks_kolom . ",";
        }
        $columns_tables .= ":kluster";
        foreach ($centroids as $indeks_centroid => $centroid) {
            $query = "INSERT INTO pusat_kluster VALUES ( " . $columns_tables . " )";
            $this->db->query($query);
            for ($indeks_kolom = 1; $indeks_kolom <= 41; $indeks_kolom++) {
                $str_col = "K" . $indeks_kolom;
                $this->db->bind_param($str_col, $centroid[$str_col]);
            }
            $this->db->bind_param("kluster", ($indeks_centroid + 1));
            $this->db->execute();
            array_push($row_count, $this->db->rowCount());
        }
        if (in_array(0, $row_count) || $delete_error == 1) {
            //occurs error
            return 0;
        } else {
            return 1;
        }
    }

    public function updateSolusiKasusUji($kasus_uji, $columns, $values_columns)
    {
        $concate_columns = "";
        for ($indeks_kolom = 0; $indeks_kolom < count($columns); $indeks_kolom++) {
            if ($indeks_kolom == count($columns) - 1) {
                $concate_columns .= $columns[$indeks_kolom];
                $concate_columns .= "=:";
                $concate_columns .= $columns[$indeks_kolom];
            } else {
                $concate_columns .= $columns[$indeks_kolom];
                $concate_columns .= "=:";
                $concate_columns .= $columns[$indeks_kolom];
                $concate_columns .= ",";
            }
        }
        $query = "UPDATE kasus_uji SET
                    $concate_columns
                WHERE id_kasusuji=:id_kasusuji";
        $this->db->query($query);
        foreach ($columns as $indeks_column  => $column) {
            $this->db->bind_param($column, $values_columns[$indeks_column]);
        }
        $this->db->bind_param("id_kasusuji", $kasus_uji['id_kasusuji']);
        $this->db->execute();
        return $this->db->rowCount();
    }
    public function updateTable($table, $columns, $values_columns, $id_condition, $value_id_condition)
    {
        $row_count = array();
        $concate_columns = "";
        for ($indeks_kolom = 0; $indeks_kolom < count($columns); $indeks_kolom++) {
            if ($indeks_kolom == count($columns) - 1) {
                $concate_columns .= $columns[$indeks_kolom];
                $concate_columns .= "=:";
                $concate_columns .= $columns[$indeks_kolom];
            } else {
                $concate_columns .= $columns[$indeks_kolom];
                $concate_columns .= "=:";
                $concate_columns .= $columns[$indeks_kolom];
                $concate_columns .= ",";
            }
        }
        $where_statement = $id_condition . "=:" . $id_condition;
        $query = "UPDATE $table SET
                    $concate_columns
                WHERE $where_statement";
        $this->db->query($query);
        foreach ($columns as $column) {
            $this->db->bind_param($column, $values_columns[$column]);
        }
        $this->db->bind_param($id_condition, $value_id_condition);
        $this->db->execute();
        return $this->db->rowCount();
    }
    public function updateKlusterBasisKasus($basisKasus)
    {
        $row_count = array();
        foreach ($basisKasus as $indeks_kasus  => $kasus) {
            $query = "UPDATE basis_kasus SET
                    kluster = :kluster
                WHERE id_basiskasus=:id_basiskasus";
            $this->db->query($query);
            $this->db->bind_param("kluster", $kasus['kluster']);
            $this->db->bind_param("id_basiskasus", $kasus['id_basiskasus']);
            $this->db->execute();
            $row = $this->db->rowCount();
            array_push($row_count, $row);
        }
        if (in_array(0, $row_count)) {
            //occurs error
            return 0;
        } else {
            return 1;
        }
    }
    public function deleteAllData($table)
    {
        $query = "DELETE FROM $table";
        $this->db->query($query);
        $this->db->execute();
        return $this->db->rowCount();
    }

    public function deleteSpecificBy($table, $id_column, $value_id_column)
    {
        $query = "DELETE FROM $table WHERE $id_column=:id_column";
        $this->db->query($query);
        $this->db->bind_param('id_column', $value_id_column);
        $this->db->execute();
        return $this->db->rowCount();
    }
    public function resetColumns($columns, $table, $values)
    {
        $concate_columns = "";
        for ($indeks_kolom = 0; $indeks_kolom < count($columns); $indeks_kolom++) {
            if ($indeks_kolom == count($columns) - 1) {
                $concate_columns .= $columns[$indeks_kolom];
                $concate_columns .= "=:";
                $concate_columns .= $columns[$indeks_kolom];
            } else {
                $concate_columns .= $columns[$indeks_kolom];
                $concate_columns .= "=:";
                $concate_columns .= $columns[$indeks_kolom];
                $concate_columns .= ",";
            }
        }
        $query = "UPDATE $table SET $concate_columns";
        $this->db->query($query);
        foreach ($columns as $indeks_column  => $column) {
            $this->db->bind_param($column, $values[$indeks_column]);
        }
        $this->db->execute();
        return $this->db->rowCount();
    }

    public function stratifiedRandomSampling($postData, $data)
    {
        $persenBasisKasus = $postData['inputJumlahDataLatih'];
        $persenKasusUji = $postData['inputJumlahDataUji'];

        $class_dictionary = array();
        $data_dictionary = array();

        // Acak posisi data
        for ($i = 0; $i < 1000; $i++) {
            shuffle($data);
        }
        // Hitung ada berapa data di tiap kelasnya dan kelompokkan data berdasarkan kelasnya
        foreach ($data as $datum) {
            $class = $datum['Bantuan'];
            if (!isset($class_dictionary[$datum['Bantuan']])) {
                $class_dictionary[$class] = 1;
                $data_dictionary[$class] = array();
            } else {
                $class_dictionary[$class]++;
            }
            array_push($data_dictionary[$class], $datum);
        }
        // Stratified random sampling
        $new_data = array();
        $new_data['basis_kasus'] = array();
        $new_data['kasus_uji'] = array();
        foreach ($class_dictionary as $key => $value) {
            $amount_data = count($data_dictionary[$key]);
            $n_basis_kasus = round($amount_data * $persenBasisKasus / 100);
            $n_kasus_uji = $amount_data - $n_basis_kasus;
            // Membagi basis kasus dengan kasus uji
            for ($indeks_kasus = 0; $indeks_kasus < $n_basis_kasus; $indeks_kasus++) {
                array_push($new_data['basis_kasus'], $data_dictionary[$key][$indeks_kasus]);
            }
            for ($indeks_kasus = $n_basis_kasus; $indeks_kasus < $amount_data; $indeks_kasus++) {
                array_push($new_data['kasus_uji'], $data_dictionary[$key][$indeks_kasus]);
            }
        }

        return $new_data;
    }

    public function splittingData($postData, $data)
    {
        $amount_data = $this->getAmountData("data_transform");
        $error = array(
            'ifError' => 0,
            'messages' => array()
        );
        //check kalau tabel basis kasus dan kasus uji tidak kosong
        if ($this->getAmountData("basis_kasus") != 0) {
            // Bersihkan tabel basis kasus
            $num_delete_1 = $this->deleteAllData("basis_kasus");
            if ($num_delete_1 <= 0) {
                $error['ifError'] = 1;
                array_push($error['messages'], "Terjadi kesalahan saat menghapus data basis kasus");
            }
        }
        if ($this->getAmountData("kasus_uji") != 0) {
            // Bersihkan tabel kasus uji
            $num_delete_2 = $this->deleteAllData("kasus_uji");
            if ($num_delete_2 <= 0) {
                array_push($error['messages'], "Terjadi kesalahan saat menghapus data uji");
            }
        }

        // Stratified randomsampling agar memastikan proporsi data di setiap kelas seimbang
        $new_data = $this->stratifiedRandomSampling($postData, $data);
        for ($indeks_kasus = 0; $indeks_kasus < count($new_data['basis_kasus']); $indeks_kasus++) {
            if ($this->insertNewKasus($new_data['basis_kasus'][$indeks_kasus], "basis_kasus") <= 0) {
                // error happens
                $error['ifError'] = 1;
                array_push($error['messages'], "Terjadi kesalahan saat menginput data ke basis kasus");
                break;
            }
        }
        for ($indeks_kasus = 0; $indeks_kasus < count($new_data['kasus_uji']); $indeks_kasus++) {
            if ($this->insertNewKasus($data[$indeks_kasus], "kasus_uji") <= 0) {
                //error happens
                $error['ifError'] = 1;
                array_push($error['messages'], "Terjadi kesalahan saat menginput data ke kasus uji");
                break;
            };
        }
        return $error;
    }
}
