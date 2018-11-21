<?php
/**
 * This file is part of Swoft.
 *
 * @link     https://swoft.org
 * @document https://doc.swoft.org
 * @contact  limingxin@swoft.org
 * @license  https://github.com/swoft-cloud/swoft/blob/master/LICENSE
 */

namespace Swoftx\EntityEvent\Event;

use Swoft\Bean\Annotation\Bean;
use Swoft\Db\Model;
use Swoftx\EntityEvent\Collector\EventListenerCollector;
use Swoftx\EntityEvent\EventInterface;

/**
 * @Bean
 */
class Deleter implements EventerInterface
{
    public function handle(Model $model)
    {
        $name = get_class($model);
        $collectors = EventListenerCollector::getListeners($name);
        if (empty($collectors)) {
            return $model->delete()->getResult();
        }

        foreach ($collectors as $collector) {
            $className = $collector['className'];
            /** @var EventInterface $bean */
            $bean = bean($className);
            $model = $bean->beforeDelete($model);
        }

        $result = $model->delete()->getResult();

        foreach ($collectors as $collector) {
            $className = $collector['className'];
            /** @var EventInterface $bean */
            $bean = bean($className);
            $model = $bean->afterDelete($model);
        }

        return $result;
    }
}
