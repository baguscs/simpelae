<?php

namespace App\Http\Requests\Villager;

use App\Models\Villager;
use App\Models\User;
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
        return [
            'name' => ['required'],
            'region_rt' => ['required'],
            'nik' => ['required', 'min_digits:16', 'max_digits:16', 'numeric', Rule::unique(Villager::class)],
            'number_kk' => ['required', 'min_digits:16', 'max_digits:16', 'numeric', Rule::unique(Villager::class)],
            'place_of_birth' => ['required'],
            'date_of_birth' => ['date', 'required'],
            'gender' => ['required'],
            'religion' => ['required'],
            'address' => ['required'],
            'nationaly' => ['required'],
            'job' => ['required'],
            'phone_number' => ['required', 'min_digits:12', 'max_digits:12', 'numeric'],
            'email' => ['email', 'max:255', 'email:rfc,dns', Rule::unique(User::class)],
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
            'nik.max_digits' => 'Maksimal 16 angka',
            'number_kk.max_digits' => 'Maksimal 16 angka',
            'nik.min_digits' => 'Minimal 16 angka',
            'number_kk.min_digits' => 'Minimal 16 angka',
            'phone_number.min_digits' => 'Minimal 12 angka',
            'phone_number.max_digits' => 'Minimal 12 angka',
            'phone_number.numeric' => 'Harus berupa angka',
            'date_of_birth.date' => 'Harus berupa tanggal',
            'email.email' => 'Email tidak dikelani sumbernya',
            'email.unique' => 'Email telah digunakan oleh warga lain',
        ];
    }
}
