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
        $data['transaction_id'] = $_GET["transaction_id"];
        $data['film_id'] = $_GET['film_id'];
        // var_dump($data['film_id']);
        $this->redirect(BASE_URL . "/" . "public" . "/" . "review" . "?filmid=" . $data['film_id'] . "&transid=" . $data['transaction_id']);
    }
}