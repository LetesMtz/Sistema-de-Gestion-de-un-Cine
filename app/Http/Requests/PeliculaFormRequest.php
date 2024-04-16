<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PeliculaFormRequest extends FormRequest
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
            #Acá se declaran las reglas
            'id_estado'=>'required',
            'id_clasificacion'=>'required',
            'titulo'=>'required|max:50',
            'sinopsis'=>'required|max:150',
            'duracion'=>'required|max:6',
            'genero'=>'required|max:30',
            'portada'=>'required|max:75',
            'trailer'=>'required|max:75'
        ];
    }
}
