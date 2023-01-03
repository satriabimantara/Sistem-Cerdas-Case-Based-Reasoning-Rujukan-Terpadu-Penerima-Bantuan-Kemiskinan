<?php
class Pengujian extends Controller
{
    private $data;
    private $threshold;
    public function __construct()
    {
        $this->data = array();
        $this->data['nav_list'] = $this->model("Navbar_list_model")->page_pengujian();
        if (Session::getSession("pengujian_kasusuji") == "True") {
            $str = ' <li class="nav-item"><a class="nav-link" href="' . BASEURL . 'pengujian/pengujian_kasusuji">Riwayat Kasus Uji</a></li>';
            array_push($this->data['nav_list'], $str);
        }
        if (Session::getSession("pengujian_kasusbaru") == "True") {
            $str = ' <li class="nav-item"><a class="nav-link" href="' . BASEURL . 'pengujian/pengujian_kasusbaru">Riwayat Kasus Baru</a></li>';
            array_push($this->data['nav_list'], $str);
        }
        $this->data['centroids'] = $this->model("Data_model")->getAllData("pusat_kluster");
        $this->data['daftar_data'] = $this->model("Data_model")->getAllData("basis_kasus");
        $this->data['daftar_kolom'] = $this->model("Data_model")->getAllColumns();
        $this->data['amount_data_uji'] = $this->model("Data_model")->getAmountData("kasus_uji");
        $this->data['user_login'] = Session::getSession("login");
    }
    public function index()
    {

        $this->data['title_web'] = "Pengujian";
        $this->view("templates/header", $this->data);
        $this->view("pengujian/index");
        $this->view("modals/pengujian_modals", $this->data);
        $this->view("templates/footer");
    }

