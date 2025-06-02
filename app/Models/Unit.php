<?php

namespace App\Models;

use App\Traits\HasPriority;
use App\Traits\HasStatus;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Unit extends Model
{
    /** @use HasFactory<\Database\Factories\UnitFactory> */
    use HasFactory, SoftDeletes, HasPriority, HasStatus;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * Accessor to provide a display name for the unit.
     * 
     * Includes the unit name and short code, separated by a space and
     * parentheses.
     * 
     * @return string
     */
    public function getDisplayNameAttribute(): string
    {
        return $this->name . ' (' . $this->short_code . ')';
    }
}
