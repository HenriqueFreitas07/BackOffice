<?php

namespace App\Http\Controllers\api;

use App\Models\News;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    //
    function show()
    {
        $data = News::orderBy('id','DESC')->where('is_publish','yes')->get();
        return $data;
    }
}
