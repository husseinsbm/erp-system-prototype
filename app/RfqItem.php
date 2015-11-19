<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RfqItem extends Model
{
    //
	protected $table = 'rfq_item';
		public $primaryKey = 'id';
	public $timestamps = false;


	public function rfq_item_belong_rfq()
	{
		return $this->belongsTo('App/Rfq',"rfq_id");
	}

	public function rfq_item_belong_item()
	{
		return $this->belongsTo('App/Item',"item_id");
	}
	
}
