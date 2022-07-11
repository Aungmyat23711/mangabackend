<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MangaImages extends Model
{
    use HasFactory;
    protected $fillable=['image','episode_id','image_path'];
    protected $table="mangaimages";
}
