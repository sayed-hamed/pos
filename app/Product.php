<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;


class Product extends Model
{
    use HasTranslations;

    protected $guarded=['id'];
    public $translatable = ['name','desc'];


    public function cat(){
        return $this->belongsTo(Category::class);
    }

    public function getprofitpercentageAttribute(){
        $profit=$this->sale_price - $this->per_price;
        $profit_percentage=$profit * 100 / $this->per_price;
        return number_format($profit_percentage,'2');
    }

}//end model
