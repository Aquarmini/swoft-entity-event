<?php
/**
 * This file is part of Swoft.
 *
 * @link     https://swoft.org
 * @document https://doc.swoft.org
 * @contact  limingxin@swoft.org
 * @license  https://github.com/swoft-cloud/swoft/blob/master/LICENSE
 */
namespace SwoftTest\Cases;

use SwoftTest\Testing\Entity\User;
use Swoftx\EntityEvent\Event;

class EventListenerTest extends AbstractTestCase
{
    public function testCreate()
    {
        $uniqid = uniqid();
        $user = new User();
        $user->setName($uniqid);
        $user->setRoleId(1);

        $event = bean(Event::class);
        $id = $event->create($user);

        $this->assertTrue($id > 0);
        $this->assertEquals(2, $user->getRoleId());

        $this->assertEquals('1991-01-23', $user->getUpdatedAt());

        /** @var User $user */
        $user = User::findById($id)->getResult();
        $this->assertEquals(2, $user->getRoleId());
        $this->assertNotEquals('1991-01-23', $user->getUpdatedAt());

        $res = $event->update($user);
        $this->assertEquals(1, $res);

        $this->assertEquals(3, $user->getRoleId());
        $this->assertEquals('1991-05-21', $user->getUpdatedAt());

        /** @var User $user */
        $user = User::findById($id)->getResult();
        $this->assertEquals(3, $user->getRoleId());
        $this->assertNotEquals('1991-05-21', $user->getUpdatedAt());
    }
}
