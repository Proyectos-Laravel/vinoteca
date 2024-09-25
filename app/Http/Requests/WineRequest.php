<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class WineRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $imageRules = 'sometimes|image|mimes:jpeg,jpg,png|max:2048';
        if ($this->isMethod('POST'))
        {
            $imageRules = 'required|image|mimes:jpeg,jpg,png|max:2048';
        }        
        return [
            'name' => ['required','string','max:255', Rule::unique('wines', 'name')->ignore($this->route('wine'))],
            'description' => ['required','string','max:2000'],
            'category_id' => ['required', 'exists:categories,id'],
            'year' => ['required','integer','min:' . now()->subYears(100)->year, 'max:' . now()->year],
            'price' => ['required', 'numeric', 'min:0'],
            'stock' => ['required', 'integer', 'min:0'],
            'image' => $imageRules
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'El nombre es obligatorio',
            'name.string' => 'El nombre debe ser un texto',
            'name.max' => 'El nombre no debe exceder los :max caracteres',
            'name.unique' => 'El vino ya existe',
            'description.required' => 'La descripción es requerida',
            'description.string' => 'La descripción debe ser texto',
            'description.max' => 'La descripción no debe exceder los :max caracteres',
            'category_id.required' => 'La categoria es obligatria',
            'category_id.exists' => 'La categoria seleccionada no existe',
            'year.required' => 'El año es obligatorio',
            'year.integer' => 'El año debe ser un número entero',
            'year.min' => 'El año no puede ser menor a :min',
            'year.max' => 'El año no puede ser mayor a :max',
            'price.required' => 'El precio es obligatorio',
            'price.numeric' => 'El precio debe ser un número',
            'price.min' => 'El precio no puede ser negativo',
            'stock.required' => 'El stock es obligatorio',
            'stock.integer' => 'El stock debe ser un número entero',
            'stock.min' => 'El stock no puede ser negativo',
            'image.required' => 'La imagen es requerida',
            'image.image' => 'El archivo debe ser una imagen',
            'image.mimes' => 'La imagen debe ser del tipo :mimes',
            'image.max' => 'La imagen no debe exceder los :max kilobytes'
        ];
    }
}
