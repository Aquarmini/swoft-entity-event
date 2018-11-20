<?php


namespace Swoftx\EntityEvent\Event;

use Swoft\Bean\Annotation\Bean;
use Swoft\Db\Model;
use Swoftx\EntityEvent\Collector\EventListenerCollector;
use Swoftx\EntityEvent\EventInterface;

/**
 * @Bean
 */
class Updater implements EventerInterface
{
    public function handle(Model $model)
    {
        $name = get_class($model);
        $collectors = EventListenerCollector::getListeners($name);
        if (empty($collectors)) {
            return $model->update()->getResult();
        }

        foreach ($collectors as $collector) {
            $className = $collector['className'];
            /** @var EventInterface $bean */
            $bean = bean($className);
            $model = $bean->beforeUpdate($model);
        }

        $result = $model->update()->getResult();

        foreach ($collectors as $collector) {
            $className = $collector['className'];
            /** @var EventInterface $bean */
            $bean = bean($className);
            $model = $bean->afterUpdate($model);
        }

        return $result;
    }
}