<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Hash;
use Laravel\Sanctum\HasApiTokens;

class Etudiant extends Authenticatable
{
    use \Backpack\CRUD\app\Models\Traits\CrudTrait;
    use HasFactory, HasApiTokens, SoftDeletes;

    protected $table = "etudiants";

    protected $fillable = [
        'code',
        'nom',
        'prénom',
        'email',
        'mot_de_passe',
        'telephone',
        'date_de_naissance',
        'lieu_de_naissance',
        'adress',
        'niveau', // 1, 2, 3
        'matière', // physique, math....
        'phase', // lycee, moyenne , primaire
        'type',
        'image'
    ];

    protected $hidden = [
        "mot_de_passe"
    ];

    public function setMotDePasseAttribute($value) {
        $this->attributes['mot_de_passe'] = Hash::make($this->code);
    }

    public function setTypeAttribute($value) {
        $this->attributes['type'] = "Etudiant";
    }

    public function setImageAttribute($value)
    {
        $attribute_name = "image";
        $disk = "uploads";
        $destination_path = "/uploads/etudiants";
        $this->uploadFileToDisk($value, $attribute_name, $disk, $destination_path);
    }

    public static function boot()
    {
        parent::boot();
        static::deleted(function($obj) {
            \Storage::disk('uploads/etudiants')->delete($obj->image);
        });
    }
}
