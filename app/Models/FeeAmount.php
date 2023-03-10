<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FeeAmount extends Model
{
    

    public function fee_Category(){
        return $this->belongsTo(FeeCategory::class, 'fee_category_id', 'id');
    }

    public function studentClass(){
        return $this->belongsTo(StudentClass::class, 'student_class_id', 'id');
    }
}
