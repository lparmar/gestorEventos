<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Activity extends Model implements HasMedia
{
    use HasFactory, SoftDeletes, InteractsWithMedia;

    protected $fillable = [
        'name',
        'body_activity',
        'date_of_celebration',
        'activity_types',
        'place_of_celebration',
    ];

    public function activityType()
    {
        return $this->belongsTo(ActivityType::class, 'activity_types');
    }

    public function activityBody()
    {
        return $this->belongsTo(BodyActivity::class, 'body_activity');
    }

    public function teachers()
    {
        return $this->belongsToMany(Teacher::class, 'teacher_assistances', 'activity_id', 'teacher_id');
    }

    //media
    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('documentation_activities')
            ->useDisk('documentation_activities')
            ->acceptsMimeTypes(['image/jpeg', 'image/png', 'image/jpg', 'application/pdf', 'application/docx', 'application/xlsx', 'application/csv', 'video/avi', 'video/mpeg', 'video/mov', 'video/mp4']);
    }
}
