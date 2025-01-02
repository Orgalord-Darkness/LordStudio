<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str; 
use App\Http\Controller\CategorieController ; 

class Categorie extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'categorie';

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
    protected $fillable = ['nom_categorie', 'created_at', 'updated_at'];

    // Générer un UUID lors de la création d'un nouveau modèle
    protected static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            if (empty($model->{$model->getKeyName()})) {
                $model->{$model->getKeyName()} = (string) Str::uuid();
            }
        });
    }

    public $incrementing = false;
    protected $keyType = 'string';


    
}
