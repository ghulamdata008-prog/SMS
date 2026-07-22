<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreSubjectRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [

            'name' => 'required|max:255',

            'code' => 'required|unique:subjects,code',

            'class_id' => 'required|exists:school_classes,id',

            'status' => 'required|boolean',

        ];
    }
}