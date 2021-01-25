<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Entri extends Model
{
    use HasFactory;    

    protected $fillable = [
        'nama_pengarang',
        'judul_karya',
        'jenis_karya',
        'media',
        'tanggal_muat',
        'user_id_pengarang',
        'user_id_pembuat_entri',
        'bukti_pemuatan'
    ];

    protected $attributes = [
        'bukti_pemuatan' => '',
     ];
}
