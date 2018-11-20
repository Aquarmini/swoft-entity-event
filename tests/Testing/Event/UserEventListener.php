<?php

namespace SwoftTest\Testing\Event;

use Swoft\Db\Model;
use Swoftx\EntityEvent\Annotation\EventListener;
use Swoftx\EntityEvent\EventInterface;
use SwoftTest\Testing\Entity\User;
use Swoft\Bean\Annotation\Bean;

/**
 * @Bean
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
}