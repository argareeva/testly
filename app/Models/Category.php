<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    /** @use HasFactory<\Database\Factories\CategoryFactory> */
    use HasFactory;

    protected $guarded = [];
    public function authorized($user)
    {
        if($user->is_admin) {
            return;
        }

        abort(401);
    }

    //Model relationship
    public function applications()
    {
        return $this->belongsToMany(Application::class, 'application_category');
    }
}
