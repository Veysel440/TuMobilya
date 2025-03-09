<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Settings extends Model
{
    use HasFactory;

    protected $table = 'settings';

    protected $fillable = [
        'phone',
        'email',
        'address',
        'short_address',
        'general_title',
        'general_description',
        'general_photo',
        'facebook',
        'twitter',
        'instagram',
        'youtube',
    ];
}
