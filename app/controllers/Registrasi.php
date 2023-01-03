<?php
class Registrasi extends Controller
{
    private $data;
    public function __construct()
    {
        $this->data = array();
        $this->data['title_web'] = "Registrasi";
    }
    public function index()
    {
        $this->view("templates/header_login", $this->data);
        $this->view("registrasi/index", $this->data);
        $this->view("templates/footer_login");
    }
    public function registrasi_user()
    {
        if (!empty($_POST)) {
            // check dulu jika ada user yang sama
            if ($this->model("Registrasi_model")->checkIsSameUser($_POST) == 0) {
                // check kesamaan password
                if ($_POST['input_password_user'] == $_POST['input_repeat_password']) {
                    if ($this->model("Registrasi_model")->insertNewUser($_POST)) {
                        Flasher::setFlash("Registrasi user", "berhasil", "dilakukan", "success");
                    } else {
                        // gagal registrasi user baru
                        Flasher::setFlash("Registrasi user", "gagal", "dilakukan", "warning");
                    }
                } else {
                    // password tidak sama
                    Flasher::setFlash("Registrasi user", "gagal", "dilakukan karena password yang dimasukkan tidak sama", "warning");
                }
            } else {
                // ada user yang sama
                Flasher::setFlash("Registrasi user", "gagal", "dilakukan karena user telah terdaftar", "warning");
            }
            header("Location: " . BASEURL . "registrasi/");
            exit;
        } else {
            Flasher::setFlash("Akses", "berhasil", "digagalkan melalui URL!", "success");
            header("Location: " . BASEURL . "registrasi/");
            exit;
        }
    }
}
