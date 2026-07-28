<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    use HasFactory;

    protected $fillable = [
        'image_url',
        'name',
        'designation',
        'short_bio',
        'x_url',
        'facebook_url',
        'linkedin_url',
        'status',
        'availability',
    ];

    protected $casts = [
        'availability' => 'array',
    ];

    public function appointments()
    {
        return $this->hasMany(Appointment::class);
    }
}
