<?php



class RegisterController extends Controller
{

    public function __construct()
    {
        parent::__construct('register');
    }



    public function index()
    {

        if ($this->model("Login")->isRedirectedToHome()) {
            $this->redirect(BASE_URL . "home/index/{$_COOKIE['engima_user']}");
        } else {
            $this->model("Login")->resetCookie();
        }

        $data['judul'] = 'Register/index';
        $data['css'] = $this->cssPath . "/style.css";
        $data['js'] = $this->jsPath . "/index.js";
        $this->view('templates/header', $data);
        $this->view('register/index', $data);
        $this->view('templates/footer', $data);
    }

    public function validateUsername($str)
    {
        // $data['username'] = $_GET['username'];
        // $data['css'] = $this->cssPath . "/style.css";
        // $data['js'] = $this->jsPath;


        // if (!$this->model('Register')->checkIfUsernameExist($data['username'])) {
        //     $data["usernameExistMsg"] = "Username {$data["username"]} is already exist!";
        // }

        // $this->view('templates/header', $data);
        // $this->view('register/index', $data);
        // $this->view('templates/footer', $data);
    }

    public function add()
    {

        // ALGORITMA MANGGIL MODEL BUAT VALIDASI

        #Your code here


        // SEBELUM JALANIN CODE DIBAWAH SEMUA DATA HARUS DIVALIDASI DULU DIATAS
        $tmpProfileLocation = $_FILES['profile']['tmp_name'];
        $storedPassword =  password_hash($_POST['password'], PASSWORD_DEFAULT);
        $profileExtension = explode('/', $_FILES['profile']['type'])[1];
        $savedLocation = ROOT . "/app/database/img/users/{$_POST['username']}.{$profileExtension}";

        if (move_uploaded_file($tmpProfileLocation, $savedLocation)) {
            $data = [];
            $data['username'] = $_POST["username"];
            $data['password'] = $storedPassword;
            $data['email'] = $_POST['email'];
            $data['profile_picture'] = "app/database/img/users/{$_POST['username']}.{$profileExtension}";
            $data['phone_num'] = $_POST['phone-number'];

            if ($this->model('Register')->addNewUser($data) > 0) {
                $this->redirect(BASE_URL . "/" . "home" . "/" . $data['username']);
            }
        }
    }
}