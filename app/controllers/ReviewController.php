<?php



class ReviewController extends Controller
{
    public function __construct()
    {
        parent::__construct('review');
    }

    public function index()
    {
        
        $filmid = $_GET['filmid'];
        $transid = $_GET['transid'];    
        $data['judul'] = 'Review/index';
        $data['css'] = $this->cssPath . "/style.css";
        $data['user_id'] = $this->model('User')->getUserID();
        $data['film_name'] = $this->model('Review')->getReviewedFilmName($filmid);
        // var_dump($data['film_name'][0]);
        $data['film_id'] = 1;
        $this->view('templates/header', $data);
        $this->view('templates/nav');
        $this->view('templates/layout');
        $this->view('review/index', $data);
        $this->view('templates/layout-end');
        $this->view('templates/footer');
    }
    public function add()
    {
        
        $data = [];
        $data['rating'] = $_POST["rating"];
        $data['comment'] = $_POST['comment'];
        $data['user_id'] = $this->model('User')->getUserID();
        
        //HARDCODED VALUES ------------------------------------------------------
        $transid = 1;
        $data['film_id'] = 1;
        $status = $this->model('Review')->getStatus($transid);
        $status = trim($status[0]['status']);
        echo($status);
        if($status=="0"){
            $this->model('Review')->changeTransStatus01($transid);
        }
        else if($status=="1"){
            $this->model('Review')->changeTransStatus10($transid);
        }
        else{
            echo "String failed to compare";
        }


        // if ($this->model('Review')->addNewUserReview($data) > 0) {
        //    // changetransStatus here
        //     $this->redirect(BASE_URL . "/" . "public" . "/" . "transhistory");
        // }
    }

}