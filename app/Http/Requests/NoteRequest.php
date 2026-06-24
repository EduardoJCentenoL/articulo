<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

use function Laravel\Prompts\title;

class NoteRequest extends FormRequest
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
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $note_id = $this->route('route') ? $this->route('note')-> id: null;

        return [
            "title"=>[
                'required|string|min:3|max:100|unique:notes,title(),column,except,id' . $this->route('note'),
            ],
            'content' => ['nullable', 'string', 'min:3', Rule::unique('categories', 'name')->ignore($note_id)],
            'category_id' => 'required|exists:categories,id'
        ];
    }
}
