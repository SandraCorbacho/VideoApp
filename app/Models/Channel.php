<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent;

class Channel extends Model
{
    use HasFactory;
    protected $PATH = 'channel';
    protected $fillable = ['user_id','description', 'title', 'image','active','video_id','path'];
    protected $table = 'channels';
    

    private function video()
    {
        return $this->hasMany(Video::class, 'video_id', 'id')->get();
    }
    public function add( $data )
    {
        return $this->create($data);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
}
