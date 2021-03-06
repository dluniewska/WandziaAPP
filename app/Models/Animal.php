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

    // public $timestamps = false;

    protected $fillable = ['name', 'breed', 'location', 'chip'];
}
