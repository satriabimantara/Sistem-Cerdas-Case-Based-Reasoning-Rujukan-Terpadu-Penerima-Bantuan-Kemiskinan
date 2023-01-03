<?php
class Reset extends Controller
{
    private $data;
    public function __construct()
    {
        $this->data = array();
        $this->data['title_web'] = "Reset Data";
    }
    public function index()
    {
        $this->view("templates/header", $this->data);
        $this->view("reset/index", $this->data);
        $this->view("modals/reset_modals");
        $this->view("templates/footer");
    }
    public function reset_all()
    {
        if (!empty($_POST)) {
            // cek kalau tabel tidak kosong
            if ($this->model("Data_model")->getAmountData("basis_kasus") != 0) {
                $rowDeletedBasisKasus = $this->model("Data_model")->deleteAllData("basis_kasus");
                echo "Sukses delete basis_kasus";
            }
            if ($this->model("Data_model")->getAmountData("data_asli") != 0) {
                $rowDeletedDataAsli = $this->model("Data_model")->deleteAllData("data_asli");
                echo "Sukses delete data_asli";
            }
            if ($this->model("Data_model")->getAmountData("kasusbaru_original") != 0) {
                $rowDeletedKasusBaruOriginal = $this->model("Data_model")->deleteAllData("kasusbaru_original");
                echo "Sukses delete kasusbaru_original";
            }
            if ($this->model("Data_model")->getAmountData("kasus_uji") != 0) {
                $rowDeletedKasusUji = $this->model("Data_model")->deleteAllData("kasus_uji");
                echo "Sukses delete kasus_uji";
            }
            if ($this->model("Data_model")->getAmountData("pusat_kluster") != 0) {
                $rowDeletedKPusatKluster = $this->model("Data_model")->deleteAllData("pusat_kluster");
                echo "Sukses delete pusat_kluster";
            }
            // Reset auto increment table
            $rowResetAutoIncrementBasisKasus = $this->model("Reset_model")->resetAutoIncrementTable("basis_kasus");
            $rowResetAutoIncrementKasusUji = $this->model("Reset_model")->resetAutoIncrementTable("kasus_uji");
            $rowResetAutoIncrementDataAsli = $this->model("Reset_model")->resetAutoIncrementTable("data_asli");
            $rowResetAutoIncrementDataTransform = $this->model("Reset_model")->resetAutoIncrementTable("data_transform");
            $rowResetAutoIncrementKasusBaruOriginal = $this->model("Reset_model")->resetAutoIncrementTable("kasusbaru_original");
            $rowResetAutoIncrementKasusBaruTransform = $this->model("Reset_model")->resetAutoIncrementTable("kasusbaru_transform");

            // Redirect ke halaman home
            Flasher::setFlash("Reset seluruh data", "berhasil", "dilakukan!", "danger");
            header("Location: " . BASEURL);
            exit();
        } else {
            Flasher::setFlash("Akses", "berhasil", "digagalkan melalui URL!", "success");
            header("Location: " . BASEURL . "reset/");
            exit;
        }
    }
}
