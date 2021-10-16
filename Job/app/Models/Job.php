<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;

    protected $table = 'jobs';

    protected $fillable = [
        'id',
        'user_id',
        'title',
        'place',
        'type',
        'salary',
    ];

    public function CompanyID()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
