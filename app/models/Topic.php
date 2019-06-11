<?php

namespace App\Models;

class Topic extends Model
{
    protected $fillable = ['title', 'body', 'text', 'user_id', 'category_id', 'reply_count', 'unsigned', 'view_count', 'last_reply_user_id', 'order', 'excerpt', 'slug'];

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
