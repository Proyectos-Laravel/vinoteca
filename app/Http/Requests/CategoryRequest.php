<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
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
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:2000',
            'image' => $imageRules
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'La categoría es requerida',
            'name.string' => 'La categoría debe ser texto',
            'name.max' => 'La categoría no debe exceder los :max caracteres',
            'description.required' => 'La descripción es requerida',
            'description.string' => 'La descripción debe ser texto',
            'description.max' => 'La descripción no debe exceder los :max caracteres',
            'image.required' => 'La imagen es requerida',
            'image.image' => 'El archivo debe ser una imagen',
            'image.mimes' => 'La imagen debe ser del tipo :mimes',
            'image.max' => 'La imagen no debe exceder los :max kilobytes'
        ];
    }
}
