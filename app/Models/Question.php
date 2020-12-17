<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;

    protected $fillable = ['titre'];

    public function reponses()
    {
        return $this->hasMany('App\Reponse');
    }

    public function resultats()
    {
        return $this->hasMany('App\Resultat');
    }
}
