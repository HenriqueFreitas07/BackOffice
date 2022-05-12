<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Timeline;
use Carbon\Carbon;

class TimelineController extends Controller
{
    function show(Request $request, $id){
        if($id=='app'){
            $data=Timeline::where('is_publish','yes')->get();
            return $data;
        }
        else if ($id=='all')
        {
            $data=Timeline::get();
            return $data;
        }
        else 
        {
            $data=Timeline::where('project_id',$id)->get();
            return $data;
        }
    }

    function update(Request $request)
    {
        $t=array("is_publish"=>$request->is_publish,"description"=>$request->description,"feature_image"=>$request->feature_image,"updated_at"=>Carbon::now(),"date"=>$request->date,"title"=>$request->title);
        $p= Timeline::where('project_id',$request->project_id)->update($t);
        if($p)
        {
            return response(['message'=>"Projecto atualizado com sucesso!"],200);
        }
        
    }

    function delete(Request $request , $id)
    {
        $p=Timeline::where('project_id',$id)->delete();
        if($p)
        {
            return response(['message'=>"Evento eliminado com sucesso!"],200);
        }
        else
        {
            return response(['message'=>"Não foi possível realizar o seu pedido !"],201);
        }
    }
}
