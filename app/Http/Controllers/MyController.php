<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MyController extends Controller
{
    public function hamXinChao($ten)
    {
        echo 'xin chao: ' . $ten;
    }
    public function ham1()
    {
        $url = route('Route1');
        return redirect($url);
    }
    public function getUrl(Request $request)
    {
        echo $request->path() . '<br>'; // tra ve path (duong dan) cua route goi no
        echo $request->url() . '<br>';
        echo ($request->is('Get*')) ? 'true' . '<br>' : 'false' . '<br>';
        echo ($request->isMethod('post')) ? 'day la method post' : 'day la phuong thuc get';
        return;
    }
    public function postForm(Request $request)
    {
        // echo 'Ten cua ban la:';
        // return $request->HoTen;

        $HoTen = ($request->has('HoTen')) ? $request->input('HoTen') : '';
        echo $HoTen;

    }
}
