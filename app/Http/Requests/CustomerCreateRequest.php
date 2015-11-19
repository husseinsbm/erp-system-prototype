<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class CustomerCreateRequest extends Request
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

      
        'name' => 'required',
        'address' => 'required',
        'city' => 'required',
        'province' => 'required',
        'phone' => 'required',
'email' => 'required|email',
'attn' => 'required',
    
    ];
    }

      public function postFillData()
  {
   
    return [

    'name' => $this->name,
        'address' => $this->address,
        'city' => $this->city,
        'province' => $this->province,
        'phone' => $this->phone,
        'email' => $this->email,
        'attn' => $this->attn,
    ];
}
}
