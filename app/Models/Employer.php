<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Support\Str;

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

        throw new HttpResponseException(
            redirect()->route("employers.show", $model),
        );
    }
}
