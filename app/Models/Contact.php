<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Country;
use App\Models\Organization;

class Contact extends Model
{
    use HasFactory;

    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'phone',
        'state',
        'city',
        'address',
        'postal_code',
        'organization_id',
        'country_id'
    ];

    public function country(){
        return $this->belongsTo(Country::class);
    }

    public function Organization(){
        return $this->belongsTo(Organization::class);
    }


}
