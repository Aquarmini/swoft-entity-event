<?php
/**
 * This file is part of Swoft.
 *
 * @link     https://swoft.org
 * @document https://doc.swoft.org
 * @contact  limingxin@swoft.org
 * @license  https://github.com/swoft-cloud/swoft/blob/master/LICENSE
 */
namespace SwoftTest\Testing\Event;

use Swoft\Db\Model;
use Swoftx\EntityEvent\Annotation\EventListener;
use Swoftx\EntityEvent\EventInterface;
use SwoftTest\Testing\Entity\User;

/**
 * @EventListener(User::class)
 */
class UserEventListener implements EventInterface
{
    public function beforeCreate(Model $model): Model
    {
        $model->setRoleId(2);
        return $model;
    }

    public function afterCreate(Model $model): Model
    {
        $model->setUpdatedAt('1991-01-23');
        return $model;
    }

    public function beforeUpdate(Model $model): Model
    {
        $model->setRoleId(3);
        return $model;
    }

    public function afterUpdate(Model $model): Model
    {
        $model->setUpdatedAt('1991-05-21');
        return $model;
    }

    /**
     * @param User $model
     * @return User
     */
    public function beforeDelete(Model $model): Model
    {
        if ($model->getId() % 2 === 0) {
            throw new \Exception('id是偶数，不允许删除!');
        }
        return $model;
    }

    public function afterDelete(Model $model): Model
    {
        return $model;
    }
}
