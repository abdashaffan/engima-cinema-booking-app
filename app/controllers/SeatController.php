<?php

class SeatController extends Controller
{
    public function __construct()
    {
        parent::__construct('seat');
    }

    public function index($id)
    {
        $data['judul'] = 'Engima - Seats';
        $data['css'] = $this->cssPath . "/style.css";
        $data['js'] = $this->jsPath . "/index.js";


        $data['schedule'] = $this->model('Schedule')->getScheduleByScheduleId($id);
        $data['film'] = $this->model('Film')->getFilmById($data['schedule']['film_id']);

        $seats = $this->model('Seat')->getAllSeatByScheduleId($id);
        foreach ($seats as $seat) {
            $data['seats'][$seat['seat_number']] = $seat;
        }

        $this->view('templates/header', $data);
        $this->view('templates/nav');
        $this->view('templates/layout');
        $this->view('seat/index', $data);
        $this->view('templates/layout-end');
        $this->view('templates/footer', $data);
    }


    public function buy()
    {
        $request = json_decode(stripslashes(file_get_contents("php://input")));
        $data['seat_number'] = $request->seat_number;
        $data['schedule_id'] = (int) $request->schedule_id;
        $data['user_id'] = $this->model('User')->getUserID()['user_id'];
        $data['seat_id'] = (int) $this->model('Seat')->addSeat($data['schedule_id'], $data['seat_number']);
        if ($this->model('Transaction')->addTransaction($data) > 0) {
            $data['response'] = 1;
            echo json_encode($data);
        } else {
            $data['response'] = 0;
            echo json_encode($data);
        }
    }
}