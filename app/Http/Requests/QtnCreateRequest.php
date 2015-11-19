<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class RfqCreateRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [

      'number' => 'required',
      'date' => 'required',
      'customer' => 'required',
      'attn' => 'required',
      'delivery_cost' => 'required',
  

    ];
    }

      public function postFillData()
  {
   
    return [
      
      'number' => $this->invoice,
    'date' => $this->date,
    'customer' => $this->customer,
    'attn' => $this->attn,
    'note' => $this->note,
  
    'customer_id' => $this->customer_id,
    'delivery_cost' => $this->delivery_cost,
    'delivery_point' => $this->delivery_point,
    'tax' => $this->tax,
    'validity' => $this->validity,

    
    ];
  }
}

