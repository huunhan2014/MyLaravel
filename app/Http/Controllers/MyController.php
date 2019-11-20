<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

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
    // đặt Cookie  
    public function setCookie()
    {
        $response = new Response();
        $response->withCookie('Project', 'Laravel', 0.1);
        echo "Da set Cookie";
        return $response;
    }
    //hiển thị Cookie 
    public function getCookie(Request $request)
    {
        echo "Cookie la`:";
        return $request->cookie('Project');
    }
    // Upload File
    public function postFile(Request $request)
    {
        if ($request->hasFile('myFile')) {
            $file = $request->file('myFile');
            if ($fileExtension = $file->getClientOriginalExtension() == 'JPG') {
                $fileName = $file->getClientOriginalName();
                $file->move('images', $fileName);
                echo "Da upload file:" . $fileName;
            } else {
                echo "Ko phai JPG";
            }
        } else {
            echo 'chua co file';
        }
    }
    //Xuat Json
    public function getJson()
    {
        // $arr = ['Laravel', 'PHP', 'MySql', 'Javascript'];
        $arr = ['Project' => 'MyLaravel','name'=>'Nhan'];
        return response()->json($arr);
    }
}
