<?php
class Data extends Controller
{
    private $data;
    public function __construct()
    {
        $this->data = array();
        $this->data['title_web'] = "Data";
        $this->data['user_login'] = Session::getSession("login");
        $this->data['nav_list'] = $this->model("Navbar_list_model")->page_data();
        if ($this->data['user_login']['status_user'] == "User") {
            // Mengeluarkan fitur splitting dataset
            array_shift($this->data['nav_list']);
        }
        $this->data['daftar_kolom'] = $this->model("Data_model")->getAllColumns();
    }
    public function index()
    {
        $this->data['jumlah_data_penelitian'] = $this->model("Data_model")->getAmountData("data_asli");
        $this->data['jumlah_basis_kasus'] = $this->model("Data_model")->getAmountData("basis_kasus");
        $this->data['jumlah_kasus_uji'] = $this->model("Data_model")->getAmountData("kasus_uji");
        $this->view("templates/header", $this->data);
        $this->view("data/index", $this->data);
        $this->view("modals/data_modals", $this->data);
        $this->view("templates/footer");
    }
    public function data_original()
    {
        $this->data['daftar_data'] = $this->model("Data_model")->getAllData("data_asli");

        $this->view("templates/header", $this->data);
        $this->view("data/data-original", $this->data);
        $this->view("modals/data_modals");
        $this->view("templates/footer");
    }
    public function tambah_data()
    {
        if (!empty($_POST)) {
            // Transformasi data
            list($attribute, $encoding) = $this->model("Data_model")->transformasiData($_POST);
            // Input data transformasi
            $lastInsertedDataTransform = $this->model("Data_model")->insertNewKasus($encoding, "data_transform");
            $attribute['id_datatransformasi'] = $lastInsertedDataTransform;
            // input data asli
            $rowDataAsliInserted = $this->model("Data_model")->insertNewKasus($attribute, "data_asli");
            if ($rowDataAsliInserted > 0 && $lastInsertedDataTransform > 0) {
                Flasher::setFlash("Data Baru", "berhasil", "ditambahkan", "success");
            } else {
                Flasher::setFlash("Data Baru", "gagal", "ditambahkan", "danger");
            }
            header("Location: " . BASEURL . "data/data_original");
            exit;
        } else {
            Flasher::setFlash("Tambah Data Baru", "berhasil", "digagalkan melalui URL!", "success");
            header("Location: " . BASEURL . "data/");
            exit;
        }
    }
    public function data_transformasi()
    {
        $this->data['daftar_data'] = $this->model("Data_model")->getAllData("data_transform");
        $this->view("templates/header", $this->data);
        $this->view("data/data-transformasi", $this->data);
        $this->view("modals/data_modals");
        $this->view("templates/footer");
    }
    public function kasus_revisi()
    {
        $this->data['daftar_data'] = $this->model("Data_model")->getAllData("kasusbaru_original");
        $this->view("templates/header", $this->data);
        $this->view("data/kasus-revisi", $this->data);
        $this->view("modals/data_modals");
        $this->view("templates/footer");
    }
    public function splitting_data()
    {
        if (!empty($_POST)) {
            $this->data['daftar_data'] = $this->model("Data_model")->getAllData("data_transform");
            $error = $this->model("Data_model")->splittingData($_POST, $this->data['daftar_data']);
            if ($error['ifError'] == 0) {
                Flasher::setFlash("Pembagian Data Set", "berhasil", "dilakukan", "success");
            } else {
                Flasher::setFlash("Pembagian Data Set", "gagal", "dilakukan", "danger", $error['messages']);
            }
            header("Location: " . BASEURL . "data/");
            exit;
        } else {
            Flasher::setFlash("Pembagian Data Set", "berhasil", "digagalkan melalui URL!", "success");
            header("Location: " . BASEURL . "data/");
            exit;
        }
    }
    public function basis_kasus()
    {
        $this->data['daftar_data'] = $this->model("Data_model")->getAllData("basis_kasus");
        $this->data['title_web'] = "Basis Kasus";
        $this->view("templates/header", $this->data);
        $this->view("data/basis_kasus", $this->data);
        $this->view("modals/data_modals");
        $this->view("templates/footer");
    }
    public function kasus_uji()
    {
        $this->data['daftar_data'] = $this->model("Data_model")->getAllData("kasus_uji");
        $this->data['title_web'] = "Basis Kasus";
        $this->view("templates/header", $this->data);
        $this->view("data/kasus_uji", $this->data);
        $this->view("modals/data_modals");
        $this->view("templates/footer");
    }
    public function kasus_baru()
    {
        $this->data['daftar_data'] = $this->model("Data_model")->getAllDataKasusBaru();
        $this->data['title_web'] = "Kasus Baru";
        array_push($this->data['daftar_kolom'], "similarity");
        array_push($this->data['daftar_kolom'], "revise");

        $this->view("templates/header", $this->data);
        $this->view("data/kasus_baru", $this->data);
        $this->view("modals/data_modals");
        $this->view("templates/footer");
    }

