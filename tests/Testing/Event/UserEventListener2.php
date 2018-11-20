<?php

namespace SwoftTest\Testing\Event;

use Swoftx\EntityEvent\Annotation\EventListener;
use SwoftTest\Testing\Entity\User;
use Swoftx\EntityEvent\EventInterface;
use Swoft\Db\Model;
use Swoft\Bean\Annotation\Bean;

/**
 * @Bean
 * @EventListener(name=User::class, sort=2)
 */
class UserEventListener2 implements EventInterface
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
}