<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usuarios extends Model
{
    use HasFactory;

    protected $fillable = ['nomusu', 'mail', 'localidad', 'perfiles_id'];

    public function perfiles()
    {
        return $this->belongsTo(Perfiles::class); //belongsTo para un Usuario solo puede pertenecer a un perfil
    }
}
