<?php

class Mahasiswa extends Controller
{
    public function index()
    {
        $data['judul'] = 'Daftar Mahasiswa';
        $data['mhs'] = $this->model('Mahasiswa_model');
        $this->view('templates/header', $data);
        $this->view('mahasiswa/index');
        $this->view('templates/footer');
    }
}
