<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Qtn extends Model
{
    //
	protected $table = 'qtn';
	public $primaryKey = 'id';
	public $timestamps = false;
protected $fillable = array( 'number',  'date', 'to', 'attn', 'delivery_cost', 'total', 'delivery_time', 'delivery_point', 'tax', 'validity');
	public function qtn_has_item()
	{
		return $this->hasMany('App\QtnItem','qtn_id');
	}

	public function customer_belong_qtn()
	{
		return $this->belongsTo('App\Customer','to');
	}
	public function rfq_belong_qtn()
	{
		return $this->belongsTo('App\Rfq','rfq_id');
	}

	
}
