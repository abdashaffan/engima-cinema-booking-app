<?php



class AboutController extends Controller
{
    public function index(
        $nama = "Abda",
        $pekerjaan = "Dosen",
        $umur = 21
    ) {
        $data['nama'] = $nama;
        $data['pekerjaan'] = $pekerjaan;
        $data['umur'] = $umur;
        $data['judul'] = 'About/index';
        $this->view('templates/header', $data);
        $this->view('about/index', $data);
        $this->view('templates/footer');
    }
    public function page()
    {
        $data['judul'] = 'About/page';
        $this->view('templates/header', $data);
        $this->view('about/page');
        $this->view('templates/footer');
    }
}