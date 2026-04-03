<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Attributes\Fillable;

use Illuminate\Database\Eloquent\Relations\BelongsToMany;

#[Fillable(['name', 'description', 'dosage'])]

class Medication extends Model

{
    //Many to Many
    public function patients():BelongsToMany
    {
        return $this->belongsToMany(Patient::class, 'patient_medications');
    }
}
