<?php

class SeatController extends Controller
{   
    public function __construct()
    {
        parent::__construct('seat');
    }

    public function index($id=1)
    {
        // TODO: Change to parse schedule id
        $id = 1;
        $data['judul'] = 'Seat/index';
        $data['css'] = $this->cssPath . "/style.css";
        // TODO: Uncomment bawahnya
        $data['js'] = "/public/js/seat/index.js";
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

    public function detail($schedule_id) 
    {
        echo "yes";
    }
}