<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUpdateTenant extends FormRequest
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
        $id = $this->segment(3);

        $rules = [
            'name' => ['required', 'string', 'min:3', 'max:255'],
            'email' => ['required', 'string', 'email', 'min:3', 'max:255', "unique:users,email,{$id},id"],
            'cnpj' => ['required', 'numeric', 'digits:14', "unique:tenants,cnpj,{$id},id"],
            'logo' => ['nullable', 'image'],
            'active' => ['required', 'in:Y,N'],

            //subscription
            'subscription' => ['nullable', 'date'],
            'expires_at' => ['nullable', 'date'],
            'subscription_id' => ['nullable', 'max:255'],
            'subscription_active' => ['nullable', 'boolean'],
            'subscription_suspended' => ['nullable', 'boolean'],
        ];

        // if ($this->method() == 'PUT') {
        //     $rules['logo'] = ['nullable', 'image'];
        // }

        return $rules;
    }
}
