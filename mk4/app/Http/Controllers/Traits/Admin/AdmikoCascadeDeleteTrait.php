<?php
/** Helper for cascade delete files or soft delete. **/



namespace App\Http\Controllers\Traits\Admin;

use Illuminate\Database\Eloquent\Model;

trait AdmikoCascadeDeleteTrait
{
    public static function bootAdmikoCascadeDeleteTrait()
    {
        static::deleted(function (Model $model) {
            if (method_exists($model, 'runSoftDelete')) {
                $model->admikoDeleteCascade(get_class($model), [$model->id]);
            }
        });
    }

    protected function admikoDeleteCascade($modelPath, $deleteId)
    {
        if (property_exists(app($modelPath), 'admikoCascadeDelete')) {
            $cascade = $modelPath::$admikoCascadeDelete;
            foreach ($cascade as $key_id => $modelArray) {
                foreach ($modelArray as $model) {
                    $getModel = app($modelPath . '\\' . $model);
                    if (property_exists($getModel, 'admikoCascadeDelete')) {
                        $deleteIdArray = $getModel::whereIn($key_id, $deleteId)->pluck('id');
                        if (count($deleteIdArray) > 0) {
                            $this->admikoDeleteCascade($modelPath . '\\' . $model, $deleteIdArray);
                        }
                    }
                    $deleteIdArray = $getModel::whereIn($key_id, $deleteId)->pluck('id');
                    $getModel::destroy($deleteIdArray);
                }
            }
        }
    }

}
