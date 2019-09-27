<?php



class MahasiswaController extends Controller
{
    public function index()
    {
        $data['judul'] = 'Daftar mahasiswa';
        $data['mahasiswa'] = $this->model("Mahasiswa")->getAllMahasiswa();
        $this->view('templates/header', $data);
        $this->view('mahasiswa/index', $data);
        $this->view('templates/footer');
    }

    public function detail($id)
    {
        $data['judul'] = 'Daftar mahasiswa';
        $data['mahasiswa'] = $this->model("Mahasiswa")->getMahasiswaById($id);
        $this->view('templates/header', $data);
        $this->view('mahasiswa/detail', $data);
        $this->view('templates/footer');
    }

    public function add()
    {
        if ($this->model('Mahasiswa')->tambahDataMahasiswa($_POST) > 0) {
            $this->redirect(BASE_URL . '/mahasiswa');

            // GAUSAH PAKE FLASH MESSAGE, GAUSAH REDIRECT KE LOGIN DULU, GAADA DI SPEK
        }
    }

    public function delete($id)
    {
        if ($this->model('Mahasiswa')->deleteDataMahasiswa($id) > 0) {
            $this->redirect(BASE_URL . '/mahasiswa');
        }
    }
}