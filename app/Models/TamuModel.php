<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TamuModel extends Model
{
    use HasFactory;

    protected $table = 'tamu';

    // protected $fillable = [
    //     'nama',
    //     'instansi',
    //     'keperluan',
    //     'kontak',
    //     'email',
    //     '_meta'
    // ];
}
