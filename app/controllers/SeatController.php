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
        $seat_number = $_GET['seat_number'];
        $schedule_id = $_GET['schedule_id'];
        $occupied = $this->model('Seat')->getOccupiedBySeatNumberandScheduleId($seat_number, $schedule_id);
        
        $data['occupied'] = 0;
        if ($occupied != NULL) {
            if ($occupied[0]['occupied'] == 1) {
                $data['occupied'] = 1;
            }
        }         
        echo json_encode($data);
    }

    public function buy()
    {
        $request = json_decode(stripslashes(file_get_contents("php://input")));
        $data['seat_number'] = $request->seat_number;
        $data['schedule_id'] = (int) $request->schedule_id;
        $data['user_id'] = $this->model('User')->getUserID()['user_id'];
        // var_dump("tes");
        // $data['user_id'] = 1;
        // var_dump($data['user_id']);
        $data['seat_id'] = (int) $this->model('Seat')->addSeat($data['schedule_id'], $data['seat_number']);
        // var_dump("tes");
        if ($this->model('Transaction')->addTransaction($data) > 0) {
            $data['response'] = 1;
            echo json_encode($data);
        } else {
            $data['response'] = 0;
            echo json_encode($data);
        }
    }
}