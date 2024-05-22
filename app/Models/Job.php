<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Number;

class Job extends Model
{
    protected $table = "job_listings";

    use HasFactory;

    protected $fillable = ["position", "location", "salary"];

    protected $casts = [
        "salary" => "integer",
    ];

    // when saving the salary attribute, we will convert it to cent and remove the comma and dollar sign
    public function setSalaryAttribute($value)
    {
        $this->attributes["salary"] =
            (int) str_replace([",", "$"], "", $value) * 100;
    }

    // salary attribute accessor
    // this is a laravel accessor that will format the salary attribute
    // to a currency format when it is being accessed
    // salary is stored in cent
    public function getSalaryAttribute($value)
    {
        return Number::currency($value / 100);
    }

    public function employer()
    {
        return $this->belongsTo(Employer::class);
    }

    public function tags()
    {
        return $this->belongsToMany(
            Tag::class,
            foreignPivotKey: "job_listing_id",
        );
    }
}
