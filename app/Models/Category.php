<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $table ='categories';
    public $primaryKey ='id';
    public $timestamps = true;

    
    public function destinations()
    {
    return $this->hasMany(Destination::class);
    }

}