<?php

namespace App\Database\Seeds;

use CodeIgniter\I18n\Time;
use Faker\Provider\DateTime;

class GuruSeeder extends \CodeIgniter\Database\Seeder
{
   public function run()
   {
      $faker = \Faker\Factory::create('id_ID');
      for ($i = 0; $i <= 10; $i++) {
         $data = [
            'nama'      => $faker->name('male'),
            'tem_lahir' => $faker->city,
            'j_kelamin' => 'laki - laki',
            'tan_lahir' => $faker->date(),
            'tmt'       => $faker->date(),
            'domisili'  => $faker->state,
            'jabatan'   => 'guru',
            'pendidikan' => 'perguruan_tinggi',
            'alamat'    => $faker->address,
            'pic'    => 'default.png'
         ];
         // Simple Queries
         $this->db->query(
            "INSERT INTO guru (nama, tem_lahir, tan_lahir, tmt, domisili, jabatan, j_kelamin, pendidikan, alamat,pic) VALUES(:nama:, :tem_lahir:, :tan_lahir:, :tmt:, :domisili:,:jabatan:, :j_kelamin:, :pendidikan:, :alamat:,:pic:)",
            $data
         );
      }
      // Using Query Builder
      // $this->db->table('guru')->insert($data);
   }
}
