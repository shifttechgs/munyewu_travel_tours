<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class EnquiryRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'service' => ['required', Rule::in(array_keys(config('business.services')))],
            'name' => ['required', 'string', 'max:120'],
            'contact' => ['required', 'string', 'max:120'],
            'trip_date' => ['nullable', 'date', 'after_or_equal:today'],
            'group_size' => ['nullable', 'integer', 'min:1', 'max:60'],
            'pickup' => ['nullable', 'string', 'max:160'],
            'destination' => ['nullable', 'string', 'max:160'],
            'notes' => ['nullable', 'string', 'max:1000'],

            // Honeypot: real visitors leave this empty. Bots tend to fill every field.
            'company' => ['nullable', 'size:0'],
        ];
    }

    public function messages(): array
    {
        return [
            'service.required' => 'Choose the service you would like to enquire about.',
            'service.in' => 'Choose one of the listed services.',
            'name.required' => 'Please add your name so we know who to reply to.',
            'contact.required' => 'Add a phone number or email so we can send your quote.',
            'trip_date.after_or_equal' => 'Choose today or a future date.',
            'company.size' => 'Something went wrong. Please try again.',
        ];
    }

    public function attributes(): array
    {
        return [
            'trip_date' => 'preferred date',
            'group_size' => 'group size',
        ];
    }
}
