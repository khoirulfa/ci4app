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
            // $valid = \Config\Services::validation();

            // return redirect()->to('/siswa/create')->withInput()->with('valid', $valid);
            return redirect()->to('/siswa/create')->withInput();
        }
        // ambil foto siswa
        $fotoSiswa = $this->request->getFile('pic');
        // check apakah ada file foto yang di upload
        if ($fotoSiswa->getError() == 4) {
            $namaFileSiswa = 'default.png';
        } else {
            // generate nama baru
            $namaFileSiswa = $fotoSiswa->getRandomName();
            // pindahkan ke folder img
            $fotoSiswa->move('img', $namaFileSiswa);
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
            'alamat' => $this->request->getVar('alamat'),
            'pic' => $namaFileSiswa
        );

        $this->siswaModel->insert($data);

        session()->setFlashdata('pesan', 'Data berhasil ditambahkan!');

        return redirect()->to('/siswa');
    }

    public function delete($nisn)
    {
        // cari gambar bersasar nisn
        $siswa = $this->siswaModel->find($nisn);

        // cegah hapus default.png
        if ($siswa['pic'] != 'default.png') {
            // hapus gambar
            unlink('img/' . $siswa['pic']);
        }

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
        // cek nisn
        $nisnLama = $this->siswaModel->getSiswa($this->request->getVar('nisn'));
        if ($nisnLama['nisn'] == $this->request->getVar('nisn')) {
            $rule_nisn = 'required';
            $rule_nis = 'required';
        } else {
            $rule_nisn = 'required|is_unique[siswa.nisn]';
            $rule_nis = 'required|is_unique[siswa.nis]';
        }

        if (!$this->validate([
            'nisn' => [
                'rules' => $rule_nisn,
                'errors' => [
                    'required' => '{field} siswa harus diisi!',
                    'is_unique' => '{field} siswa tidak boleh sama!'
                ]
            ],
            'nis' => [
                'rules' => $rule_nis,
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
                'title' => 'Detail siswa | CodeIgniter 4',
                'header' => 'Detail siswa',
                'siswa' => $this->siswaModel->getSiswa($this->request->getVar('nisn')),
            ];

            return view('/siswa/create', $data);
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
            'nisn' => $this->request->getVar('nisn'),
            'nis' => $this->request->getVar('nis'),
            'tem_lahir' => $this->request->getVar('tem_lahir'),
            'tan_lahir' => $this->request->getVar('tan_lahir'),
            'kelas' => $this->request->getVar('kelas'),
            'jurusan' => $this->request->getVar('jurusan'),
            'j_kelamin' => $this->request->getVar('j_kelamin'),
            'alamat' => $this->request->getVar('alamat'),
            'pic' => $namaFoto
        );

        $this->siswaModel->save($data);
        $this->siswaModel->update($nisn, $data);

        session()->setFlashdata('pesan', 'Data berhasil diubah!');

        return redirect()->to("/siswa");
    }

    //--------------------------------------------------------------------

}
