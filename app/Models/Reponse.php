<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reponse extends Model
{
    use HasFactory;

    protected $fillable = ['titre','res', 'question_id'];

    public function question()
    {
        return $this->belongsTo('App\Question');
    }

    public function resultats()
    {
        return $this->hasMany('App\Resultat');
    }

    /*
    public function getResAttribute($attributes)
    {
        return [
            '0' => 'Non',
            '1' => 'Oui'
        ][$attributes];
    }
    */
}
