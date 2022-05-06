<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Projects;
use Carbon\Carbon;

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

    function update(Request $request)
    {
        $project=array("is_publish"=>$request->is_publish,"goal"=>$request->goal,"raised"=>$request->raised,"location"=>$request->location,"date"=>$request->date,"story"=>$request->story,"feature_image"=>$request->feature_image,"updated_at"=>Carbon::now(),"date"=>$request->date);
        $p= Projects::where('project_id',$request->project_id)->update($project);
        if($p)
        {
            return response(['message'=>"Projecto atualizado com sucesso!"],200);
        }
        
    }
}
