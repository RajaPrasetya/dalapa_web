<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class WorkOrder extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'work_order';
    protected $primaryKey = 'id_workorder';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'id_workorder',
        'status',
        'deskripsi',
        'segmen',
        'created_by',
        'assigned_to',
        'id_tiket',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
    public function assignedUser()
    {
        return $this->belongsTo(User::class, 'assigned_to');
    }
    public function tiketGangguan()
    {
        return $this->belongsTo(TiketGangguan::class, 'id_tiket');
    }

    public function materials()
    {
        return $this->belongsToMany(
            Material::class,
            'workorder_material',
            'id_workorder',
            'id_material'
        )->withPivot('qty_used', 'total_price')->withTimestamps();
    }

    public function photos()
    {
        return $this->hasMany(Photo::class, 'id_workorder', 'id_workorder');
    }
}
