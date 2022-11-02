<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ApiController extends Controller
{
    //
    function index(){
        return Http::get("http://127.0.0.1:8000/api/v1/show/data");
    }
}
