<?php
class Kasus_model
{
    private $db;
    private $columns;
    private $columns_kemiskinan;
    private $columns_bantuan;

    public function __construct()
    {
        $this->db = new Database;
        list($this->columns, $this->columns_kemiskinan, $this->columns_bantuan) = $this->initializeColumns();
    }
    public function initializeColumns()
    {
        $columns = array();
        $columns_kemiskinan = array();
        $columns_bantuan = array();
        for ($indeks_kolom = 1; $indeks_kolom <= 41; $indeks_kolom++) {
            $str = "K" . $indeks_kolom;
            array_push($columns, $str);
            if ($indeks_kolom >= 1 && $indeks_kolom <= 23) {
                array_push($columns_kemiskinan, $str);
            } else {
                array_push($columns_bantuan, $str);
            }
        }
        return array($columns, $columns_kemiskinan, $columns_bantuan);
    }

    /*
    FUNCTION untuk memisahkan label dan value dari kasus baru
    */
    public function splitLabelValue($case)
    {
        $kasusbaru_original = array();
        $kasusbaru_transform = array();
        foreach ($this->columns as $column) {
            $input = explode("*", $case[$column]);
            $kasusbaru_transform[$column] = $input[0];
            if (count($input) == 2) {
                //kolom kategori
                $kasusbaru_original[$column] = $input[1];
            } else {
                //kolom numerik
                $kasusbaru_original[$column] = $input[0];
            }
        }
        return array($kasusbaru_transform, $kasusbaru_original);
    }
    public function findMaxMinColumn($column, $data_obesitas)
    {
        $min = 999;
        $max = 0;
        foreach ($data_obesitas as $indeks_kasus  => $kasus) {
            $val = floatval($kasus[$column]);
            if ($val < $min) {
                $min = $val;
            }
            if ($val > $max) {
                $max = $val;
            }
        }
        return array($max, $min);
    }

    public function euclidNorm($vector)
    {
        $sum = 0;
        foreach ($this->columns as $column) {
            $sum += pow($vector[$column], 2);
        }
        $norm_vector = sqrt($sum);
        return $norm_vector;
    }
    public function cosineSimilarity($u, $v)
    {
        $dot_sum = 0;
        //find u.v
        foreach ($this->columns as $column) {
            $dot_sum += $u[$column] * $v[$column];
        }
        //find |u| & |v|
        $norm_u = $this->euclidNorm($u);
        $norm_v = $this->euclidNorm($v);
        //find cosine
        $cosine_distance = $dot_sum / ($norm_u * $norm_v);

        return $cosine_distance;
    }
    public function findClosestCluster($kasusbaru_transform, $centroids)
    {
        $distance_case_to_centroids = array();
        foreach ($centroids as $centroid) {
            $cosine_distance = $this->cosineSimilarity($kasusbaru_transform, $centroid);
            array_push($distance_case_to_centroids, array($centroid['kluster'] => $cosine_distance));
        }
        //cari jarak cosine paling maksimum
        $max = -1;
        $kluster = 0;
        foreach ($distance_case_to_centroids as $indeks  => $cosine_distance) {
            foreach ($cosine_distance as $idx_kluster  => $cos) {
                if ($cos > $max) {
                    $max = $cos;
                    $kluster = $idx_kluster;
                }
            }
        }
        return $kluster;
    }

