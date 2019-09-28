<?php



class FilmController extends Controller
{   
    public function __construct()
    {
        parent::__construct('film');
    }

    public function index($data)
    {
        $data['judul'] = 'Film/index';
        $data['css'] = $this->cssPath . "/style.css";
        $this->view('templates/header', $data);
        $this->view('templates/nav');
        $this->view('templates/layout');
        $this->view('film/index', $data);
        $this->view('templates/layout-end');
        $this->view('templates/footer');
    }
}