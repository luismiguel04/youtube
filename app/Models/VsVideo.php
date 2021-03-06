<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class VsVideo extends Model
{
    use HasFactory;
    protected $table = 'vs_videos';

    public function user()
    {
        return $this->hasOne('App\Models\User', 'id', 'user_id');
    }


}
