<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateTeacherRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name'=>'required|string|max:255',
            'email'=>'required|email',
            'password'=>'nullable|min:8',
            'salary'=>'required|numeric|min:0',
            'subjects'=>'required|array',
            'subjects.*'=>'exists:subjects,id',
        ];
    }
}