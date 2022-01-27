<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class postModel extends Model
{
    use HasFactory;
    protected $table ="posts";
    protected $fillable = ["desc","image","user_id"];
    public $timestamps=false;
}
