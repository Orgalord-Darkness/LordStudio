<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Episode extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'episode';

    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = 'id';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['nom', 'id_serie','saison','type','path', 'taille', 'extension'];

    public function categorie() { return $this->belongsTo(Serie::class, 'id_serie'); }

    public function episodes() { return $this->hasMany(Episode::class, 'id_serie'); }
}
