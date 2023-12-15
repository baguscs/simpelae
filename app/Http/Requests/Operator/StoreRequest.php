<?php

namespace App\Http\Requests\Operator;

use App\Models\Operator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreRequest extends FormRequest
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
        if ($this->position == "Ketua RT") {
            return [
                'region_rt' => ['required', Rule::unique(Operator::class)],
            ];
        }
        return [
            'villager_id' => ['required'],
            'position' => ['required'],
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            '*.required' => 'Kolom ini harus diisi',
            'region_rt' => 'Jabatan sudah diisi',
        ];
    }
}
