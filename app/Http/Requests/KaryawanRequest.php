<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class KaryawanRequest extends FormRequest
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
        $emailRule = Rule::unique('karyawans', 'email');

        if ($this->method() === 'PUT' || $this->method() === 'PATCH') {
            $id = $this->route('karyawan');
            $emailRule->ignore($id);
        }

        return [
            'departemen_id' => 'required|exists:departemens,id',
            'nama' => 'required|min:3|max:100',
            'email' => ['required', 'email', $emailRule],
            'jabatan' => 'required|min:3|max:50',
            'umur' => 'required|numeric|min:17|max:100',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg|max:2048'
        ];
    }

    public function messages(): array
    {
        return [
            'departemen_id.required' => 'Departemen harus dipilih',
            'departemen_id.exists' => 'Departemen tidak valid',
            'nama.required' => 'Nama wajib diisi',
            'nama.min' => 'Nama minimal 3 karakter',
            'email.required' => 'Email wajib diisi',
            'email.email' => 'Format email tidak valid',
            'email.unique' => 'Email sudah terdaftar',
            'jabatan.required' => 'Jabatan wajib diisi',
            'umur.required' => 'Umur wajib diisi',
            'umur.min' => 'Umur minimal 17 tahun',
            'foto.image' => 'File harus berupa gambar',
            'foto.mimes' => 'Format foto harus jpeg, png, atau jpg',
            'foto.max' => 'Ukuran foto maksimal 2MB'
        ];
    }
}
