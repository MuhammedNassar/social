<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class commentModel extends Model
{
    use HasFactory;
    protected $table ="comments";
    protected $fillable = ["text","post_id","user_id"];
    public $timestamps=false;
}
