<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TamuRequest extends FormRequest
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
            'nama'                  => 'required|min:3|max:35',
            'instansi'              => 'required|min:3',
            'hp'                    => 'required|min:3|max:12',
            'email'                 => 'required|email',
            'keperluan'             => 'required|min:10',
            '_meta'                 => 'required'
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'nama.required'         => 'Nama Lengkap wajib diisi',
            'nama.min'              => 'Nama lengkap minimal 3 karakter',
            'nama.max'              => 'Nama lengkap maksimal 35 karakter',

            'instansi.required'     => 'Instansi Harap Diisi',
            'instansi.min'          => 'Minal 3 Karakter',

            'email.required'        => 'Email wajib diisi',
            'email.email'           => 'Email tidak valid',

            'keperluan.required'     => 'Keperluan wajib diisi',
            'keperluan.min'          => 'Harap Mengisi dengan Jelas untuk Keperluan Anda.',

            'hp.required'        => 'Harap isi Kontak yang dapat di Hubungi',
            'hp.min'             => 'Harap Masukan Kontak yang dapat dihubungi',
            'hp.max'             => 'Harap Masukan Kontak yang dapat dihubungi',

            '_meta'              => 'Mohon foto terlebih dahulu'
        ];
    }

    /**
     * Get custom attributes for validator errors.
     *
     * @return array
     */
    public function attributes()
    {
        return [
            'nama'      => 'Nama',
            'instansi'  => 'Instansi',
            'keperluan' => 'Keperluan',
            'hp'        => 'Kontak Yang Dihubungi',
            'email'     => 'Email',
            '_meta'     => 'Foto'
        ];
    }
}