    public function weightedSum($bobot_fitur)
    {
        $sum = 0;
        foreach ($this->columns as $column) {
            $sum += pow($bobot_fitur[$column], 2);
        }
        return $sum;
    }
    public function euclideanDistance($vector_a, $vector_b, $type)
    {
        $sum = 0;
        $columns = array();
        if ($type == "tingkat_kemiskinan") {
            $columns = $this->columns_kemiskinan;
        } elseif ($type == "program_bantuan") {
            $columns = $this->columns_bantuan;
        }
        foreach ($columns as $column) {
            $sum += pow(($vector_a[$column] - $vector_b[$column]), 2);
        }
        $dist = sqrt($sum);
        return $dist;
    }
    public function findSolution($kasusbaru_transform, $basis_kasus, $jumlahK)
    {
        /*
        Jarak euclidean distance K1 - K23 --> untuk tingkat kemiskinan
        Jarak euclidean distance K24 - K41 --> untuk bantuan program
        */

        // Hitung jarak euclidean untuk menentukan tingkat kemiskinan
        $similarity_cases_kemiskinan = array();
        $K_case_tetangga_kemiskinan = array();
        foreach ($basis_kasus as $indeks_kasus  => $kasus) {
            $sim_case = $this->euclideanDistance($kasus, $kasusbaru_transform, "tingkat_kemiskinan");
            array_push($similarity_cases_kemiskinan, array($kasus['id_basiskasus'] => $sim_case));
        }
        // urutkan similarity case dari terkecil ke terbesar, cari k tetangga terdekat
        $temp = array();
        for ($i = 0; $i < count($similarity_cases_kemiskinan) - 1; $i++) {
            for ($j = 0; $j < count($similarity_cases_kemiskinan) - $i - 1; $j++) {
                $value_a = $similarity_cases_kemiskinan[$j][key($similarity_cases_kemiskinan[$j])];
                $value_b = $similarity_cases_kemiskinan[$j + 1][key($similarity_cases_kemiskinan[$j + 1])];
                if ($value_a > $value_b) {
                    $temp = $similarity_cases_kemiskinan[$j];
                    $similarity_cases_kemiskinan[$j] = $similarity_cases_kemiskinan[$j + 1];
                    $similarity_cases_kemiskinan[$j + 1] = $temp;
                }
            }
        }
        // memasukkan sejumlah k kasus tetangga yang memiliki jarak terpendek
        for ($indeks_K = 0; $indeks_K < $jumlahK; $indeks_K++) {
            $id = key($similarity_cases_kemiskinan[$indeks_K]);
            foreach ($basis_kasus as $indeks_kasus  => $kasus) {
                if ($kasus['id_basiskasus'] == $id) {
                    array_push($K_case_tetangga_kemiskinan, $kasus);
                    // masukkan nilai perhitungan jaraknya juga
                    // $K_case_tetangga_kemiskinan[count($K_case_tetangga_kemiskinan) - 1]['similarity'] = (1 / $similarity_cases_kemiskinan[$indeks_K][$id]) * 100;
                    $K_case_tetangga_kemiskinan[count($K_case_tetangga_kemiskinan) - 1]['similarity'] = $similarity_cases_kemiskinan[$indeks_K][$id];
                    break;
                }
            }
        }
        // voting untuk tingkat kemiskinan
        $votes_tingkat_kemiskinan = array();
        foreach ($K_case_tetangga_kemiskinan as $indeks_kasus => $case) {
            if (!isset($votes_tingkat_kemiskinan[$case['Class']])) {
                $votes_tingkat_kemiskinan[$case['Class']] = 1;
            } else {
                $votes_tingkat_kemiskinan[$case['Class']]++;
            }
        }
        $tingkat_kemiskinan = array_search(max($votes_tingkat_kemiskinan), $votes_tingkat_kemiskinan);


        // Hitung jarak euclidean untuk menentukan program bantuan
        $similarity_cases_bantuan = array();
        $K_case_tetangga_program_bantuan = array();

        foreach ($basis_kasus as $indeks_kasus  => $kasus) {
            $sim_case = $this->euclideanDistance($kasus, $kasusbaru_transform, "program_bantuan");
            array_push($similarity_cases_bantuan, array($kasus['id_basiskasus'] => $sim_case));
        }
        // urutkan similarity case dari terkecil ke terbesar, cari k tetangga terdekat
        $temp = array();
        for ($i = 0; $i < count($similarity_cases_bantuan) - 1; $i++) {
            for ($j = 0; $j < count($similarity_cases_bantuan) - $i - 1; $j++) {
                $value_a = $similarity_cases_bantuan[$j][key($similarity_cases_bantuan[$j])];
                $value_b = $similarity_cases_bantuan[$j + 1][key($similarity_cases_bantuan[$j + 1])];
                if ($value_a > $value_b) {
                    $temp = $similarity_cases_bantuan[$j];
                    $similarity_cases_bantuan[$j] = $similarity_cases_bantuan[$j + 1];
                    $similarity_cases_bantuan[$j + 1] = $temp;
                }
            }
        }
        // memasukkan sejumlah k kasus tetangga yang memiliki jarak terpendek
        for ($indeks_K = 0; $indeks_K < $jumlahK; $indeks_K++) {
            $id = key($similarity_cases_bantuan[$indeks_K]);
            foreach ($basis_kasus as $indeks_kasus  => $kasus) {
                if ($kasus['id_basiskasus'] == $id) {
                    array_push($K_case_tetangga_program_bantuan, $kasus);
                    // masukkan nilai perhitungan jaraknya juga
                    // $K_case_tetangga_program_bantuan[count($K_case_tetangga_program_bantuan) - 1]['similarity'] = (1 / $similarity_cases_bantuan[$indeks_K][$id]) * 100;
                    $K_case_tetangga_program_bantuan[count($K_case_tetangga_program_bantuan) - 1]['similarity'] = $similarity_cases_bantuan[$indeks_K][$id];
                    break;
                }
            }
        }
        // voting untuk program bantuan
        $votes_program_bantuan = array();
        foreach ($K_case_tetangga_program_bantuan as $indeks_kasus => $case) {
            if (!isset($votes_program_bantuan[$case['Bantuan']])) {
                $votes_program_bantuan[$case['Bantuan']] = 1;
            } else {
                $votes_program_bantuan[$case['Bantuan']]++;
            }
        }
        $nilai_voting = max($votes_program_bantuan);
        $program_bantuan = array_search($nilai_voting, $votes_program_bantuan);

        // Cek apakah dari hasil voting perlu direvise atau tidak (kalau hasil voting seri maka direvise, jika ada hasil voting yang berada di atasnya berarti tidak direvise)
        $message_revise = "";
        // menentukan seri atau tidaknya hasil voting
        if (count(array_unique($votes_program_bantuan)) == 1) {
            // revise
            $program_bantuan = "";
            $message_revise .= '- Kasus baru tidak menemukan solusi untuk program bantuan prioritas dari hasil voting <br>';
            $message_revise .= '- Silahkan lakukan revisi pada kasus baru untuk menentukan program bantuan prioritas';
        }
        // if (count(array_unique($votes_tingkat_kemiskinan)) == 1) {
        //     // revise
        //     $tingkat_kemiskinan = "";
        //     $message_revise .= '- Kasus baru tidak menemukan solusi untuk tingkat kemiskinan dari hasil voting <br>';
        //     $message_revise .= '- Silahkan lakukan revisi pada kasus baru untuk menentukan tingkat kemiskinan <br>';
        // }


        return array($K_case_tetangga_kemiskinan, $K_case_tetangga_program_bantuan, $tingkat_kemiskinan, $program_bantuan, $message_revise);
    }
    public function embeddedSolution($kasusbaru_transform, $solution_case)
    {
        $kasusbaru_transform['id_basiskasus'] = $solution_case['id_basiskasus'];
        $kasusbaru_transform['Class'] = $solution_case['Class'];
        $kasusbaru_transform['similarity'] = $solution_case['similarity'];
        $kasusbaru_transform['kluster'] = $solution_case['kluster'];
        return $kasusbaru_transform;
    }
    public function calculateThreshold($K_case_tetangga_program_bantuan)
    {
        $votes_program_bantuan = array();
        $similarity_program_bantuan = array();
        $sums_all_similarity = 0;
        foreach ($K_case_tetangga_program_bantuan as $indeks_kasus => $case) {
            $sums_all_similarity += $case['similarity'];
            if (!isset($votes_program_bantuan[$case['Bantuan']])) {
                $votes_program_bantuan[$case['Bantuan']] = 1;
                $similarity_program_bantuan[$case['Bantuan']] = $case['similarity'];
            } else {
                $votes_program_bantuan[$case['Bantuan']] += 1;
                $similarity_program_bantuan[$case['Bantuan']] += $case['similarity'];
            }
        }
        $program_bantuan = array_search(max($votes_program_bantuan), $votes_program_bantuan);
        $similarity_threshold = $similarity_program_bantuan[$program_bantuan] / $sums_all_similarity;
        return array($similarity_threshold, $similarity_program_bantuan[$program_bantuan], $sums_all_similarity);
    }

