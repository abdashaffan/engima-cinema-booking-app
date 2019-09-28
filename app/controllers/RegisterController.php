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
            $this->redirect(BASE_URL . "/home/index/{$_COOKIE['engima_user']}");
        } else {
            $this->model("Login")->resetCookie();
        }

        $data['judul'] = 'Register/index';
        $data['css'] = $this->cssPath . "/style.css";
        $data['js'] = $this->jsPath . "/index.js";
        $this->view('templates/header', $data);
        $this->view('register/index', $data);
        $this->view('templates/footer');
    }
}