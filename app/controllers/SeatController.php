<?php

class SeatController extends Controller
{
    public function __construct()
    {
        parent::__construct('seat');
    }

    public function index()
    {
        $data['schedule_id'] = $_GET['schedule_id'];
        $data['film_id'] = $_GET['film_id'];
        $data['judul'] = 'Engima - Seats';
        $data['css'] = $this->cssPath . "/style.css";
        $data['js'] = $this->jsPath . "/index.js";

        $data['user_id'] = (int)$this->model('user')->getUserId()['user_id'];
        $data['schedule'] = $this->model('Schedule')->getScheduleByScheduleId($data['schedule_id']);
        $data['film'] = $this->model('Film')->getFilmByIdTMDB($data['film_id']);
        $seats = $this->model('Seat')->getAllSeatByScheduleId($data['schedule_id']);
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
    /**
     * dipanggil pas:
     * 1. Pertama kali bikin request payment
     * 2. kalo payment success, tetep diblok, kalo gak di unblok
     * 
     */
    {
        $request = json_decode(stripslashes(file_get_contents("php://input")));
        $data['seat_number'] = $request->seat_number;
        $data['schedule_id'] = (int) $request->schedule_id;
        $data['user_id'] = $this->model('User')->getUserID()['user_id'];
        $data['seat_id'] = (int) $this->model('Seat')->addSeat($data['schedule_id'], $data['seat_number']);
        if ($data['seat_id'] > 0) {
            $data['response'] = 1;
            echo json_encode($data);
        } else {
            $data['response'] = 0;
            echo json_encode($data);
        }
    }

    //TODO : Bikin endpoint buat batalin book seat kalo status paymentnya udah cancelled
    // public function unbook() {}
}