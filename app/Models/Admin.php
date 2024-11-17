<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
    use HasFactory;

    // Tentukan nama tabel jika berbeda dengan plural dari nama model
    protected $table = 'admins';

    // Tentukan kolom yang dapat diisi (fillable)
    protected $fillable = [
        'email', 'password',
    ];

    // Tentukan atribut yang tidak boleh diisi (guarded)
    protected $guarded = [];

    // Tentukan apakah kolom password harus di-hash
    protected $hidden = [
        'password',
    ];
}
