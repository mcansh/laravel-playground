<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Number;

class Job extends Model
{
    protected $table = "job_listings";

    protected $fillable = ["position", "location", "salary", "company"];

    protected $casts = [
        "salary" => "integer",
    ];

    // salary attribute accessor
    // this is a laravel accessor that will format the salary attribute
    // to a currency format when it is being accessed
    // salary is stored in cent
    public function getSalaryAttribute($value)
    {
        return Number::currency($value / 100);
    }
}
