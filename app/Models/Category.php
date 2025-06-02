<?php

namespace App\Models;

use App\Traits\HasPriority;
use App\Traits\HasStatus;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Models\Activity;
use Spatie\Activitylog\Traits\LogsActivity;

class Category extends Model
{
    /** @use HasFactory<\Database\Factories\CategoryFactory> */
    use HasFactory, SoftDeletes, HasPriority, HasStatus, LogsActivity;

    protected static $logName = 'category';
    protected static $logAttributes = ['name'];
    protected static $logOnlyDirty = true;
    protected $guarded = [];

    /**
     * Customize the activity log options for this model.
     *
     * @return \Spatie\Activitylog\LogOptions
     */
    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->logOnly(['name'])
            ->logOnlyDirty()
            ->setDescriptionForEvent(fn(string $eventName) => "Category has been {$eventName}");
    }

    public function activities()
    {
        return $this->morphMany(Activity::class, 'subject')->latest();
    }
}
