<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Resultat extends Model
{
    use HasFactory;

    public function question()
    {
        return $this->belongsTo('App\Question');
    }

    public function reponse()
    {
        return $this->belongsTo('App\Reponse');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
