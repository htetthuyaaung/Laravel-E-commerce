<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductUpdateRequest extends FormRequest
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
              'name' => 'required|string',
          'price' => 'required|numeric'
        ];
    }
     public function messages()
    {
        return [
            'name.required' => 'နာမည်ထည့်ရန်လိုအပ်သည်',
             'name.string'=>'အမည်သည် စာသားပဲဖြစ်ရမည်',
            'price.required' => 'စျေးနှူန်းထည့်ပါ',
             'price.numeric'=>'စျေးနှူန်းသည် ကိန်း ဖြစ်ရမည်'
        ];
    }
}
