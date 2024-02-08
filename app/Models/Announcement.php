<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Announcement extends Model
{
    use HasFactory;
    protected $table = 'announcements';

    protected $fillable = [
        'title',
        'post',
        'img',
        'description',
    ];
    public function skills()
    {
        return $this->belongsToMany(Skill::class);
    }
    
    public function users()
    {
        return $this->belongsToMany(User::class);
    }
}