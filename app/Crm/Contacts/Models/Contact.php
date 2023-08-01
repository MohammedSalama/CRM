<?php

namespace Crm\Contacts\Models;

use Crm\Companies\Models\Company;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Contact extends Model
{
    use HasFactory , Notifiable;
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
