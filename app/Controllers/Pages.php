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
            'header' => "About Me",
            'nama' => "A. Musafir Khoirul Fattah",
            'whatsapp' => "http://wa.me/62895365016420",
            'phone' => "+62 895365016420",
            'instagram' => "https://www.instagram.com/musafir.khoirul/?hl=id",
            'facebook' => "https://www.facebook.com/sndv.20",
            'github' => "https://github.com/khoirulfa",
        ];
        return view('pages/about', $data);
    }

    //--------------------------------------------------------------------

}
