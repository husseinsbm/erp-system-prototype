<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rfq extends Model
{
    //
	protected $table = 'rfq';
	public $primaryKey = 'id';
	public $timestamps = false;
protected $fillable = array('invoice_number', 'employee_id','location_id','record_time','payment_type','total_transaction');
	public function rfq_has_item()
	{
		return $this->hasMany('App\Rfqitem','rfq_id');
	}

	public function customer_belong_rfq()
	{
		return $this->belongsTo('App\Customer','customer_id');
	}
public function rfq_has_qtn()
	{
		return $this->hasOne('App\Qtnitem','rfq_id');
	}
	
}
