<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class serviceConsultation extends Model
{
    use HasFactory;
    protected $table = 'service_consultations';
    protected $guarded = [];
}