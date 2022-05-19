<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Donations;
use Carbon\Carbon;

class DonationsController extends Controller
{
    //
    function show($mes,$ano){
        if ($mes != null)
        {
            if($mes !== 'all')
            {
                $data=Donations::whereMonth("date",$mes)->whereYear("date",$ano)->orderBy("date","asc")->get();
                return $data;
            }
            else
            {
                $data=Donations::whereYear("date",$ano)->orderBy("date","asc")->get();
                return $data;
            }
        }
        else 
        {
            $data=Donations::where('project_mes',$mes)->get();
            return $data;
        }
    }

/*     function update(Request $request)
    {
        $project=array("is_publish"=>$request->is_publish,"goal"=>$request->goal,"raised"=>$request->raised,"location"=>$request->location,"date"=>$request->date,"story"=>$request->story,"feature_image"=>$request->feature_image,"updated_at"=>Carbon::now(),"date"=>$request->date);
        $p= Donations::where('project_mes',$request->project_mes)->update($project);
        if($p)
        {
            return response(['message'=>"Projecto atualizado com sucesso!"],200);
        }
        
    } */
/*     
    function delete(Request $request , $mes)
    {
        $p=Donations::where('project_mes',$mes)->delete();
        if($p)
        {
            return response(['message'=>"Projecto eliminado com sucesso!"],200);
        }
        else
        {
            return response(['message'=>"Não foi possível realizar o seu pedmeso !"],201);
        }
    } */
}
