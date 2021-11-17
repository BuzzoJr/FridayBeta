<?php
/** Request for roles. **/

namespace App\Http\Requests\Admin\Admins;
use Illuminate\Foundation\Http\FormRequest;
use Response;

class AdminRolesRequest extends FormRequest
{
    public function rules()
    {
        $id = request()->route("admin_roles")->id ?? null;
        return [
            "title" => [
                "string",
                "unique:admins_roles,title," . $id . ",id,deleted_at,NULL",
                'required'
            ]
        ];
    }

    public function attributes()
    {
        return [
            "title"      => trans('admiko.roles_title'),
            "permission" => trans('admiko.roles_permission')
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
