<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Attributes\Fillable;

use Illuminate\Database\Eloquent\Relations\HasMany;

#[Fillable(['first_name', 'last_name', 'specialization', 'contact_number', 'email'])]

class Doctor extends Model
{
    // One-to-Many
    public function patients(): HasMany
    {
        return $this->hasMany(Patient::class);
    }
}
