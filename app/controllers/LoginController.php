<?php



class LoginController extends Controller
{

    public function __construct()
    {
        parent::__construct('login');
    }

    public function index()
    {
        $data['judul'] = 'login/index';
        $data['css'] = $this->cssPath;
        $this->view('templates/header', $data);
        $this->view('login/index', $data);
        $this->view('templates/footer');
    }
}