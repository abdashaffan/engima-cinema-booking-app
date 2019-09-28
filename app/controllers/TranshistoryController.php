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
        $data['transactions'] = $this->model('Transaction')->getAllTransaction();
        $this->view('templates/header', $data);
        $this->view('templates/nav');
        $this->view('templates/layout');
        $this->view('transhistory/index', $data);
        $this->view('templates/layout-end');
        $this->view('templates/footer');
    }
}