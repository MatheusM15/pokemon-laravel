<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Marca extends Model
{
    use HasFactory;
    protected $fillable = ['name'];
    public function rules(){
        return [
            'name' => 'required',
        ];
    }
    public function feedback(){
        return [
            'required' => 'O :attrbute não foi fornecido'
        ];
    }
}
