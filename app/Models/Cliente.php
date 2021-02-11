<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    
    use HasFactory;

    protected $guarded = ['id'];
    
    static $rules =[
        'nome'=>'required',
        'cpf'=>'required|unique:clientes',
        'telefone'=>'required',
        'nasc'=>'required',
        'sus'=>'required',
        'cep'=>'required',
        'logradouro'=>'required',
        'bairro'=>'required',
        'localidade'=>'required',
        'uf'=>'required',
        'numero'=>'required',
    ];


    static $rulesUpdate =[
        'nome'=>'required',
        'cpf'=>'required',
        'telefone'=>'required',
        'nasc'=>'required',
        'sus'=>'required',
        'cep'=>'required',
        'logradouro'=>'required',
        'bairro'=>'required',
        'localidade'=>'required',
        'uf'=>'required',
        'numero'=>'required',
       

    ];
    static $rulesCPF =[
        'cpf'=>'unique:responsavels',

    ];
    
}
