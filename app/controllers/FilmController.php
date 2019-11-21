<?php



class FilmController extends Controller
{
    public function __construct()
    {
        parent::__construct('film');
    }

    public function index($id = 1)
    {
        $data['judul'] = 'Film kami';
        $data['css'] = $this->cssPath . "/style.css";
        $data['film_id'] = $id;
        $data['film'] = $this->model('Film')->getFilmByIdTMDB($id);
        $dateTime = date_create_from_format('Y-m-d', $data['film']['release_date']);
        $data['film']['release_date'] = $dateTime->format('F d, Y');

        $data['schedules'] = $this->model('Schedule')->getAllScheduleByFilmId($id);
        $data['reviews'] = $this->model('Review')->getAllReviewAndUserByFilmId($id);

        $this->view('templates/header', $data);
        $this->view('templates/nav');
        $this->view('templates/layout');
        $this->view('film/index', $data);
        $this->view('templates/layout-end');
        $this->view('templates/footer');
    }
}