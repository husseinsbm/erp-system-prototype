<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    //
       protected $table = 'customer';
    public $primaryKey = 'id';
     public $timestamps = false;
       protected $fillable = array('name','address','city','province','phone','email','attn');

       	public function customer_has_rfq()
	{
		return $this->hasMany('App\Rfq',"customer_id");
	}

}
