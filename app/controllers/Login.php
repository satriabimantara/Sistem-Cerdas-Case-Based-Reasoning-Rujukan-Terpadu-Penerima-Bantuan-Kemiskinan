<?php
class Login extends Controller
{
    private $data;
    public function __construct()
    {
        $this->data = array();
        $this->data['title_web'] = "Login";
    }
    public function index()
    {
        $this->view("templates/header_login", $this->data);
        $this->view("login/index", $this->data);
        $this->view("templates/footer_login");
    }

    public function logout()
    {
        Session::unsetSession("login");
        Session::unsetAllSession();
        Flasher::setFlash("Logout", "berhasil", "dilakukan", "success");
        header("Location: " . BASEURL);
        exit();
    }
    public function login_user()
    {
        if (!empty($_POST)) {
            $password_user = $_POST['password_user'];
            $user = $this->model("Login_model")->verifyUser($_POST);
            if ($user == null) {
                // Belum ada akun dan arahkan untuk register
                Flasher::setFlash("Login", "gagal", "dilakukan karena tidak ada akun terdaftar, silahkan registrasi!", "warning");
                header("Location: " . BASEURL . "login/");
                exit();
            } else {
                // verify password user
                if (password_verify($password_user, $user['password_user'])) {
                    // Bisa login dan Set session login dari user
                    Session::setSession("login", $user);
                    Flasher::setFlash("Login", "berhasil", "dilakukan", "warning");
                    header("Location: " . BASEURL);
                    exit();
                } else {
                    // password salah
                    Flasher::setFlash("Login", "gagal", "dilakukan karena password salah", "danger");
                    header("Location: " . BASEURL . "login/");
                    exit();
                }
            }
        } else {
            Flasher::setFlash("Abort Login", "berhasil", "dilakukan", "warning");
            header("Location: " . BASEURL . "login/");
            exit();
        }
    }
}
