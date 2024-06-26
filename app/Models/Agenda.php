<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agenda extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'description', 'student_id', 'servicio_id', 'start_time', 'end_time',
    ];

    public function student()
    {
        return $this->belongsTo(Student::class);
    }

    public function servicio()
    {
        return $this->belongsTo(Servicio::class);
    }
}
