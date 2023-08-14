<?php

namespace App\Http\Requests\CashClosure;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
        return [
            "user_id"=>"required|exists:users,id",
            "turn"=>"required",
            "cash"=>"numeric",
            "rappi"=>"numeric",
            "terminal"=>"numeric",
            "expenses"=>"numeric",
            "tips"=>"numeric",
        ];
    }

    public function messages(){
        return [
            "user_id.required"=>"Elija un usuario",
            "user_id.exists"=>"El usuario no existe",
            "turn.required"=>"Elija un turno",
            "turn.in"=>"Elija un turno válido",
            "cash.numeric"=>"Ingrese una cantidad válida",
            "rappi.numeric"=>"Ingrese una cantidad válida",
            "terminal.numeric"=>"Ingrese una cantidad válida",
            "expenses.numeric"=>"Ingrese una cantidad válida",
            "tips.numeric"=>"Ingrese una cantidad válida",

        ];
    }
}
