<?php


namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model 
{
      protected $table = 'item';
    public $primaryKey = 'id';
     public $timestamps = false;
       protected $fillable = array('item_code','name','description_1','description_2','description_3','price_buy','price_sell','stock','unit');

        public function item_has_rfq()
    {
        return $this->hasMany('App\Rfq',"item_id");
    }
}
