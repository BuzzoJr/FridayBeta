<?php
/**
 * @author     Thank you for using Admiko.com
 * @copyright  2020-2120
 * @link       https://Admiko.com
 * @Help       We are always looking to improve our code. If you know better and more creative way don't hesitate to contact us. Thank you.
 */
namespace App\Http\Requests\Admin;
use Illuminate\Foundation\Http\FormRequest;
use Response;

class MapaDeCalorRequest extends FormRequest
{
    public function rules()
    {
        return [
            "mapa"=>[
				"string",
				"nullable"
			]
        ];
    }
    public function attributes()
    {
        return [
            "mapa"=>"Mapa"
        ];
    }
    
    public function authorize()
    {
        if (!auth("admin")->check()) {
            return false;
        }
        return true;
    }
}