<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\HasMedia;

class UsersProfile extends Model implements HasMedia
{
    use HasFactory,InteractsWithMedia, SoftDeletes;

    protected $table = 'users_profiles';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'surname_first',
        'surname_second',
        'birthdate',
        'user_id',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'birthdate' => 'datetime',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    //media
    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('users_avatar')
            ->singleFile()
            ->useDisk('users_avatar')
            ->acceptsMimeTypes(['image/jpeg', 'image/png', 'image/jpg']);
    }
}
