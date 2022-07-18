<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Log;
use Illuminate\Database\Eloquent\Storage;

class Image extends Model
{
    use HasFactory;
    
    protected $fillable = [
		'path'
	];

/*   protected static function booting()
  {
    
    static::deleted(function (Image $image)) {
      Log::channel('stderr')->info('Evento ProdutoDeleted'.$image->id);
      Storage::disk('public')->delete($image->path);
    }

  } */

}
