<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Contact extends Model
{
    protected $fillable = [
        'uuid',
        'first_name',
        'last_name',
        'gender',
        'email',
        'tell',
        'address',
        'building',
        'category_id',
        'detail'
    ];

    protected $hidden = [
        'id', 'created_at', 'updated_at'
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model){
            $model->uuid = (string) Str::uuid();
        });
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    use HasFactory;
}
