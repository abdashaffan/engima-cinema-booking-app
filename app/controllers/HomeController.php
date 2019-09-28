<?php



class HomeController extends Controller
{
    public function __construct()
    {
        parent::__construct('home');
    }

    public function index($username = "")
    {
        $data['judul'] = 'Home/index';
        $data['css'] = $this->cssPath . "/style.css";
        $data['user_name'] = $username;
        $data['films'] = $this->model('Film')->getAllCurrentFilm();
        $this->view('templates/header', $data);
        $this->view('templates/nav');
        $this->view('templates/layout');
        $this->view('home/index', $data);
        $this->view('templates/layout-end');
        $this->view('templates/footer');
    }
}