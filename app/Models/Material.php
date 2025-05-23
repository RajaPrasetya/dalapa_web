<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Material extends Model
{
    use HasFactory;

    protected $table = 'material';
    protected $primaryKey = 'id_material';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'id_material',
        'name',
        'quantity',
        'price',
    ];

    public function workOrders()
    {
        return $this->belongsToMany(
            WorkOrder::class,
            'workorder_material',
            'id_material',
            'id_workorder'
        )->withPivot('qty_used', 'total_price')->withTimestamps();
    }
}
