<?php
namespace Swoftx\EntityEvent;

use Swoft\Db\Model;

interface EventInterface
{
    public function beforeCreate(Model $model): Model;

    public function afterCreate(Model $model): Model;

    public function beforeUpdate(Model $model): Model;

    public function afterUpdate(Model $model): Model;
}
