<?php



class ReviewController extends Controller
{
    public function __construct()
    {
        parent::__construct('review');
    }

    public function index()
    {
        $data['judul'] = 'Review/index';
        $data['css'] = $this->cssPath . "/style.css";
        $this->view('templates/header', $data);
        $this->view('review/index', $data);
        $this->view('templates/footer');
    }
}