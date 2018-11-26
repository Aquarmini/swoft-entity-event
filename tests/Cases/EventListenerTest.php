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
use Swoftx\EntityEvent\Helpers\EntityHelper;

class EventListenerTest extends AbstractTestCase
{
    public function testEventListener()
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

        for ($i = 0; $i < 2; $i++) {
            $uniqid = uniqid();
            $user = new User();
            $user->setName($uniqid);
            $user->setRoleId(1);

            $event = bean(Event::class);
            $id = $event->create($user);

            $this->assertTrue($id > 0);

            if ($id % 2 === 0) {
                try {
                    /** @var User $user */
                    $user = User::findById($id)->getResult();
                    $event->delete($user);
                    $this->assertTrue(false);
                } catch (\Throwable $ex) {
                    $this->assertEquals('id是偶数，不允许删除!', $ex->getMessage());
                }
            } else {
                /** @var User $user */
                $user = User::findById($id)->getResult();
                $rows = $user->delete()->getResult();
                // $rows = $event->delete($user);
                $this->assertEquals(1, $rows);
            }
        }
    }

    public function testCoroutine()
    {
        go(function () {
            $this->testEventListener();
        });
    }

    public function testEntityHelper()
    {
        /** @var User $user */
        $user = User::findById(1)->getResult();
        $date = date('Y-m-d H:i:s');

        $res = EntityHelper::getChangedFields($user);
        $this->assertEquals([], $res);

        $user->setName('Agnes');
        $user->setRoleId(1);
        $user->setUpdatedAt($date);

        $res = EntityHelper::getChangedFields($user);
        $this->assertEquals(['name' => 'Agnes', 'updated_at' => $date], $res);
    }
}
