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
            'wa' => "http://wa.me/62895365016420",
            'phone' => "+62 895365016420",
            'instagram' => "https://www.instagram.com/m.khoirul/?hl=id",
            'fb' => "https://www.facebook.com/sndv.20",
            'github' => "https://www.facebook.com/sndv.20",
        ];
        return view('pages/about', $data);
    }

    //--------------------------------------------------------------------

}
