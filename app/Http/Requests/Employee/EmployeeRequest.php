<?php

namespace App\Http\Requests\Employee;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class EmployeeRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string',
            'age' => 'required|integer',
            'country_id' => 'required|integer|exists:countries,id',
            'email' => 'required|email',
            'salary' => 'required|numeric',
            'position' => 'required|string',
        ];
    }
}
