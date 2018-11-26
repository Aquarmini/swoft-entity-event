<?php
/**
 * Created by PhpStorm.
 * User: limx
 * Date: 2018/11/26
 * Time: 3:47 PM
 */

namespace Swoftx\EntityEvent\Helpers;


use Swoft\Db\Executor;
use Swoft\Db\Model;
use Swoft\Helper\StringHelper;

class EntityHelper
{
    /**
     * 返回老的数据 [数据库字段]
     * @param Model $model
     * @return array
     */
    public static function getOldFields(Model $model)
    {
        return Executor::getDbOldFields(get_class($model), $model->getAttrs());
    }

    /**
     * 返回更改后的对应数据 [数据库字段]
     * @param Model $model
     * @return array
     */
    public static function getChangedFields(Model $model)
    {
        $oldFields = static::getOldFields($model);
        $changeFields = [];
        foreach ($oldFields as $fieldName => $fieldValue) {
            $method = StringHelper::camel('get_' . $fieldName);
            if (method_exists($model, $method)) {
                if ($model->$method() != $fieldValue) {
                    $changeFields[$fieldName] = $model->$method();
                }
            }
        }

        return $changeFields;
    }
}