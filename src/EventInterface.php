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

interface EventInterface
{
    public function beforeCreate(Model $model): Model;

    public function afterCreate(Model $model): Model;

    public function beforeUpdate(Model $model): Model;

    public function afterUpdate(Model $model): Model;
}
