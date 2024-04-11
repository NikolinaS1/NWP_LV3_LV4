<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = [
        'name',
        'description',
        'price',
        'completed_jobs', 
        'start_date',
        'end_date',
    ];

    public function users()
    {
        return $this->belongsToMany(User::class, 'project_user');
    }

    public function manager()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}