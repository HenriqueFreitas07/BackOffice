<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Donations;
use Carbon\Carbon;

class DonationsController extends Controller
{
    //
    function show(Request $request, $id){

        if ($id != null)
        {
            if($id !== 'all')
            {
                $data=Donations::whereMonth("date",$id)->orderBy("date","asc")->get();
                return $data;
            }
            else
            {
                $data=Donations::all();
                return $data;
            }
        }
        else 
        {
            $data=Donations::where('project_id',$id)->get();
            return $data;
        }
    }

/*     function update(Request $request)
    {
        $project=array("is_publish"=>$request->is_publish,"goal"=>$request->goal,"raised"=>$request->raised,"location"=>$request->location,"date"=>$request->date,"story"=>$request->story,"feature_image"=>$request->feature_image,"updated_at"=>Carbon::now(),"date"=>$request->date);
        $p= Donations::where('project_id',$request->project_id)->update($project);
        if($p)
        {
            return response(['message'=>"Projecto atualizado com sucesso!"],200);
        }
        
    } */
/*     
    function delete(Request $request , $id)
    {
        $p=Donations::where('project_id',$id)->delete();
        if($p)
        {
            return response(['message'=>"Projecto eliminado com sucesso!"],200);
        }
        else
        {
            return response(['message'=>"Não foi possível realizar o seu pedido !"],201);
        }
    } */
}
