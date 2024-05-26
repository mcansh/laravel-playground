<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employer extends Model
{
    use HasFactory, HasUlids;

    // we will allow all fields to be mass assignable
    // except for the ones that are defined in the guarded property
    // this is the opposite of $fillable
    protected $guarded = [];

    public function jobs()
    {
        return $this->hasMany(Job::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
