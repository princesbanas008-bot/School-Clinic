<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Visit extends Model
{
    protected $fillable = [
        'student_id',
        'visit_date',
        'symptoms',
        'diagnosis',
        'treatment',
    ];

    /**
     * Get the student that owns the visit.
     */
    public function student()
    {
        return $this->belongsTo(User::class, 'student_id');
    }
}
