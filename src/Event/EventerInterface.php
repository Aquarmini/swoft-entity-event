<?php


namespace Swoftx\EntityEvent\Event;


use Swoft\Db\Model;

interface EventerInterface
{
    public function handle(Model $model);
}