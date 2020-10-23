<?php

namespace App\Models;

use CodeIgniter\Model;

class GuruModel extends Model
{
    protected $table = "guru";
    protected $useTimeStamps = true;
    protected $allowedFields = [
        'nama', 'tem_lahir', 'tan_lahir', 'j_kelamin', 'domisili', 'alamat',  'tmt', 'jabatan', 'mapel', 'pendidikan', 'lembaga', 'pic'
    ];

    public function getGuru($id = false)
    {
        if ($id == false) {
            return $this->findAll();
        }
        return $this->where(['id' => $id])->first();
    }

    public function search($keyword)
    {
        $builder = $this->table('guru');
        $builder->like('nama', $keyword)->orLike('tem_lahir')->orLike('jabatan')->orLike('alamat')->orLike('pendidikan');

        return $builder;
    }
}
