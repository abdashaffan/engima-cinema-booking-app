<?php


class SearchController extends Controller
{
    public function __construct()
    {
        parent::__construct('search');
    }

    public function index()
    {
        $data['css'] = $this->cssPath . "/style.css";
        $data['js'] = $this->jsPath;
        $data['keyword'] = $_GET['keyword'];
        $data['result'] = $this->model("Search")->countResult($data['keyword']);
        $data['resultNumber'] = count($data['result']);
        $this->view('templates/header', $data);
        $this->view('templates/nav');
        $this->view('templates/layout');
        $this->view('search/index', $data);
        $this->view('templates/layout-end');
        $this->view('templates/footer', $data);
    }
}