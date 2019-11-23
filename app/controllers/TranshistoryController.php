<?php



class TranshistoryController extends Controller
{
    public function __construct()
    {
        parent::__construct('transhistory');
    }

    public function index()
    {
        # Call update transaction on transaction model
        # current model works such that two times fetching all transactions is done
        # Ineffective, but works as an MVP for demo

        $this->model('Transaction')->updateAllTransactions();

        $data['judul'] = 'Engima - Transaction History';
        $data['css'] = $this->cssPath . "/style.css";
        $data['js'] = $this->jsPath . "/index.js";
        $data['user_ID'] = $this->model('User')->getUserID();
        $user_id = intval($data['user_ID']['user_id']);
        $data['transactions'] = $this->model('Transaction')->getAllUserTransaction($data['user_ID']['user_id']);
        # Get schedules for all transactions
        for($i=0;$i<count($data['transactions']);$i++){
            $data['transactions'][$i]["schedule"] = $this->model("Schedule")->getScheduleByScheduleId($data['transactions'][$i]["id_jadwal"]);
            $film_id = $data['transactions'][$i]["schedule"]["film_id"];
            if(!$data['films'][$film_id]){
                $data['films'][$film_id] = $this->model("Film")->getFilmByIdTMDB($film_id);
            }
            $review = $this->model("Review")->getReviewByUserAndFilmID($user_id,$film_id);
            if(count($review)>0){
                $data['transactions'][$i]['status_review']=1;
            } else {
                $data['transactions'][$i]['status_review']=0;
            }
        }
        // die(var_dump($data['transactions']));
        $this->view('templates/header', $data);
        $this->view('templates/nav');
        $this->view('templates/layout');
        $this->view('transhistory/index', $data);
        $this->view('templates/layout-end');
        $this->view('templates/footer');
    }
    public function toreview()
    {

        $data = [];
        $data['user_id'] = $_GET["user_id"];
        $data['film_id'] = $_GET['film_id'];
        $data['status'] = $_GET['status'];
        $this->redirect(BASE_URL . "/" . "review" . "?filmid=" . $data['film_id'] . "&userid=" . $data['user_id']. "&status=" . $data['status']);
    }
}