<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Override;

class CategoryRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true; // cuando es false no puede usarlo, caso contrario si es true pues si puede wey
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        /* Se compara la existencia del valor que proviene de la actualización
        Si no existe, entonces se deja nulo, lo que permite que se muestre el mensaje,
        pero como existe, entonces se ignora el nombre existente, actualiza y muestra */
        $category_id = $this->route('category') ? $this->route('category')-> id: null;
        return
        [

        'name' => [
            'required', 'string', 'min:3', 'max:50',
            Rule::unique('categories', 'name')->ignore($category_id),
        ],
        'description' => ['nullable', 'string', 'min:3', 'max:100'],

            // 'name' => 'string|required|min:3|max:50|unique:categories,name' . $this->route('category'),Rule::unique('categories','name')->ignore($this->route('category')),
            // 'description' => 'string|min:3|max:100'
        ];
    }

    // #[Override]
    // public function messages()
    // {
    //     return [
    //         'name.string' => 'El nombre debe ser una cadena de caracteres',
    //         'name.required' => 'El campo no puede ir vacio',
    //         'name.min' => 'No es posible agregar menos de 3 caracteres',
    //         'name.max' => 'NO es posible agregar más de 50 Carácteres',
    //         'name.unique' => 'Este valor ya existe'
    //     ];
    // }
}
