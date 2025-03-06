<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Support\Str;

class Tag extends Model
{
    use HasFactory;

    // we will allow all fields to be mass assignable
    // except for the ones that are defined in the guarded property
    // this is the opposite of $fillable
    protected $guarded = [];

    public function jobs()
    {
        return $this->belongsToMany(
            Job::class,
            relatedPivotKey: "job_listing_id",
        )->distinct();
    }

    public function getRouteKey()
    {
        return Str::slug($this->name) . "-" . $this->id;
    }

    public function resolveRouteBinding($value, $field = null)
    {
        $id = last(explode("-", $value));
        $model = parent::resolveRouteBinding($id, $field);

        if (!$model || $model->getRouteKey() === $value) {
            return $model;
        }

        throw new HttpResponseException(redirect()->route("tags.show", $model));
    }
}
