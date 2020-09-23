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
      $username = $this->request->getPost('username');
      $password = $this->request->getPost('password');

      $cek = $this->AuthModel->cek_login($username, $password);

      if (($cek['username'] == $username) && ($cek['password'] == $password)) {
         session()->set('username', $cek['username']);
         session()->set('name', $cek['name']);

         return redirect()->to('/home');
      } else {
         session()->setFlashData('gagal', 'Username atau password anda salah');

         return redirect()->to('/');
      }
   }
}
