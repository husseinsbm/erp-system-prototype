<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class SellingUpdateRequest extends Request
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
      'note' => 'required',
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
    'phone' => $this->phone,
    'email' => $this->email,
    'customer_id' => $this->customer_id,

    
    ];
  }
}
