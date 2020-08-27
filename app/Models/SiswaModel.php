<?php

namespace App\Models;

use CodeIgniter\Model;

class SiswaModel extends Model
{
    protected $table = "siswa";
    protected $useTimeStamps = true;
    protected $primaryKey = 'nisn';
    protected $allowedFields = [
        'nama', 'nisn', 'nis', 'tem_lahir', 'tan_lahir', 'kelas', 'jurusan', 'j_kelamin', 'alamat'
    ];

    public function getSiswa($nisn = false)
    {
        if ($nisn == false) {
            return $this->findAll();
        }
        return $this->where(['nisn' => $nisn])->first();
    }
}
