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
        $data['user_ID'] = $this->model('User')->getUserID();
        $data['transactions'] = $this->model('Transaction')->getAllUserTransaction($data['user_ID']);
        $this->view('templates/header', $data);
        $this->view('templates/nav');
        $this->view('templates/layout');
        $this->view('transhistory/index', $data);
        $this->view('templates/layout-end');
        $this->view('templates/footer');
    }
    // public function toreview($transaction_id,$film_id){
    //     $this->redirect(BASE_URL . "/" . "public" . "/" . "transhistory?transid=".$transaction_id.",filmid=".$film_id);
    // }
    public function toreview(){
        $data = [];
        // HARDCODED
        $data['film_id'] = 1;
        $data['transaction_id'] = 1;
        var_dump($data['film_id']);
        $this->redirect(BASE_URL . "/" . "public" . "/" . "review" . "?filmid=" . $data['film_id'] . "&transid=" . $data['transaction_id']);
    }
}