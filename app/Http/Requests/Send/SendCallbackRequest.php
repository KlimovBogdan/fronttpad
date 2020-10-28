<?php

namespace App\Http\Requests\Send;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Validator;

class SendCallbackRequest extends FormRequest {

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize() {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules() {
        return [
            'name'                => 'required',
            'phone'               => 'required',
            'personal_data_agree' => 'required',
            'product'             => '',
            'product_kol'         => '',
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages() {
        return [
            'name.required'                => 'Вам необходимо представиться, чтобы мы знали, кому звоним.',
            'phone.required'               => 'Вам необходимо ввести номер телефона, чтобы мы знали, как с вами связаться.',
            'personal_data_agree.required' => 'В соответствии Федеральным законом "О персональных данных" '
                                              . 'от 27.07.2006 N 152-ФЗ нам необходимо ваше согласие на обработку '
                                              . 'ваших персональных данных.',
        ];
    }

}
