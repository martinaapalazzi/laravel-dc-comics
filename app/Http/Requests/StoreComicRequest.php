<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreComicRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'required|string|max:64',
            'description' => 'nullable|string|max:4000',
            'src' => 'nullable|string|max:1024|min:1',
            'comic-price' => 'required|max:50',
            'comic-genre' => 'required|max:100|in:fantasy,action,documentary,comedy,horror',
            'sale_date' => 'required',
            'type' => 'required|max:30',
            'artists' => 'nullable',
            'writers' => 'nullable',
            // le chiavi sono i name="" dei miei input
        ];
    }

    public function messages(): array
    {
        return [
            // 'title.required' => 'MESSAGGIO ERRORE CUSTUMED'
        ];
    }
}
