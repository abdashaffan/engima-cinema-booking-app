<?php



class HomeController extends Controller
{
    public function index()
    {
        $data['judul'] = 'Home/index';
        $data['nama'] = $this->model('User')->getUser();
        $data['film'] = $this->model('Film')->getAllCurrentFilm();
        $this->view('templates/header', $data);
        $this->view('templates/nav');
        $this->view('home/index', $data);
        $this->view('templates/footer');
    }
}