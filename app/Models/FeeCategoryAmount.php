<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FeeCategoryAmount extends Model
{
    use HasFactory;

    public function feeCategory()
    {
        return $this->belongsTo(FeeCategory::class);
    }

    public function studentClass()
    {
        return $this->belongsTo(StudentClass::class);
    }
}
