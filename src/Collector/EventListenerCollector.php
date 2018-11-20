<?php
/**
 * This file is part of Swoft.
 *
 * @link     https://swoft.org
 * @document https://doc.swoft.org
 * @contact  limingxin@swoft.org
 * @license  https://github.com/swoft-cloud/swoft/blob/master/LICENSE
 */
namespace Swoftx\EntityEvent\Collector;

use Swoft\Bean\CollectorInterface;
use Swoftx\EntityEvent\Annotation\EventListener;

class EventListenerCollector implements CollectorInterface
{
    protected static $listeners = [];

    public static function collect(
        string $className,
        $objectAnnotation = null,
        string $propertyName = '',
        string $methodName = '',
        $propertyValue = null
    ) {
        if (($objectAnnotation instanceof EventListener) && $name = $objectAnnotation->getName()) {
            $listeners = static::$listeners[$name] ?? [];
            $listeners[] = [
                'className' => $className,
                'methodName' => $methodName,
                'objectAnnotation' => $objectAnnotation,
                'sort' => $objectAnnotation->getSort(),
            ];

            usort($listeners, function ($a, $b) {
                if ($a['sort'] == $b['sort']) {
                    return 0;
                }
                return $a['sort'] < $b['sort'] ? -1 : 1;
            });

            static::$listeners[$name] = $listeners;
        }
    }

    public static function getCollector(): array
    {
        return static::$listeners;
    }

    public static function getListeners($entityName)
    {
        return static::$listeners[$entityName] ?? [];
    }
}
