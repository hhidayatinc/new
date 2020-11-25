<?php
use App\Album;
namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function __construct()
{
 $this->middleware('auth');
}

    public function index(){
       
        return view('about');
    }
    
    
}
