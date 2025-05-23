<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    use HasFactory;

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