    public function data_kasusbaru()
    {
        $this->data['daftar_data'] = $this->model("Data_model")->getAllDataBy("data_asli", "type", "Kasus Baru");
        $this->data['title_web'] = "Data Pengujian Kasus Baru";
        $this->view("templates/header", $this->data);
        $this->view("pengujian/data_kasusbaru", $this->data);
        $this->view("modals/pengujian_modals", $this->data);
        $this->view("templates/footer");
    }
    public function kasus_baru()
    {
        if (!empty($_POST)) {
            $this->data['type_cbr'] = $_POST['methodType'];
            $this->data['jumlahK'] = $_POST['jumlahK'];

            // Set Session
            Session::setSession('type_cbr', $this->data['type_cbr']);
            Session::setSession('jumlahK', $this->data['jumlahK']);

            //pisahkan antara label encoder dan valuenya
            list($this->data['kasusbaru_original'], $this->data['kasusbaru_transform']) = $this->model("Pengujian_model")->transformasiKasusBaru($_POST);

            if ($this->data['type_cbr'] == "CBR-KMeans") {
                //cari kluster terdekat 
                $indeks_kluster = $this->model("Kasus_model")->findClosestCluster($this->data['kasusbaru_transform'], $this->data['centroids']);
                $this->data['kluster_terdekat'] = $indeks_kluster;
                $basis_kasus = $this->model("Data_model")->getAllBasisKasusPerKluster($indeks_kluster);
                $this->data['kasusbaru_transform']['kluster'] = $indeks_kluster;
            } elseif ($this->data['type_cbr'] == "CBR") {
                $basis_kasus = $this->model("Data_model")->getAllData("basis_kasus");
                $this->data['kasusbaru_transform']['kluster'] = 0;
            }

            //cari solusi kasus_baru
            list($this->data['K_case_tetangga_kemiskinan'], $this->data['K_case_tetangga_program_bantuan'], $this->data['class_tingkat_kemiskinan'], $this->data['program_bantuan'], $this->data['message_revise']) = $this->model("Kasus_model")->findSolution($this->data['kasusbaru_transform'], $basis_kasus, $this->data['jumlahK']);

            $this->data['kasusbaru_original']['Bantuan'] = $this->data['program_bantuan'];
            $this->data['kasusbaru_original']['Class'] = $this->data['class_tingkat_kemiskinan'];
            $this->data['kasusbaru_transform']['Bantuan'] = $this->data['program_bantuan'];
            $this->data['kasusbaru_transform']['Class'] = $this->data['class_tingkat_kemiskinan'];

            // Set Session
            Session::setSession("K_case_tetangga_kemiskinan", $this->data['K_case_tetangga_kemiskinan']);
            Session::setSession("K_case_tetangga_program_bantuan", $this->data['K_case_tetangga_program_bantuan']);
            Session::setSession("class_tingkat_kemiskinan", $this->data['class_tingkat_kemiskinan']);
            Session::setSession("program_bantuan", $this->data['program_bantuan']);
            Session::setSession("message_revise", $this->data['message_revise']);
            Session::setSession("kasusbaru_original", $this->data['kasusbaru_original']);
            Session::setSession("kasusbaru_transform", $this->data['kasusbaru_transform']);

            if (!empty($this->data['message_revise'])) {
                Session::setSession("pengujian_kasusbaru", "False");

                // tidak ditemukan solusi,
                // simpan data kasus baru ke database
                $this->data['kasusbaru_original']['revise'] = "Revise";
                $lastInsertedDataTransform = $this->model("Data_model")->insertNewKasus($this->data['kasusbaru_transform'], "kasusbaru_transform");
                $this->data['kasusbaru_original']['id_kasusbaru_transform'] = $lastInsertedDataTransform;
                // input data asli
                $rowDataAsliInserted = $this->model("Data_model")->insertNewKasus($this->data['kasusbaru_original'], "kasusbaru_original");

                if ($rowDataAsliInserted > 0 && $lastInsertedDataTransform > 0) {
                    Flasher::setFlash("Solusi kasus baru", "tidak", "ditemukan! Silahkan revisi solusi kasus baru dengan ID " . $lastInsertedDataTransform, "success");
                    header("Location: " . BASEURL . "data/kasus_revisi");
                } else {
                    Flasher::setFlash("Kasus baru", "gagal", "disimpan!", "danger");
                    header("Location: " . BASEURL . "pengujian/kasus_baru");
                }
                exit;
            } else {
                Session::setSession("pengujian_kasusbaru", "True");
                $this->data['title_web'] = "Solusi Kasus Baru";
                $this->view("templates/header", $this->data);
                $this->view("pengujian/kasusbaru", $this->data);
                $this->view("modals/pengujian_modals", $this->data);
                $this->view("templates/footer");
            }
        } else {
            Flasher::setFlash("Pengujian kasus baru", "berhasil", "digagalkan melalui URL!", "success");
            header("Location: " . BASEURL . "pengujian/");
            exit;
        }
    }
    public function kasus_uji()
    {
        if (!empty($_POST)) {
            // set session pengujian kasus uji
            Session::setSession("pengujian_kasusuji", "True");

            $this->data['kasus_uji'] = $this->model("Data_model")->getAllData("kasus_uji");
            $this->data['jumlahK'] = $_POST['jumlahK'];
            /*
            Pengujian Kasus Uji CBR-KMeans
            */
            //reset kolom solusi_cbrkmeans pada kasus_uji
            $resetKolomKasusUji = $this->model("Data_model")->resetColumns(array("kluster", "class_cbr", "class_cbrkmeans", "bantuan_cbr", "bantuan_cbrkmeans"), "kasus_uji", array(0, "", "", "", ""));

            if ($resetKolomKasusUji > 0) {
                $start_time_cbr_kmeans = time();
                foreach ($this->data['kasus_uji'] as $kasus_uji) {
                    $indeks_kluster = $this->model("Kasus_model")->findClosestCluster($kasus_uji, $this->data['centroids']);
                    $basis_kasus = $this->model("Data_model")->getAllBasisKasusPerKluster($indeks_kluster);

                    //cari solusi kasus_uji
                    list($this->data['K_case_tetangga_kemiskinan'], $this->data['K_case_tetangga_program_bantuan'], $this->data['class_tingkat_kemiskinan'], $this->data['program_bantuan'], $this->data['message_revise']) = $this->model("Kasus_model")->findSolution($kasus_uji, $basis_kasus, $this->data['jumlahK']);

                    //update kasus_uji untuk kolom kluster, class_cbrkmeans, bantuan_cbrkmeans
                    $kluster = $indeks_kluster;
                    $class_cbrkmeans = $this->data['class_tingkat_kemiskinan'];
                    $bantuan_cbrkmeans = $this->data['program_bantuan'];

                    $rowUpdateKasusUjiCBRKMeans = $this->model("Data_model")->updateSolusiKasusUji($kasus_uji, array("kluster", "class_cbrkmeans", "bantuan_cbrkmeans"), array($kluster, $class_cbrkmeans, $bantuan_cbrkmeans));

                    if ($rowUpdateKasusUjiCBRKMeans == 0) {
                        //error, return to homepage
                        Flasher::setFlash("Update Solusi Kasus Uji CBR-KMeans", "gagal", "dilakukan", "danger");
                        header("Location: " . BASEURL . "pengujian/");
                        exit;
                    }
                }
                $end_time_cbr_kmeans = time();
                Session::setSession("waktu_cbrkmeans", gmdate("H:i:s", ($end_time_cbr_kmeans - $start_time_cbr_kmeans)));

                // pengujian kasus uji cbr
                $start_time_cbr = time();
                foreach ($this->data['kasus_uji'] as $kasus_uji) {
                    $basis_kasus = $this->model("Data_model")->getAllData("basis_kasus");

                    //cari solusi kasus_uji
                    list($this->data['K_case_tetangga_kemiskinan'], $this->data['K_case_tetangga_program_bantuan'], $this->data['class_tingkat_kemiskinan'], $this->data['program_bantuan'], $this->data['message_revise']) = $this->model("Kasus_model")->findSolution($kasus_uji, $basis_kasus, $this->data['jumlahK']);

                    //update kasus_uji untuk kolom kluster, solusi_cbrkmeans
                    $class_cbr = $this->data['class_tingkat_kemiskinan'];
                    $bantuan_cbr = $this->data['program_bantuan'];
                    $rowUpdateKasusUjiCBR = $this->model("Data_model")->updateSolusiKasusUji($kasus_uji, array("class_cbr", "bantuan_cbr"), array($class_cbr, $bantuan_cbr));

                    // if ($rowUpdateKasusUjiCBR == 0) {
                    //     //error, return to homepage
                    //     Flasher::setFlash("Update Solusi Kasus Uji CBR", "gagal", "dilakukan", "danger");
                    //     header("Location: " . BASEURL . "pengujian/");
                    //     exit;
                    // }
                }
                $end_time_cbr = time();
                Session::setSession("waktu_cbr", gmdate("H:i:s", ($end_time_cbr - $start_time_cbr)));
                Flasher::setFlash("Pengujian kasus uji", "berhasil", "dilakukan", "info");
                header("Location: " . BASEURL . "pengujian/pengujian_kasusuji");
                exit;
            } else {
                Flasher::setFlash("Proses reset kolom kasus uji", "gagal", "dilakukan", "info");
                header("Location: " . BASEURL . "pengujian/");
                exit;
            }
        } else {
            Flasher::setFlash("Pengujian kasus uji", "berhasil", "digagalkan melalui URL!", "success");
            header("Location: " . BASEURL . "pengujian/");
            exit;
        }
    }

