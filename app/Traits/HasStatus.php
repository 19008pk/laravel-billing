<?php

namespace App\Traits;

use Illuminate\Database\Eloquent\Builder;

trait HasStatus
{
    public static function bootHasStatus(): void
    {
        //
    }

    /**
     * Initialize the trait by setting default attributes and casts.
     *
     * Sets 'is_active' attribute to true by default and ensures it is cast to a boolean.
     *
     * @return void
     */
    public function initializeHasStatus(): void
    {
        $this->casts['is_active'] = 'boolean';
        $this->attributes['is_active'] = true;
    }

    /**
     * Scope a query to only include active models.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeActive(Builder $query): Builder
    {
        return $query->where('is_active', true);
    }

    /**
     * Scope a query to only include inactive models.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeInactive(Builder $query): Builder
    {
        return $query->where('is_active', false);
    }

    /**
     * Get the status label.
     *
     * Returns 'Active' if the record is active, 'Inactive' otherwise.
     *
     * @return string
     */
    public function getStatusLabelAttribute(): string
    {
        return $this->is_active ? 'Active' : 'Inactive';
    }
}
