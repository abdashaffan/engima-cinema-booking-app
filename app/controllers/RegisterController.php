<?php



class RegisterController extends Controller
{

    public function __construct()
    {
        parent::__construct('register');
    }

    public function index()
    {

        var_dump("Register/index");
        $data['judul'] = 'Register/index';
        $data['css'] = $this->cssPath . "/style.css";
        $data['js'] = $this->jsPath . "/index.js";
        $this->view('templates/header', $data);
        $this->view('register/index', $data);
        $this->view('templates/footer', $data);
    }

    public function validateUsername()
    {
        var_dump($_GET['username']);
        $data['username'] = $_GET['username'];
        $data['css'] = $this->cssPath . "/style.css";
        $data['js'] = $this->jsPath;


        if (!$this->model('Register')->checkIfUsernameExist($data['username'])) {
            $data["usernameExistMsg"] = "Username {$data["username"]} is already exist!";
        }

        $this->view('templates/header', $data);
        $this->view('register/index', $data);
        $this->view('templates/footer', $data);
    }
}