<?php

namespace App\Models;

use App\Enums\AnswerType;
use App\Enums\PollType;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Hidehalo\Nanoid\Client as Nanoid;

class Poll extends Model
{
    protected $fillable = [
        'question',
        'details',
        'answer_type',
        'active',
        'type',
    ];

    protected $hidden = [
        'user_id',
        'id',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $nanoid = new Nanoid();
            $model->slug = $nanoid->generateId(10);
        });
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function options(): HasMany
    {
        return $this->hasMany(Option::class);
    }

    public function votes(): HasMany
    {
        return $this->hasMany(Vote::class);
    }

    public function resolveRouteBinding($value, $field = null)
    {
        return $this->with(['options'])->where($this->getRouteKeyName(), $value)->firstOrFail();
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    protected function casts(): array
    {
        return [
            'answer_type' => AnswerType::class,
            'type' => PollType::class,
        ];
    }
}
