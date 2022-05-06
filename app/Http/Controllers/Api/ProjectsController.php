<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Projects;

class ProjectsController extends Controller
{
    //
    function show(Request $request, $id){
        if($id=='app'){
            $data=Projects::where('is_publish','yes')->get();
            return $data;
        }
        else if ($id=='all')
        {
            $data=Projects::get();
            return $data;
        }
        else 
        {
            $data=Projects::where('project_id',$id)->get();
            return $data;
        }
    }
}