    public function reuse()
    {
        //rtrim url
        $urls = $_GET['url'];
        $lastID = $this->model("Metode_model")->findLastNumberURL($urls);
        if ($lastID == 0) {
            //return back to home and get message
            Flasher::setFlash("Fase Reuse", "diinterupsi", "URL Abort", "success");
            header("Location: " . BASEURL . "pengujian/");
            exit;
        } else {
            // ambil data kasus baru yang baru disimpan
            $this->data['kasusbaru_original'] = $this->model("Kasus_model")->getSpecificKasusBaru("kasusbaru_original", $lastID);
            $this->data['kasusbaru_transform'] = $this->model("Kasus_model")->getSpecificKasusBaru("kasusbaru_transform", $lastID);
            //ambil data basis kasus yang bersesuaian
            $this->data['basis_kasus'] = $this->model("Data_model")->getSpecificKasus("basis_kasus", $this->data['kasusbaru_transform']['id_obesitas']);
            $this->data['kolom_kasusbaru'] = $this->model("Kasus_model")->initializeColumns();
            $this->data['kolom_basiskasus'] = $this->model("Data_model")->getAllColumns();

            $this->data['title_web'] = "Solusi Kasus Baru";
            $this->view("templates/header", $this->data);
            $this->view("pengujian/reuse", $this->data);
            $this->view("modals/pengujian_modals", $this->data);
            $this->view("templates/footer");
        }
    }

