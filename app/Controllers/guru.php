<?php

namespace App\Controllers;

use App\Models\GuruModel;
use App\Models\ModelGuru;
use Config\Services;

class Guru extends BaseController
{
	protected $GuruModel;
	public function __construct()
	{
		$this->GuruModel = new GuruModel();
	}

	public function index()
	{
		// search
		$keyword = $this->request->getVar('keyword');
		if($keyword){
			$guru = $this->GuruModel->search($keyword);
		}else{
			$guru = $this->GuruModel;
		}

		// pagination
		$currentPage = $this->request->getVar('page_guru') ? $this->request->getVar('page_guru') : 1;

		// index
		$data = [
			'title' => "Data guru | CodeIgniter4",
			'header' => "Tabel data guru",
			'breadcrumb' => "Tabel data / Data guru",
			'valid' => \Config\Services::validation(),
			'teachers' => $this->GuruModel->paginate(6, 'guru'),
			'pager' => $this->GuruModel->pager,
			'currentPage' => $currentPage
		];

		return view('guru/index', $data);
	}

	public function detail($id)
	{
		$data = [
			'title' => 'Detail guru',
			'valid' => \Config\Services::validation(),
			'guru' => $this->GuruModel->getGuru($id)
		];

		return view('guru/detail', $data);
	}

	public function delete($id)
	{
		$guru = $this->GuruModel->find($id);

		if ($guru['pic'] != 'default.png') {
			unlink('img/' . $guru['pic']);
		}

		$this->GuruModel->delete($id);
		session()->setFlashdata('pesan', 'Data berhasil dihapus!');
		return redirect()->to('/guru');
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
			'tan_lahir' => $this->request->getVar('tan_lahir'),
			'j_kelamin' => $this->request->getVar('j_kelamin'),
			'domisili' => $this->request->getVar('domisili'),
			'alamat' => $this->request->getVar('alamat'),
			'tmt' => $this->request->getVar('tmt'),
			'jabatan' => $this->request->getVar('jabatan'),
			'mapel' => $this->request->getVar('mapel'),
			'pendidikan' => $this->request->getVar('pendidikan'),
			'lembaga' => $this->request->getVar('lembaga'),
			'pic' => $namaFileGuru
		);

		$this->GuruModel->insert($data);

		session()->setFlashdata('pesan', 'Data berhasil ditambahkan!');

		return redirect()->to('/guru');
	}

	public function ubah($id)
	{
		$data = [
			'title' => 'Form ubah data guru',
			'header' => 'Ubah data guru',
			'valid' => \Config\Services::validation(),
			'dataGuru' => $this->GuruModel->getGuru($id)
		];

		return view('guru/ubah', $data);
	}

	public function update($id)
	{
		if (!$this->validate([
			'nama' => [
				'rules' => 'required',
				'errors' => [
					'required' => '{field} siswa harus diisi!'
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

			$data = [
				'title' => 'Detail guru | CodeIgniter 4',
				'header' => 'Detail guru',
				'guru' => $this->GuruModel->getGuru($this->request->getVar('id')),
			];

			return view('/guru/create', $data);
		}

		$fileFoto = $this->request->getFile('pic');

		// cek gambar apakah ga diganti
		if ($fileFoto->getError() == 4) {
			$namaFoto = $this->request->getVar('fotoLama');
		} else {
			$namaFoto = $fileFoto->getRandomName();
			// pindahkan
			$fileFoto->move('img', $namaFoto);
			// hapus file lama
			unlink('img/' . $this->request->getVar('fotoLama'));
		}

		$data = array(
			'nama' => $this->request->getVar('nama'),
			'tem_lahir' => $this->request->getVar('tem_lahir'),
			'tan_lahir' => $this->request->getVar('tan_lahir'),
			'j_kelamin' => $this->request->getVar('j_kelamin'),
			'domisili' => $this->request->getVar('domisili'),
			'alamat' => $this->request->getVar('alamat'),
			'tmt' => $this->request->getVar('tmt'),
			'jabatan' => $this->request->getVar('jabatan'),
			'mapel' => $this->request->getVar('mapel'),
			'pendidikan' => $this->request->getVar('pendidikan'),
			'lembaga' => $this->request->getVar('lembaga'),
			'pic' => $namaFoto
		);

		$this->GuruModel->update($id, $data);

		session()->setFlashdata('pesan', 'Data berhasil diubah!');

		return redirect()->to("/guru");
	}
}
