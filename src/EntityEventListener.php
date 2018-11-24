<?php
/**
 * This file is part of Swoft.
 *
 * @link     https://swoft.org
 * @document https://doc.swoft.org
 * @contact  limingxin@swoft.org
 * @license  https://github.com/swoft-cloud/swoft/blob/master/LICENSE
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
