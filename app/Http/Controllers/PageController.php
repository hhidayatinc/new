<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function about(){
        return "1931710028 Hidayati Nur Chasanah";
    }

    public function home(){
        return 'Selamat Datang';
    }

    public function arikel($id){
        return 'Halaman artikel dengan id '.$id;
    }
}
