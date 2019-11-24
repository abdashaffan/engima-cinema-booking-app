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
        $data['judul'] = 'Engima -review';
        $data['css'] = $this->cssPath . "/style.css";
        $data['user_id'] = intval($_GET['userid']);
        $data['film_name'] = $this->model('Film')->getFilmByIdTMDB($filmid)["original_title"];
        $data['film_id'] = intval($filmid);
        $data['status'] = intval($_GET['status']);
        if($data['status']==1){
            $data['review'] = $this->model('Review')->getReviewByUserAndFilmID($data["user_id"],$data['film_id'])[0];
        } else {
            $data['review'] == NULL;
        }
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

        $transid = $_POST['transaction_id'];
        $data['film_id'] = $_POST['film_id'];

        $status = var_dump($_POST["status"]);
        if($status=="1"){
            $this->model('Review')->editUserReview($data);
        } else if($status==0) {
            $this->model('Review')->addNewUserReview($data);
        }
        $this->redirect(BASE_URL .  "/" . "transhistory");

    }
}