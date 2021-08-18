<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pokemon extends Model
{
    use HasFactory;
    protected $fillable = ['dono','name','ability','nivel','vida','img_pok'];

    public function getRules(){
        return [
            'dono' => 'required',
            'name' => 'required',
            'ability' => 'required',
            'nivel' => 'required|integer',
            'vida' => 'required|integer',
        ];
    }
    public function getFeedback(){
        return [
            'required' => 'O :attribute Não foi informado',
            'integer' => 'O :attrivute valor precisa ser um integer'
        ];
    }
}
