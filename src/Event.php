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

use Swoft\Bean\Annotation\Bean;
use Swoft\Db\Model;
use Swoftx\EntityEvent\Event\Creater;
use Swoftx\EntityEvent\Event\Deleter;
use Swoftx\EntityEvent\Event\Updater;

/**
 * @Bean
 */
class Event
{
    /**
     * Create
     * @author limx
     * @param Model $model
     */
    public function create(Model $model)
    {
        $creater = bean(Creater::class);
        return $creater->handle($model);
    }

    /**
     * Update
     * @author limx
     * @param Model $model
     */
    public function update(Model $model)
    {
        $creater = bean(Updater::class);
        return $creater->handle($model);
    }

    /**
     * Delete
     * @author limx
     * @param Model $model
     */
    public function delete(Model $model)
    {
        $creater = bean(Deleter::class);
        return $creater->handle($model);
    }
}
