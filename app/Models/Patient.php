<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model {
    use HasFactory;
    protected $fillable = ['user_id',
     'doctor_id', 'first_name',
     'last_name',
     'birth_date',
     'gender',
     'contact_number', 
     'address'];

    public function doctor() {
         return $this->belongsTo(Doctor::class); 
         
         }
    public function medications() { 
        return $this->belongsToMany(Medication::class, 'patient_medications'); 
        }
}