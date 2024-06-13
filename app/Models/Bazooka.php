<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bazooka extends Model
{
    protected $table = 'bazooka';

    protected $fillable = [
        'nama_senjata',
        'jenis_senjata',
        'jumlah',
        'harga',
        'foto'
    ];
}
