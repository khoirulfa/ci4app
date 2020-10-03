<?php

namespace App\Controllers;

use App\Models\AuthModel;

class Auth extends BaseController
{
   protected $AuthModel;

   public function __construct()
   {
      helper('form');
      $this->AuthModel = new AuthModel();
   }

   public function index()
   {
      $data = [
         'title' => 'Login page'
      ];
      return view('auth/login', $data);
   }

   public function login()
   {
      return redirect()->to('/home');
   }

   public function logout()
   {
      // hancurkan semua sesi
      $this->session->sess_destroy();
      return redirect()->to('/');
   }
}
