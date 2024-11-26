<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    use HasFactory;

    protected $fillable = [
        'application_id',
        'user_id',
        'name',
        'email',
        'content',
        'recommendation',
        'functionality',
        'usability',
        'update_me'
    ];

    /**
     * Get the application associated with this feedback.
     */
    public function application()
    {
        return $this->belongsTo(Application::class);
    }
}
