<?php
/**
 * Created by PhpStorm.
 * User: limx
 * Date: 2018/11/24
 * Time: 4:45 PM
 */

namespace Swoftx\EntityEvent;


use Swoft\Db\Model;

abstract class EntityEventListener implements EventInterface
{
    public function beforeCreate(Model $model): Model
    {
        return $model;
    }

    public function afterCreate(Model $model): Model
    {
        return $model;
    }

    public function beforeUpdate(Model $model): Model
    {
        return $model;
    }

    public function afterUpdate(Model $model): Model
    {
        return $model;
    }

    public function beforeDelete(Model $model): Model
    {
        return $model;
    }

    public function afterDelete(Model $model): Model
    {
        return $model;
    }
}