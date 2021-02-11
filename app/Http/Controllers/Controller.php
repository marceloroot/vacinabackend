<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;



    public function success($msg='Salvo com sucesso',$time=1200)
    {
           return response()->json(['status' =>200,'success'=>$msg,'time' =>$time],200);
    }

    public function error($msg='Erro ao salvar ',$time=1200)
    {
           return response()->json(['status' =>400,'success'=>$msg,'time' =>$time],200);
    }
}
