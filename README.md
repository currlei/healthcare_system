# Healthcare System
This system demonstrates proper use of database relationships including One-to-One, One-to-Many, and Many-to-Many.

## ERD Overview

<img width="702" height="513" alt="Screenshot 2026-04-04 120229" src="https://github.com/user-attachments/assets/45208c66-5ddc-48bc-b1ed-d4d03de8bf4c" />


## Database Relationships

| Relationship | Type |
| -------- | -------- |
| Patient ↔ Medical Record | One-to-One |
| Doctor → Patients | One-to-Many |
| Patient ↔ Medication | Many-to-Many |
 

## Database Structure
#### Patient
- id
- doctor_id (FK)
- first_name
- last_name
- birth_date
- gender
- contact_number
- address

#### Doctor
- id
- first_name
- last_name
- specialization
- contact_number
- email
#### Medical Record
- id
- patient_id (FK, unique)
- blood_type
- allergies
- medical_history
- last_visit_date

#### Medication
- id
- name
- description
- dosage

#### Patient_Medications (Pivot Table)
- id
- patient_id (FK)
- medication_id (FK)
