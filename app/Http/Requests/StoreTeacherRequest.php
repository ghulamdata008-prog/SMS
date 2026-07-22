<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTeacherRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
{
    return [

        'name' => 'required|max:255',

        'email' => 'required|email|unique:users,email',

        'password' => 'required|min:8',

        'phone' => 'required|max:20',

        'qualification' => 'required|max:255',

        'address' => 'required',

        'salary' => 'required|numeric',

        'subjects' => 'required|array',

        'subjects.*' => 'exists:subjects,id',

    ];
}
}