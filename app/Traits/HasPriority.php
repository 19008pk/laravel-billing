<?php

namespace App\Traits;

use Illuminate\Database\Eloquent\Builder;

trait HasPriority
{
    /**
     * Add a global scope for sorting by priority.
     *
     * This method should be overridden to add the global scope.
     *
     * @return void
     */
    public static function bootHasPriority(): void
    {
        static::addGlobalScope('priority', function (Builder $builder) {
            $builder->orderBy('priority');
        });

        static::creating(function ($model) {
            if (is_null($model->priority)) {
                $max = static::withoutGlobalScopes()->max('priority');
                $model->priority = is_numeric($max) ? $max + 1 : 0;
            }
        });
    }

    /**
     * Scope a query to only include high-priority models.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeHighPriority(Builder $query): Builder
    {
        return $query->where('priority', '>=', 10);
    }

    /**
     * Scope a query to only include low-priority models.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeLowPriority(Builder $query): Builder
    {
        return $query->where('priority', '<', 10);
    }

    /**
     * Get the priority label attribute.
     *
     * Returns 'High' if the priority is 10 or higher, otherwise 'Normal'.
     *
     * @return string
     */
    public function getPriorityLabelAttribute(): string
    {
        return $this->priority >= 10 ? 'High' : 'Normal';
    }
}
