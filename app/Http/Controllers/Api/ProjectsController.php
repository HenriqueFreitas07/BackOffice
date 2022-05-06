<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Projects;

class ProjectsController extends Controller
{
    //
    function show(){
        $data=Projects::where('is_publish','yes')->get();
        return $data;
    }
}
