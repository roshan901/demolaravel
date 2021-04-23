<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Destination extends Model
{
    use HasFactory;

    protected $table='destinations';
    public $primaryKey = 'id';
    public $timestamps = true;


    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
