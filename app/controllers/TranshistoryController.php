<?php



class TranshistoryController extends Controller
{
    public function __construct()
    {
        parent::__construct('transhistory');
    }

    public function index()
    {
        $data['judul'] = 'Transhistory/index';
        $data['css'] = $this->cssPath . "/style.css";
        $this->view('templates/header', $data);
        $this->view('transhistory/index', $data);
        $this->view('templates/footer');
    }
}