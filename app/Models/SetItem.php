<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SetItem extends Model
{
    use HasFactory;
    public function set()
    {
        return $this->belongsTo(Set::class);
    }

    public function color()
    {
        return $this->belongsTo(Colors::class);
    }

    public function size()
    {
        return $this->belongsTo(Size::class);
    }
    public function product()
    {
        return $this->belongsTo(Products::class, 'product_id');
    }
}
