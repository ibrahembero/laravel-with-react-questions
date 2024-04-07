<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Question extends Model
{
    use HasFactory;

    protected $fillable = ['question_title', 'image','created_at','updated_at'];

    protected $hidden = [
        'created_at',
        'updated_at',
       
    ];

    // Optional: Add a relationship to another model if needed (e.g., User)
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