    public function getKasusBaru()
    {
        if (isset($_POST['id'])) {
            $dict = array();
            $array_keys = array();

            $table_asli = $_POST['table_asli'];
            $id_column_asli = $_POST['id_column_asli'];
            $table_transform = $_POST['table_transform'];
            $id_column_transform = $_POST['id_column_transform'];
            $type = $_POST['type'];


            $data_transform = $this->model('Data_model')->getAllDataBy($table_transform, $id_column_transform, $_POST['id'])[0];
            $data_asli = $this->model('Data_model')->getAllDataBy($table_asli, $id_column_asli, $_POST['id'])[0];

            for ($i = 1; $i <= 41; $i++) {
                $str = 'K' . $i;
                array_push($array_keys, $str);
            }

            $dict['id_data'] = $data_asli[$id_column_asli];

            for ($i = 1; $i <= 3; $i++) {
                $str = "A" . $i;
                $dict[$str] = $data_asli[$str];
            }
            foreach ($array_keys as $key) {
                $dict[$key] = $data_asli[$key] . "*" . $data_transform[$key];
            }
            $dict['Class'] = $data_asli['Class'];
            $dict['Bantuan'] = $data_asli['Bantuan'];

            $columns = $this->model("Data_model")->getAllColumns();
            for ($index_column = 0; $index_column < count($columns); $index_column++) {
                $columns[$index_column] = $type . $columns[$index_column];
            }

            $dict['columns'] = $columns;
            echo json_encode($dict);
        } else {
            Flasher::setFlash("Akses", "berhasil", "digagalkan melalui URL!", "success");
            header("Location: " . BASEURL . "data/");
            exit;
        }
    }

