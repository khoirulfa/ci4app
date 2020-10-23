<?php

namespace App\Models;

use CodeIgniter\Model;

class SiswaModel extends Model
{
    protected $table = "siswa";
    protected $useTimeStamps = true;
    // protected $primaryKey = 'nisn';
    protected $allowedFields = [
        'nama', 'nisn', 'nis', 'tem_lahir', 'tan_lahir', 'kelas', 'jurusan', 'j_kelamin', 'alamat', 'pic'
    ];

    public function getSiswa($id = false)
    {
        if ($id == false) {
            return $this->findAll();
        }
        return $this->where(['id' => $id])->first();
    }

    public function search($keyword)
    {
        $builder = $this->table('siswa');
        $builder->like('nama', $keyword)->orLike('tem_lahir',$keyword)->orLike('kelas', $keyword)->orLike('jurusan', $keyword)->orLike('alamat', $keyword);

        return $builder;
    }
}
