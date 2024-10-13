<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Contact extends Model
{
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

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

// データベース上で数値になっている性別カラムをテキスト化
    const GENDER = [
        1 => ['label' => '男性'],
        2 => ['label' => '女性'],
        3 => ['label' => 'その他'],
    ];
    public function getGenderTextAttribute()
    {
        $gender = $this->attributes['gender'];

        if (!isset(self::GENDER[$gender])) {
            return '';
        }
        return self::GENDER[$gender]['label'];
    }

// ローカルスコープを利用した管理画面での検索
    // 名前検索
    public function scopeNameSearch($query, $name, $exact = false)
    {
        if (!empty($name)) {
            return $exact
                ? $query->where('name', $name)  // 完全一致
                : $query->where('name', 'like', '%' . $name . '%');  // 部分一致
        }
        return $query;
    }
    // メールアドレス検索
    public function scopeEmailSearch($query, $email, $exact = false)
    {
        if (!empty($email)) {
            $exact
                ? $query->where('email', $email)  // 完全一致
                : $query->where('email', 'like', '%' . $email . '%');  // 部分一致
        }
        return $query;
    }
    // 性別検索
    public function scopeGenderSearch($query, $gender)
    {
        if (!empty($gender)) {
            $query->where('gender', $gender);
        }
        return $query;
    }
    // カテゴリ検索
    public function scopeCategorySearch($query, $category_id)
    {
        if (!empty($category_id)) {
            $query->where('category_id', $category_id);
        }
        return $query;
    }
    // 日付検索
    public function scopeDateSearch($query, $date)
    {
        if (!empty($date)) {
            $query->whereDate('created_at', $date);
        }
        return $query;
    }

    use HasFactory;
}
