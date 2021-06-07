<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Perfiles extends Model
{
    use HasFactory;

    protected $fillable = ['nombre', 'descripcion'];

    public function usuario()
    {
        return $this->hasMany(Usuarios::class); //hasmany para un perfil con muchos usuarios
    }

    public static function getArrayIdNombre()
    {
        $p = Perfiles::orderBy('id')->get();
        $miArray = [];
        foreach ($p as $item) {
            $miArray[$item->id] = $item->nombre;
        }
        return $miArray;
    }
}
