<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateBookRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'author_id'=>'required|numeric',
            'category_id'=>'required|numeric',
            'title'=>'required|min:3|max:255|string',
            'stock'=>'required|numeric',
            'description'=>'nullable|string',
        ];
    }

    public function messages()
    {
        return[
            'author_id.required'=>'El campo es requerido',
            'author_id.numeric'=>'El campo debe ser un número',
            'category_id.required'=>'El campo es requerido',
            'category_id.numeric'=>'El campo debe ser un número',
            'title.required'=>'El campo es requerido',
            'title.min'=>'El campo debe tener minimo 3 caracteres',
            'title.max'=>'El campo debe tener maximo 255 caracteres',
            'title.string'=>'El campo debe ser texto',
            'stock.required'=>'El campo es requerido',
            'stock.numeric'=>'El campo debe ser un número',
            'description.string'=>'El campo debe ser texto',
        ];
    }
}