    public function pengujian_kasusbaru()
    {
        if (!empty(Session::getSession("pengujian_kasusbaru"))) {
            if (Session::getSession("pengujian_kasusbaru") == "True") {
                $this->data['program_bantuan'] = Session::getSession("program_bantuan");
                $this->data['class_tingkat_kemiskinan'] = Session::getSession("class_tingkat_kemiskinan");
                $this->data['K_case_tetangga_program_bantuan'] = Session::getSession("K_case_tetangga_program_bantuan");
                $this->data['K_case_tetangga_kemiskinan'] = Session::getSession("K_case_tetangga_kemiskinan");
                $this->data['jumlahK'] = Session::getSession("jumlahK");
                $this->data['type_cbr'] = Session::getSession("type_cbr");
                $this->data['kasusbaru_original'] = Session::getSession("kasusbaru_original");
                $this->data['kasusbaru_transform'] = Session::getSession("kasusbaru_transform");

                $this->data['title_web'] = "Solusi Kasus Baru";
                $this->view("templates/header", $this->data);
                $this->view("pengujian/kasusbaru", $this->data);
                $this->view("modals/pengujian_modals", $this->data);
                $this->view("templates/footer");
            } else {
                $this->data['title_web'] = "Pengujian";
                $this->view("templates/header", $this->data);
                $this->view("pengujian/", $this->data);
                $this->view("modals/pengujian_modals", $this->data);
                $this->view("templates/footer");
            }
        } else {
            Flasher::setFlash("Akses", "berhasil", "digagalkan melalui URL!", "success");
            header("Location: " . BASEURL . "pengujian/");
            exit;
        }
    }
    public function pengujian_kasusuji()
    {
        $this->data['kasus_uji'] = $this->model("Data_model")->getAllData("kasus_uji");
        $this->data['waktu_cbrkmeans'] = Session::getSession("waktu_cbrkmeans");
        $this->data['waktu_cbr'] = Session::getSession("waktu_cbr");
        $this->data['akurasi_programBantuan_cbrkmeans'] = $this->model("Pengujian_model")->findAccuracy($this->data['kasus_uji'], "Bantuan", "bantuan_cbrkmeans");
        $this->data['akurasi_programBantuan_cbr'] = $this->model("Pengujian_model")->findAccuracy($this->data['kasus_uji'], "Bantuan", "bantuan_cbr");
        $this->data['akurasi_tingkatKemiskinan_cbr'] = $this->model("Pengujian_model")->findAccuracy($this->data['kasus_uji'], "Class", "class_cbr");
        $this->data['akurasi_tingkatKemiskinan_cbrkmeans'] = $this->model("Pengujian_model")->findAccuracy($this->data['kasus_uji'], "Class", "class_cbrkmeans");


        $this->data['title_web'] = "Pengujian Kasus Uji";
        $this->view("templates/header", $this->data);
        $this->view("pengujian/pengujian_kasusuji", $this->data);
        $this->view("modals/pengujian_modals", $this->data);
        $this->view("templates/footer");
    }
    public function revise()
    {
        //rtrim url
        $urls = $_GET['url'];
        $lastID = $this->model("Metode_model")->findLastNumberURL($urls);
        if ($lastID == 0) {
            //return back to home and get message
            Flasher::setFlash("Fase Reuse", "diinterupsi", "URL Abort", "success");
            header("Location: " . BASEURL . "pengujian/");
            exit;
        } else {
            // ambil data kasus baru yang baru disimpan
            $this->data['kasusbaru_original'] = $this->model("Kasus_model")->getSpecificKasusBaru("kasusbaru_original", $lastID);
            $this->data['kasusbaru_transform'] = $this->model("Kasus_model")->getSpecificKasusBaru("kasusbaru_transform", $lastID);

            //ambil data basis kasus yang bersesuaian
            $this->data['basis_kasus'] = $this->model("Data_model")->getSpecificKasus("basis_kasus", $this->data['kasusbaru_transform']['id_obesitas']);
            $this->data['kolom_kasusbaru'] = $this->model("Kasus_model")->initializeColumns();
            $this->data['kolom_basiskasus'] = $this->model("Data_model")->getAllColumns();
            $this->data['id_kasusbaru_original'] = $lastID;

            //update kasusbaru_original untuk kolom revise
            $ifUpdateSuccess = $this->model("Data_model")->updateTable("kasusbaru_original", array("revise"), array("revise"), "id_kasusbaru_original", $lastID);

            if ($ifUpdateSuccess > 0) {
                $this->data['title_web'] = "Revise Kasus Baru";
                $this->view("templates/header", $this->data);
                $this->view("pengujian/revise", $this->data);
                $this->view("modals/pengujian_modals", $this->data);
                $this->view("templates/footer");
            } else {
                Flasher::setFlash("Update revise", "gagal", "dilakukan", "warning");
                header("Location: " . BASEURL . "pengujian/");
                exit;
            }
        }
    }
}
