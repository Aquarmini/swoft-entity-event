<?php


namespace Swoftx\EntityEvent;

use Swoft\Bean\Annotation\Bean;
use Swoft\Db\Model;
use Swoftx\EntityEvent\Event\Creater;
use Swoftx\EntityEvent\Event\Updater;

/**
 * @Bean
 */
class Event
{
    public function create(Model $model)
    {
        $creater = bean(Creater::class);
        return $creater->handle($model);
    }

    public function update(Model $model)
    {
        $creater = bean(Updater::class);
        return $creater->handle($model);
    }
}