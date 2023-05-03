<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class jobPhotos extends Model
{
    use HasFactory;

    protected $fillable = ['file'];

    public function worekr(): BelongsTo
    {
        return $this->belongsTo(User::class , 'worker_id');
    }
}
