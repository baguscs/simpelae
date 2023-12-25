<?php

namespace App\Http\Requests\Submission;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
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
        if ($this->attachments) {
            return [
                'attachments' => ['file', 'mimes:png,jpg,jpeg'],
            ];
        }
        return [
            'name' => ['required'],
            'nik' => ['required', 'min_digits:16', 'max_digits:16', 'numeric'],
            'place_of_birth' => ['required'],
            'date_of_birth' => ['date', 'required'],
            'gender' => ['required'],
            'religion' => ['required'],
            'address' => ['required'],
            'nationaly' => ['required'],
            'marital_status' => ['required'],
            'type' => ['required'],
            'job' => ['required'],
            'description' => ['required'],
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
            '*.max_digits' => 'Maksimal 16 angka',
            '*.min_digits' => 'Minimal 16 angka',
            '*.file' => 'Dokumen harus berupa file',
            '*.mimes' => 'Dokumen harus berupa file foto JPG, JPEG, PNG',
        ];
    }
}
