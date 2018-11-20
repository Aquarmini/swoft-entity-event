# swoft-entity-event

[![Build Status](https://travis-ci.org/limingxinleo/swoft-entity-event.svg?branch=master)](https://travis-ci.org/limingxinleo/swoft-entity-event)

## 安装
~~~
composer require limingxinleo/swoft-entity-event
~~~

## 使用
定义事件监听器
~~~php
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
        // Do something...
        return $model;
    }

    public function afterCreate(Model $model): Model
    {
        // Do something...
        return $model;
    }

    public function beforeUpdate(Model $model): Model
    {
        // Do something...
        return $model;
    }

    public function afterUpdate(Model $model): Model
    {
        // Do something...
        return $model;
    }
}
~~~

使用
~~~php
<?php
use SwoftTest\Testing\Entity\User;
use Swoftx\EntityEvent\Event;

$uniqid = uniqid();
$user = new User();
$user->setName($uniqid);
$user->setRoleId(1);

$event = bean(Event::class);
$id = $event->create($user);
~~~