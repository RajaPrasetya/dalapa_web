<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Photo extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'photo';
    protected $primaryKey = 'id_photo';
    public $incrementing = true;

    protected $fillable = [
        'id_workorder',
        'photo_path',
        'type',
    ];
    public function workOrder()
    {
        return $this->belongsTo(WorkOrder::class, 'id_workorder', 'id_workorder');
    }
}