    //DATABASE
    public function getSpecificKasusBaru($table, $id_kasusbaru_original)
    {
        $query = "SELECT * FROM $table WHERE id_kasusbaru_original=:id_kasusbaru_original";
        $this->db->query($query);
        $this->db->bind_param("id_kasusbaru_original", $id_kasusbaru_original);
        $this->db->execute();
        return $this->db->single();
    }
    public function insertKasusBaruOriginal($kasusbaru_original)
    {
        $query = "INSERT INTO kasusbaru_original VALUES ('',:gender,:age,:height,:weight,:FHO,:FAVC,:FCVC,:NCP,:CAEC,:SMOKE,:CH2O,:SCC,:FAF,:TUE,:CALC,:MTRANS,:revise)";
        $this->db->query($query);
        $this->db->bind_param("gender", $kasusbaru_original['gender']);
        $this->db->bind_param("age", $kasusbaru_original['age']);
        $this->db->bind_param("height", $kasusbaru_original['height']);
        $this->db->bind_param("weight", $kasusbaru_original['weight']);
        $this->db->bind_param("FHO", $kasusbaru_original['FHO']);
        $this->db->bind_param("FAVC", $kasusbaru_original['FAVC']);
        $this->db->bind_param("FCVC", $kasusbaru_original['FCVC']);
        $this->db->bind_param("NCP", $kasusbaru_original['NCP']);
        $this->db->bind_param("CAEC", $kasusbaru_original['CAEC']);
        $this->db->bind_param("SMOKE", $kasusbaru_original['SMOKE']);
        $this->db->bind_param("CH2O", $kasusbaru_original['CH2O']);
        $this->db->bind_param("SCC", $kasusbaru_original['SCC']);
        $this->db->bind_param("FAF", $kasusbaru_original['FAF']);
        $this->db->bind_param("TUE", $kasusbaru_original['TUE']);
        $this->db->bind_param("CALC", $kasusbaru_original['CALC']);
        $this->db->bind_param("MTRANS", $kasusbaru_original['MTRANS']);
        $this->db->bind_param("revise", "Success");
        $this->db->execute();
        $last_id = $this->db->lastID();
        return array($this->db->rowCount(), $last_id);
    }
    public function insertKasusBaruTransform($kasusbaru_transform, $id_kasusbaru_original)
    {
        $query = "INSERT INTO kasusbaru_transform VALUES ('',:gender,:age,:height,:weight,:FHO,:FAVC,:FCVC,:NCP,:CAEC,:SMOKE,:CH2O,:SCC,:FAF,:TUE,:CALC,:MTRANS,:Obesity,:kluster,:id_kasusbaru_original,:id_obesitas,:similarity)";
        $this->db->query($query);
        $this->db->bind_param("gender", $kasusbaru_transform['gender']);
        $this->db->bind_param("age", $kasusbaru_transform['age']);
        $this->db->bind_param("height", $kasusbaru_transform['height']);
        $this->db->bind_param("weight", $kasusbaru_transform['weight']);
        $this->db->bind_param("FHO", $kasusbaru_transform['FHO']);
        $this->db->bind_param("FAVC", $kasusbaru_transform['FAVC']);
        $this->db->bind_param("FCVC", $kasusbaru_transform['FCVC']);
        $this->db->bind_param("NCP", $kasusbaru_transform['NCP']);
        $this->db->bind_param("CAEC", $kasusbaru_transform['CAEC']);
        $this->db->bind_param("SMOKE", $kasusbaru_transform['SMOKE']);
        $this->db->bind_param("CH2O", $kasusbaru_transform['CH2O']);
        $this->db->bind_param("SCC", $kasusbaru_transform['SCC']);
        $this->db->bind_param("FAF", $kasusbaru_transform['FAF']);
        $this->db->bind_param("TUE", $kasusbaru_transform['TUE']);
        $this->db->bind_param("CALC", $kasusbaru_transform['CALC']);
        $this->db->bind_param("MTRANS", $kasusbaru_transform['MTRANS']);
        $this->db->bind_param("Obesity", $kasusbaru_transform['Obesity']);
        $this->db->bind_param("id_kasusbaru_original", $id_kasusbaru_original);
        $this->db->bind_param("kluster", $kasusbaru_transform['kluster']);
        $this->db->bind_param("id_obesitas", $kasusbaru_transform['id_obesitas']);
        $this->db->bind_param("similarity", $kasusbaru_transform['similarity']);
        $this->db->execute();
        return $this->db->rowCount();
    }
    public function deleteDataById($table, $id_column, $value_id_column)
    {
        $query = 'DELETE FROM ' . $table . ' WHERE ' . $id_column . '=:id_column';
        $this->db->query($query);
        $this->db->bind_param('id_column', $value_id_column);
        $this->db->execute();
        return $this->db->rowCount();
    }
}
