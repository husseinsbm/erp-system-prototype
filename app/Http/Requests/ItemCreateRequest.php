<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class ItemCreateRequest extends Request
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
      'code' => 'required',
      'name' => 'required',
     
      'price_buy' => 'required',

      'price_sell' => 'required',
      'stock' => 'required',
      'unit' => 'required',
    ];
    }

      public function postFillData()
  {
   
    return [
       'item_code' => $this->code,
      'name' => $this->name,
      'description_1' => $this->description_1,
      'description_2' => $this->description_2,
      'description_3' => $this->description_3,
      'price_buy' => $this->price_buy,

      'price_sell' => $this->price_sell,
      'stock' => $this->stock,
      'unit' => $this->unit,
    
    ];
  }
}
