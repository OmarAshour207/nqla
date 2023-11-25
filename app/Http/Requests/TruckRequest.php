<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TruckRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $rules = [];
        $locales = config('app.available_locales');

        foreach ($locales as $key => $locale) {
            $rules["name:$key"] = 'required|string';
        }
        $rules['image'] = 'required|string';

        return $rules;
    }
}
