<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Application extends Model implements HasMedia
{
    use InteractsWithMedia;

    /** @use HasFactory<\Database\Factories\ApplicationFactory> */
    use HasFactory;

    protected $guarded = [];
    protected $casts = [
        'published_at' => 'datetime',
    ];

    //Model methods
    public function author()
    {
        return $this->belongsTo(User::class, 'author_id');
    }

    public function authorized($user)
    {
        if($user->is_admin) {
            return;
        }
        if ($this->author_id == $user->id) {
            return;
        }

        abort(401);
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'application_category');
    }

    public function feedback()
    {
        return $this->hasMany(Feedback::class);
    }

    // Model scopes --------
    public function scopePublished($query)
    {
        return $query->whereNotNull('published_at')->where('published_at', '<=', now());
    }

    public function summary (int $length=50): string
    {
        return Str::of($this->description)->limit($length);
    }
}
