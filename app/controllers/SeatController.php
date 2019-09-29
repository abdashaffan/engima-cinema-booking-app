<?php

class SeatController extends Controller
{   
    public function __construct()
    {
        parent::__construct('seat');
    }

    public function index($id)
    {
        $data['judul'] = 'Seat/index';
        $data['css'] = $this->cssPath . "/style.css";
        // TODO: Uncomment bawahnya
        $data['js'] = $this->jsPath . "/index.js";
        // $data['js'] = $this->jsPath;

        $data['schedule'] = $this->model('Schedule')->getScheduleByScheduleId($id);
        $data['film'] = $this->model('Film')->getFilmById($data['schedule']['film_id']);
        
        $seats = $this->model('Seat')->getAllSeatByScheduleId($id);
        foreach ($seats as $key => $seat) {
            $data['seats'][$seat['seat_number']] = $seat; 
        }

        $this->view('templates/header', $data);
        $this->view('templates/nav');
        $this->view('templates/layout');
        $this->view('seat/index', $data);
        $this->view('templates/layout-end');
        $this->view('templates/footer', $data);
    }

    public function detail() 
    {   
        var_dump('tes');
        var_dump($_GET);
        echo "tes";
    }
}