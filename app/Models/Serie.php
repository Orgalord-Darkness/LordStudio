<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Http\Controller\SerieController ; 

class Serie extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'serie';

    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = 'id_serie';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = [ 'nom', 'synopsis', 'id_categorie','id_image'];

    public function categorie() { return $this->belongsTo(Categorie::class, 'id_categorie'); }

    public function image() { return $this->belongsTo(Image::class, 'id_image'); }
    
    public function series() { return $this->hasMany(Serie::class, 'id_categorie'); }
}
