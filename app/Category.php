<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;


class Category extends Model
{
    use HasTranslations;

    protected $fillable=['name'];
    public $translatable = ['name'];

    public function products(){
        return $this->hasMany(Product::class,'cat_id','id');
    }

}
