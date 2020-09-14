<?php

namespace App\Controllers;

use App\Models\GuruModel;

class Guru extends BaseController
{
    protected $GuruModel;
    public function __construct()
    {
        $this->GuruModel = new GuruModel();
    }

    public function index()
    {
        $data = [
            'title' => "Data guru | CodeIgniter4",
            'header' => "Tabel data guru",
            'breadcrumb' => "Tabel data / Data guru",
            'teachers' => $this->GuruModel->getGuru()
        ];

        return view('guru/index', $data);
    }

    public function detail($id)
    {
        $data = [
            'title' => 'Detail guru',
            'teacher' => $this->GuruModel->getGuru($id)
        ];

        return view('guru/detail', $data);
    }
}
