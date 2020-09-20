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

	public function create()
	{
		$data = [
			'title' => 'Form tambah data guru',
			'header' => 'Tambah data guru',
			'valid' => \Config\Services::validation()
		];

		return view('guru/create', $data);
	}

	public function savedata()
	{
		if (!$this->validate([
			'nama' => [
				'rules' => 'required',
				'errors' => [
					'required' => '{field} guru harus diisi!'
				]
			],
			'pic' => [
				'rules' => 'max_size[pic,2048]|is_image[pic]|mime_in[pic,image/jpg,image/jpeg,image/png]',
				'errors' => [
					'max_size' => 'gambar yang anda pilih terlalu besar',
					'is_image' => 'yang anda pilih bukan gambar',
					'mime_in' => 'yang anda pilih bukan gambar'
				]
			]
		])) {
			return redirect()->to('/guru/create')->withInput();
		}
		// ambil foto guru
		$fotoGuru = $this->request->getFile('pic');
		// check apakah ada file foto yang di upload
		if ($fotoGuru->getError() == 4) {
			$namaFileGuru = 'default.png';
		} else {
			// generate nama baru
			$namaFileGuru = $fotoGuru->getRandomName();
			// pindahkan ke folder img
			$fotoGuru->move('img', $namaFileGuru);
		}

		$data = array(
			'nama' => $this->request->getVar('nama'),
			'tem_lahir' => $this->request->getVar('tem_lahir'),
			'tmt' => $this->request->getVar('tmt'),
			'jabatan' => $this->request->getVar('jabatan'),
			'mapel' => $this->request->getVar('mapel'),
			'j_kelamin' => $this->request->getVar('j_kelamin'),
			'domisili' => $this->request->getVar('domisili'),
			'alamat' => $this->request->getVar('alamat'),
			'pic' => $namaFileGuru
		);

		$this->GuruModel->insert($data);

		session()->setFlashdata('pesan', 'Data berhasil ditambahkan!');

		return redirect()->to('/guru');
	}
}
