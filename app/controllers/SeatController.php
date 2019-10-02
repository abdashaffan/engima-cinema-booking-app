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
        // echo "tes";
        $data = json_decode(stripslashes(file_get_contents("php://input")));
        // echo json_encode($data);
        var_dump($data);
        $seat_number = $data->seat_number;
        $schedule_id = $data->schedule_id;
        // var_dump($seat_number);  
        // var_dump($schedule_id);
        // $responseArray = [];
        // $responseArray['page'] = $data->page;
        // $responseArray['keyword'] = $data->keyword;
        // $responseArray['output'] = $this->model('Film')->paginateResult($responseArray);
        // var_dump($responseArray);
        // echo json_encode($responseArray);
    }
}