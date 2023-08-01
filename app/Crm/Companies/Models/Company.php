<?php

namespace Crm\Companies\Models;

use Crm\Contacts\Models\Contact;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
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
    public function contents()
    {
        return $this->hasMany(Contact::class);
    }

}
