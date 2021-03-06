<?php

namespace Aizxin\Models;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $fillable = ['category_id', 'title','img','content_html','intro','status','content_mark'];
    /**
     *  [category 与分类关系]
     */
    public function category()
    {
        return $this->belongsTo('Aizxin\Models\Category', 'category_id', 'id');
    }
}
