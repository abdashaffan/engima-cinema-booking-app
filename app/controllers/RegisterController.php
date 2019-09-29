<?php

define("UNAME_VALID_CODE", 1);
define("UNAME_EXIST_CODE", 0);
define("UNAME_INVALID_CODE", -1);

class RegisterController extends Controller
{

    public function __construct()
    {
        parent::__construct('register');
    }



    public function index()
    {

        if ($this->model("User")->isRedirectedToHome()) {
            $this->redirect(BASE_URL . "/home/index/{$_COOKIE['engima_user']}");
        } else {
            $this->model("User")->resetCookie();
        }

        $data['judul'] = 'Register/index';
        $data['css'] = $this->cssPath . "/style.css";
        $data['js'] = $this->jsPath . "/index.js";
        $this->view('templates/header', $data);
        $this->view('register/index', $data);
        $this->view('templates/footer', $data);
    }


    public function validate()
    {
        header('Content-Type: application/json, charset=UTF-8');
        $username = json_decode(file_get_contents('php://input'))->username;

        if ($this->model("User")->isUsernameExist($username)) {
            if ($this->model("User")->isUsernameValid($username)) {
                $validStatus = UNAME_VALID_CODE;
            } else {
                $validStatus = UNAME_INVALID_CODE;
            }
        } else {
            $validStatus = UNAME_EXIST_CODE;
        }

        echo json_encode(
            array(
                "validStatus" => $validStatus

            )
        );
    }
}