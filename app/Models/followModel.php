<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class followModel extends Model
{
    use HasFactory;
    protected $table ="follows";
    protected $fillable = ["user_id","followed_by"];
    public $timestamps=false;
}
