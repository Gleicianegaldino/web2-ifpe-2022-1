<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    use HasFactory;

    protected $fillable = [       
    	'titulo' ,'descricao', 'quantidade', 'valor'
    ];

    public function user() {
        return $this->belongsTo('App\Models\User');
    }
    
    
    public function image()
    {
        return $this->hasOne('App\Models\Image');
    }

    public function tags()
    {
        return $this->belongsToMany('App\Models\Tag')->withTimestamps();
    }
    
}
