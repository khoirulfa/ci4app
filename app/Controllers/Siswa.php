<?php

namespace App\Controllers;

use App\Models\SiswaModel;

class Siswa extends BaseController
{
    protected $SiswaModel;
    public function __construct()
    {
        $this->siswaModel = new SiswaModel();
    }

    public function index()
    {
        $data = [
            'title' => "Data siswa | CodeIgniter4",
            'header' => "Tabel data siswa",
            'breadcrumb' => "Tabel data / Data siswa",
            'siswa' => $this->siswaModel->getSiswa()
        ];

        return view('siswa/index', $data);
    }

    public function detail($nisn)
    {
        $data = [
            'title' => 'Detail siswa',
            'siswa' => $this->siswaModel->getSiswa($nisn)
        ];

        return view('siswa/detail', $data);
    }

    public function create()
    {
        $data = [
            'title' => 'Form tambah data siswa',
            'header' => 'Tambah data siswa',
            'valid' => \Config\Services::validation()
        ];

        return view('siswa/create', $data);
    }

    public function savedata()
    {
        if (!$this->validate([
            'nisn' => [
                'rules' => 'is_unique[siswa.nisn]',
                'errors' => [
                    'is_unique' => '{field} siswa tidak boleh sama!'
                ]
            ],
            'nis' => [
                'rules' => 'required|is_unique[siswa.nis]',
                'errors' => [
                    'required' => '{field} siswa harus diisi!',
                    'is_unique' => '{field} siswa tidak boleh sama!'
                ]
            ],
            'nama' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} siswa harus diisi!'
                ]
            ]
        ])) {
            $valid = \Config\Services::validation();

            return redirect()->to('/siswa/create')->withInput()->with('valid', $valid);
        }

        $data = array(
            'nama' => $this->request->getVar('nama'),
            'nisn' => $this->request->getVar('nisn'),
            'nis' => $this->request->getVar('nis'),
            'tem_lahir' => $this->request->getVar('tem_lahir'),
            'tan_lahir' => $this->request->getVar('tan_lahir'),
            'kelas' => $this->request->getVar('kelas'),
            'jurusan' => $this->request->getVar('jurusan'),
            'j_kelamin' => $this->request->getVar('j_kelamin'),
            'alamat' => $this->request->getVar('alamat')
        );

        $this->siswaModel->insert($data);

        session()->setFlashdata('pesan', 'Data berhasil ditambahkan!');

        return redirect()->to('/siswa');
    }

    public function delete($nisn)
    {
        $this->siswaModel->delete($nisn);

        session()->setFlashdata('pesan', 'Data berhasil dihapus!');
        return redirect()->to('/siswa');
    }

    public function ubah($nisn)
    {
        $data = [
            'title' => 'Form ubah data siswa',
            'header' => 'Ubah data siswa',
            'valid' => \Config\Services::validation(),
            'dataSiswa' => $this->siswaModel->getSiswa($nisn)
        ];

        return view('siswa/ubah', $data);
    }

    public function update($nisn)
    {
        if (!$this->validate([
            'nisn' => [
                'rules' => 'required|is_unique[siswa.nisn]',
                'errors' => [
                    'required' => '{field} siswa harus diisi!',
                    'is_unique' => '{field} siswa tidak boleh sama!'
                ]
            ],
            'nis' => [
                'rules' => 'required|is_unique[siswa.nis]',
                'errors' => [
                    'required' => '{field} siswa harus diisi!',
                    'is_unique' => '{field} siswa tidak boleh sama!'
                ]
            ],
            'nama' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} siswa harus diisi!'
                ]
            ]
        ])) {
            $valid = \Config\Services::validation();

            return redirect()->to('/siswa/edit/' . $this->request->getVar('nisn'))->withInput()->with('valid', $valid);
        }

        $data = array(
            'nama' => $this->request->getVar('nama'),
            'nisn' => $this->request->getVar('nisn'),
            'nis' => $this->request->getVar('nis'),
            'tem_lahir' => $this->request->getVar('tem_lahir'),
            'tan_lahir' => $this->request->getVar('tan_lahir'),
            'kelas' => $this->request->getVar('kelas'),
            'jurusan' => $this->request->getVar('jurusan'),
            'j_kelamin' => $this->request->getVar('j_kelamin'),
            'alamat' => $this->request->getVar('alamat')
        );

        $this->siswaModel->save($data);

        session()->setFlashdata('pesan', 'Data berhasil diubah!');

        return redirect()->to('/siswa');
    }

    //--------------------------------------------------------------------

}
