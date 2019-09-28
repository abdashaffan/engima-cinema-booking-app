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
        var_dump($_POST);
            $data = [];
            $data['rating'] = $_POST["rating"];
            $data['comment'] = $_POST['comment'];
            $data['user_id'] = $this->model('User')->getUserID();
            // var_dump($filmid);
            $data['film_id'] = 1;
            // $data['trans_id'] = $transid[0];

            if ($this->model('Review')->addNewUserReview($data) > 0) {
                $this->redirect(BASE_URL . "/" . "public" . "/" . "transhistory");
            }
    }

}