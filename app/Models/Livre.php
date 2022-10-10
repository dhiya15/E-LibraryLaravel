<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Livre extends Model
{
    use \Backpack\CRUD\app\Models\Traits\CrudTrait;
    use HasFactory;

    protected $fillable = [
        "cotation",
        "titres",
        "auteur",
        "inventaire",
        "nombre_ex",
        "spécialiste",
        "date_edition",
        "editeur",
        "date_entrée",
        "isbn",
        "image"
    ];

    public function setImageAttribute($value)
    {
        $attribute_name = "image";
        $disk = "uploads";
        $destination_path = "/uploads/livres";
        $this->uploadFileToDisk($value, $attribute_name, $disk, $destination_path);
    }

    public static function boot()
    {
        parent::boot();
        static::deleted(function($obj) {
            \Storage::disk('uploads/livres')->delete($obj->image);
        });
    }
}
