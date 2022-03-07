<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;
    /*
     * Fillable
     */
    protected $guarded = [];
    /*
    * Attributes
    */
    public function getNameAttribute($value)
    {
        return ucwords($value);
    }
    /*
     * Relations
     */
    public function company()
    {
        return $this->belongsTo(Company::class);
    }
}
