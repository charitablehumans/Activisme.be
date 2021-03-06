<?php

namespace ActivismeBe\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

class SecurityValidator extends FormRequest
{
    /**
     * {@inheritdoc}
     */
    protected $redirectRoute = 'account.settings';

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return ['password' => 'required|string|min:6|confirmed'];
    }

    /**
     * {@inheritdoc}
     */
    protected function getRedirectUrl() 
    {
        return $this->redirector->getUrlgenerator()->route(
            $this->redirectRoute, ['type' => 'beveiliging']
        );
    }
}
