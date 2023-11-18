<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class surveillanceCertification extends Model
{
    use HasFactory;
    protected $table = 'surveillance_certifications';
    protected $guarded = [];
    public function detil()
    {
        return $this->hasOne('App\Models\detilCertification');
    }
}
