<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Orden extends Model
{
    public function producto()
{
    return $this->belongsTo('App\Models\Productos', 'producto_id');
}
    
    protected $fillable = ['usuario_id', 'producto_id', 'FechaEstado',];
    use SoftDeletes;
    use HasFactory;
}