    public function edit_kasusrevisi()
    {
        if (isset($_POST['btnSubmitData'])) {
            $_POST['input-type'] = "Kasus Baru";
            $_POST['input-date'] = date("Y-m-d");
            list($attributes, $encoding) = $this->model("Data_model")->transformasiData($_POST);
            $columns = $this->model("Data_model")->getAllColumns();

            $rowEditedDataAsli = $this->model("Data_model")->updateTable("kasusbaru_original", $columns, $attributes, 'id_kasusbaru_original', $_POST['id_data']);
            $rowEditedDataTransform = $this->model("Data_model")->updateTable("kasusbaru_transform", $columns, $encoding, 'id_kasusbaru_transform', $_POST['id_data']);

            if ($rowEditedDataAsli > 0  && $rowEditedDataTransform > 0) {
                // Simpan data kasus baru ke dalam basis kasus dan hapus data pada kasus revisi

                // Input data transformasi
                $lastInsertedDataTransform = $this->model("Data_model")->insertNewKasus($encoding, "data_transform");
                $attributes['id_datatransformasi'] = $lastInsertedDataTransform;
                // input data asli
                $rowDataAsliInserted = $this->model("Data_model")->insertNewKasus($attributes, "data_asli");

                if ($rowDataAsliInserted > 0 && $lastInsertedDataTransform > 0) {
                    // Delete data pada kasusbaru_original otomatis triger aktif pada kasusbaru_transform
                    $id_kasusbaru_original = $_POST['id_data'];

                    $rowKasusBaruOriginalDeleted = $this->model("Data_model")->deleteSpecificBy("kasusbaru_original", "id_kasusbaru_original", $id_kasusbaru_original);
                    if ($rowKasusBaruOriginalDeleted > 0) {
                        Flasher::setFlash("Revisi kasus", "berhasil", "dilakukan", "success");
                    } else {
                        Flasher::setFlash("Revisi kasus", "gagal", "dihapus!", "success");
                    }
                } else {
                    Flasher::setFlash("Input kasus revisi ke basis kasus", "gagal", "dilakukan", "danger");
                }
            } else {
                Flasher::setFlash("Revisi kasus", "gagal", "dilakukan", "danger");
            }
            header("Location: " . BASEURL . "data/kasus_revisi");
            exit;
        } else {
            Flasher::setFlash("Akses", "berhasil", "digagalkan melalui URL!", "success");
            header("Location: " . BASEURL . "data/");
            exit;
        }
    }
    public function edit_kasusbaru()
    {
        if (isset($_POST['btnSubmitData'])) {
            list($attributes, $encoding) = $this->model("Data_model")->transformasiData($_POST);
            $columns = $this->model("Data_model")->getAllColumns();
            $rowEditedDataAsli = $this->model("Data_model")->updateTable("data_asli", $columns, $attributes, 'id_data', $_POST['id_data']);
            $rowEditedDataTransform = $this->model("Data_model")->updateTable("data_transform", $columns, $encoding, 'id_data', $_POST['id_data']);
            if ($rowEditedDataAsli > 0  && $rowEditedDataTransform > 0) {
                Flasher::setFlash("Edit data", "berhasil", "dilakukan", "success");
            } else {
                Flasher::setFlash("Edit data", "gagal", "dilakukan", "danger");
            }
            header("Location: " . BASEURL . "data/data_original");
            exit;
        } else {
            Flasher::setFlash("Edit data baru", "tidak bisa", "dilakukan!", "danger");
            header("Location: " . BASEURL . "data/");
            exit;
        }
    }

    public function hapus_kasusbaru()
    {
        //rtrim url
        $urls = $_GET['url'];
        $id = $this->model("Metode_model")->findLastNumberURL($urls);
        if ($id == 0) {
            //return back to home and get message
            Flasher::setFlash("Proses", "diinterupsi", "URL Abort", "danger");
            header("Location: " . BASEURL . "data/");
            exit;
        } else {
            //delete data_asli 
            $rowDeleteKasusBaruOriginal = $this->model("Kasus_model")->deleteDataById("data_asli", "id_data", $id);
            if ($rowDeleteKasusBaruOriginal > 0) {
                //berhasil delete
                Flasher::setFlash("Data", "berhasil", "dihapus", "success");
            } else {
                //gagal delete
                Flasher::setFlash("Data", "gagal", "dihapus", "danger");
            }
            header("Location: " . BASEURL . "data/data_original");
            exit;
        }
    }
    public function hapus_kasusrevisi()
    {
        //rtrim url
        $urls = $_GET['url'];
        $id = $this->model("Metode_model")->findLastNumberURL($urls);
        if ($id == 0) {
            //return back to home and get message
            Flasher::setFlash("Proses", "diinterupsi", "URL Abort", "danger");
            header("Location: " . BASEURL . "data/");
            exit;
        } else {
            //delete data_asli 
            $rowDeleteKasusBaruOriginal = $this->model("Kasus_model")->deleteDataById("kasusbaru_original", "id_kasusbaru_original", $id);
            if ($rowDeleteKasusBaruOriginal > 0) {
                //berhasil delete
                Flasher::setFlash("Data", "berhasil", "dihapus", "success");
            } else {
                //gagal delete
                Flasher::setFlash("Data", "gagal", "dihapus", "danger");
            }
            header("Location: " . BASEURL . "data/kasus_revisi");
            exit;
        }
    }
}
