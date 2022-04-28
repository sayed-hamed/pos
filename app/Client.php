<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;


class Client extends Model
{
    use HasTranslations;

    protected $fillable=['name','phone','address'];

    public $translatable = ['name','address'];

}
