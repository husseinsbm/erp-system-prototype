<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class QtnItem extends Model
{
    //
	protected $table = 'qtn_item';
		public $primaryKey = 'id';
	public $timestamps = false;


	public function qtn_item_belong_qtn()
	{
		return $this->belongsTo('App/Qtn',"qtn_id");
	}

	public function qtn_item_belong_item()
	{
		return $this->belongsTo('App/Item',"item_id");
	}
	
}
