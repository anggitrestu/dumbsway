<?php
class Dashboard extends Controller
{

    public function index()
    {
        header('Location: ' . BASEURL . '/dashboard/listBuku');
        exit;
    }

    public function listBuku()
    {
        $data['judul'] = 'Dashboard';
        $data['categories'] = $this->model('Dashboard_model')->getAllCategories();
        $data['books'] = $this->model('Dashboard_model')->getAllBuku();
        $this->view('template/headerAct', $data);
        $this->view('dashboard/index', $data);
        $this->view('template/footerAct');
    }
    public function detail($id)
    {
        $data['judul'] = "Detail Buku";
        $data['categories'] = $this->model('Dashboard_model')->getAllCategories();
        $data['books'] = $this->model('Dashboard_model')->getBukuById($id);
        $this->view('template/headerAct', $data);
        $this->view('dashboard/detail', $data);
        $this->view('template/footerAct');
    }
    public function tambah()
    {
        if ($this->model('Dashboard_model')->tambahDataBuku($_POST) > 0) {
            header('Location: ' . BASEURL . '/dashboard');
            exit;
        } else {
            header('Location: ' . BASEURL . '/dashboard');
            exit;
        }
    }
    public function ubah()
    {
        if ($this->model('Dashboard_model')->ubahDataBuku($_POST) > 0) {
            header('Location: ' . BASEURL . '/dashboard');
            exit;
        } else {
            header('Location: ' . BASEURL . '/dashboard');
            exit;
        }
    }

    public function delete($id)
    {
        if ($this->model('Dashboard_model')->hapusDataBuku($id) > 0) {
            header('Location: ' . BASEURL . '/dashboard');
            exit;
        } else {
            header('Location: ' . BASEURL . '/dashboard');
            exit;
        }
    }
}
