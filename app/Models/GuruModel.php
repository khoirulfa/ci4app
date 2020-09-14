<?php

namespace App\Models;

use CodeIgniter\Model;

class GuruModel extends Model
{
    protected $table = "guru";
    protected $useTimeStamps = true;
    protected $allowedFields = [
        'nama', 'tem_lahir', 'j_kelamin', 'domisili',
        'alamat',  'tmt', 'jabatan', 'mapel', 'pendidikan', 'perguruan_tinggi'
    ];

    public function getGuru($id = false)
    {
        if ($id == false) {
            return $this->findAll();
        }
        return $this->where(['id' => $id])->first();
    }
}
