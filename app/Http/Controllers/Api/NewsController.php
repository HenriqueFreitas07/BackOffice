<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\News;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log; 


class NewsController extends Controller
{
    //
    function show(Request $request,$id)
    {
        if($id=='app'){
            $data=News::where('is_publish','yes')->get();
            return $data;
        }
        else if ($id=='all')
        {
            $data=News::get();
            return $data;
        }
        else 
        {
            $data=News::where('project_id',$id)->get();
            return $data;
        }
    }
    
    function update(Request $request)
    {
        
        $new=array("is_publish"=>$request->is_publish,"description"=>$request->description,"feature_image"=>$request->feature_image,"updated_at"=>Carbon::now(),"date"=>$request->date,"title"=>$request->title);
        $p= News::where('project_id',$request->project_id)->update($new);

        if($p)
        {
            return response(['message'=>"Notícia atualizada com sucesso!",'new'=>$p],200);
        }
        
    }
}
