<?php

namespace App\Controllers;

class Pages extends BaseController
{
    public function index()
    {
        $data = [
            'title' => "Home | CodeIgniter4",
            'header' => "Dashboard",
            'nama' => "A. Musafir Khoirul Fattah"
        ];
        return view('pages/index', $data);
    }

    public function about()
    {
        $data = [
            'title' => "About Me | CodeIgniter4",
            'nama' => "A. Musafir Khoirul Fattah",
            'telp' => "http://wa.me/62895365016420",
            'insta' => "https://www.instagram.com/muss.kfc/?hl=id",
            'fb' => "https://www.facebook.com/sndv.20"
        ];
        return view('pages/about', $data);
    }

    //--------------------------------------------------------------------

}
