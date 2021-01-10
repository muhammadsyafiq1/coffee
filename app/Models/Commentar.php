<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Commentar extends Model
{
    use HasFactory;

    protected $fillable = [
        'name','email','website','message','story_id'
    ];

    public function story()
    {
        return $this->belongsTo(Story::class, 'story_id');
    }
}
