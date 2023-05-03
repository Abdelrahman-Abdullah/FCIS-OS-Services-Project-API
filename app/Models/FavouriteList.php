<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FavouriteList extends Model
{
    use HasFactory;
    protected $fillable = ['worker_id'];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
