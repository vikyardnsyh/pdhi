<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FormDokterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'nama_lengkap' => 'required',
            'nama_panggilan' => 'required',
            'tempat_lahir' => 'required|alpha',
            'tanggal_lahir' => 'required',
            'alumni' => ['required','starts_with:universitas,Universitas,institut,Institut,Sekolah Tinggi,sekolah tinggi,Sekolah tinggi,akademi,Akademi'],
            'tahun_alumni' => 'required|numeric|digits:4',
            'alamat_rumah' => 'required',
            'no_telp' => 'required|numeric|digits_between:8,13',
            'email' => 'required|email',
            'no_telp_klinik' => 'nullable|numeric'
        ];
    }
}
