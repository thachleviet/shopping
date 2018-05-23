<?php
/**
 * Created by PhpStorm.
 * User: WAO
 * Date: 26/03/2018
 * Time: 6:27 CH
 */
namespace App\Http\Requests\Backend;

use Illuminate\Foundation\Http\FormRequest as Request;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Validation\Validator;


class CategoryRequestForm  extends Request
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


        switch ($this->route()->getActionMethod()){
            case 'add':
                return [
                    'category_name'              => 'required',
                ];
                break ;
            default :
                return [];
             break ;
        }
    }
    /*
     * function custom messages
     */
    public function messages()
    {
        switch ($this->route()->getActionMethod()){
            case 'add':
                return [
                    'category_name.required'                  => 'Tên danh mục !',
                ];
                break ;
            default :
                return [];
            break ;
        }
    }
    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json($validator->errors(), 422));
    }

}