<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Animal extends Model
{
    public function user() {
        return $this->belongsTo(User::class);
    }

    protected $table = "animals";

    protected $fillable = ['name', 'breed', 'location', 'chip'];
}
