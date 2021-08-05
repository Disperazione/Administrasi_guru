<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GuruRequest extends FormRequest
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
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'nik' => 'required',
            'jabatan' => 'required',
            'alamat' => 'required',
            'fax' => 'required',
            'no_telp' => 'required',
            'id_jurusan' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Nama tidak boleh kosong',
            'email.required' => 'Email tidak boleh kosong',
            'password.required' => 'password tidak boleh kosong',
            'nik.required' => 'nik tisak boleh koosng',
            'jabatan.required' => 'jabatan tidak boleh koosng',
            'alamat.required' => 'alamat tidak boleh kosong',
            'fax.required' => 'fax tidak boleh koosng',
            'no_telp.required' => 'Nomor telepon tidak boleh koosng',
            'id_jurusan.required' => 'Jurusan tidak boleh'
        ];
    }
}
