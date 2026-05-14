<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Medicine extends Model
{
    protected $fillable = [
        'name',
        'stock',
        'unit',
        'low_stock_threshold',
    ];

    /**
     * Check if the medicine is low on stock.
     */
    public function isLowStock(): bool
    {
        return $this->stock <= $this->low_stock_threshold;
    }
}
