<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Attributes\Fillable;

use Illuminate\Database\Eloquent\Relations\BelongsTo;

#[Fillable(['patient_id','blood_type', 'allergies', 'medical_history', 'last_visit_date'])]

class MedicalRecord extends Model
{
    //One to Many(Inverse)
    public function patient():BelongsTo
    {
        return $this->belongsTo(Patient::class);
    }
}
