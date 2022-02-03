<?php
/** Manage roles for CMS users. **/

namespace App\Http\Requests\Admin\Admins;
use Illuminate\Foundation\Http\FormRequest;
use Response;

class AdminsRequest extends FormRequest
{
    public function rules()
    {
        $id = request()->route("admins")->id ?? null;
        return [
            "name"    => [
                "string"
            ],
            "email"   => [
                "email",
                "unique:admins,email," . $id . ",id,deleted_at,NULL",
                'required'
            ],
            "role_id" => [
                'required'
            ]
        ];
    }

    public function attributes()
    {
        return [
            "name"    => trans('admiko.admins_name'),
            "email"   => trans('admiko.admins_email'),
            "role_id" => trans('admiko.admins_role')
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
