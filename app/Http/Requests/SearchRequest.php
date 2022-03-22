<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SearchRequest extends FormRequest
{
    protected $stopOnFirstFailure = true;
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
            'name' => 'string',
            'bedrooms' => 'numeric|integer',
            'bathrooms' => 'numeric|integer',
            'storeys' => 'numeric|integer',
            'garages' => 'numeric|integer',
            'price_start' => 'numeric|integer',
            'price_end' => 'numeric|integer',
        ];
    }
}
