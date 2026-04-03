<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Attributes\Fillable;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

#[Fillable(['doctor_id','first_name', 'last_name','birth_date','gender', 'contact_number', 'address'])]

class Patient extends Model
{

    //One to Many(Inverse)
    public function doctor(): BelongsTo
    {
        return $this->belongsTo(Doctor::class);
    }

    //One to One
    public function medicalRecord(): HasOne
    {
        return $this->hasOne(MedicalRecord::class);
    }
    
    //Many to Many
    public function medications(): BelongsToMany
    {
        return $this->belongsToMany(Medication::class, 'patient_medications');
    }
}
