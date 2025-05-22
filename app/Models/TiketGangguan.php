<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TiketGangguan extends Model
{
    use HasFactory, SoftDeletes;
    
    protected $table = 'tiket_gangguan';
    protected $primaryKey = 'id_tiket';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'id_tiket',
        'headline',
        'deskripsi',
        'status',
    ];
}
