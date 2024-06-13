<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Support\Str;

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
        )->distinct();
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getRouteKey()
    {
        return Str::slug($this->employer->name) .
            "-" .
            Str::slug($this->position) .
            "-" .
            $this->id;
    }

    public function resolveRouteBinding($value, $field = null)
    {
        $id = last(explode("-", $value));
        $model = parent::resolveRouteBinding($id, $field);

        if (!$model || $model->getRouteKey() === $value) {
            return $model;
        }

        throw new HttpResponseException(redirect()->route("jobs.show", $model));
    }
}
