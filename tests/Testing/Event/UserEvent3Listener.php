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

use Swoftx\EntityEvent\Annotation\EventListener;
use SwoftTest\Testing\Entity\User;
use Swoftx\EntityEvent\EntityEventListener;
use Swoftx\EntityEvent\EventInterface;
use Swoft\Db\Model;

/**
 * @EventListener(name=User::class, sort=1)
 */
class UserEvent3Listener extends EntityEventListener
{

}
