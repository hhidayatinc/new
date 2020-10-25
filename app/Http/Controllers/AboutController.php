<?php
use App\Album;
namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index(){
       
        return view('about');
    }
    
    
}
