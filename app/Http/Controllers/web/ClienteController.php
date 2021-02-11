<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use App\Models\Cliente;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    protected $user;

    public function __construct(){                       
              $this->user = Auth()->guard('api')->user();  
    }
    public function store(Request $request){
        //dd($request->all());
        $validator =Validator::make($request->all(),Cliente::$rules);
        
        if($validator->fails()) {
             return response()->json(['error' => $validator->errors()],200);
        }
         //$request->set('user->id',$this->user->id);
       
       
        if(  Cliente::create(array_merge($request->all(),['status' => '0']))){
              return $this->success('Dadso salvo com sucesso');
        }
         
        return $this->error('Erro ao salvar dados');
    }


    public function show($cpf){
        $cliente = Cliente::where('cpf',$cpf)->first();
        if($cliente){
            return $cliente;
        }
        return $this->error('Erro ao buscar cliente');
    }

    public function showid($id){
        $cliente = Cliente::find($id);
        if($cliente){
            return $cliente;
        }
        return $this->error('Erro ao buscar cliente');
    }


    public function update(Request $request, $id)
    {
       
        $validator =Validator::make($request->all(),Cliente::$rulesUpdate);
        
        if($validator->fails()) {
             return response()->json(['error' => $validator->errors()],200);
        }
         $responsavel = Cliente::find($id);
         
         //Valida cpf duplicado no updatte
         if($request->cpf != $responsavel->cpf){
           $reponsavelValid = Cliente::where('cpf',$request->cpf)->first();
           //dd($reponsavelValid);
           if($reponsavelValid){
                $validator =Validator::make($request->all(),Cliente::$rulesCPF);
                return response()->json(['error' => $validator->errors()],200);
           }

        }
         if($responsavel->id){
 
            $request['user_id'] = $this->user->id;
             $responsavel->fill($request->all());
             
             if($responsavel->save()){
                 return $this->success('Dados atualizado com sucesso');
             }
         }
           return $this->error('Erro ao atualiza');
       
      
    }

    public function index()
    {
          $responsavels = Cliente::all();
          //Metodo laraval para transofmar o resultado para retorar as paginas que ta e os dados


          return compact('responsavels');
    }
}
