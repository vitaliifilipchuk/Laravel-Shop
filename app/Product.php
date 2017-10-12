<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['image', 'title', 'author', 'description', 'category_id', 'price'];

    public function category()
    {
        return $this->belongsTo('App\Category');
    }
    public static function productSearchByKeyword($query, $keyword)
    {
        if ($keyword!='') {
            $query->where(function ($query) use ($keyword) {
                $query->where("title", "LIKE","%$keyword%")
                    ->orWhere("author", "LIKE", "%$keyword%");
            });
        }
        return $query;
    }
}
