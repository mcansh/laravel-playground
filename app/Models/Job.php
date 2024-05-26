<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    protected $table = "job_listings";

    use HasFactory, HasUlids;

    // we will allow all fields to be mass assignable
    // except for the ones that are defined in the guarded property
    // this is the opposite of $fillable
    protected $guarded = [];

    protected $validations = [
        "position" => "required|string|max:255",
        "location" => "required|string|max:255",
        "salary" => "required|string|max:255",
        "employer_id" => "required|integer|exists:employers,id",
        "tags" => "nullable|string",
    ];

    protected $casts = [
        "salary" => "integer",
    ];

    protected function salary(): Attribute
    {
        // we store the salary as cents so we need to convert it to and from dollars
        return Attribute::make(
            get: fn($value) => $value / 100,
            set: fn($value) => $value * 100,
        );
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
