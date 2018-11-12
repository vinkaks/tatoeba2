<?php
namespace App\Test\TestCase\Model\Entity;

use App\Model\Entity\User;
use Cake\TestSuite\TestCase;

class UserTest extends TestCase
{
    public $User;

    public function setUp()
    {
        parent::setUp();
        $this->User = new User();
    }

    public function tearDown()
    {
        unset($this->User);
        parent::tearDown();
    }

    public function testSet_passwordhashesPassword()
    {
        $this->User->set('password', 'my super password');
        $this->assertContains('$', $this->User->password);
    }

    public function testSet_settingsMergesExistingSettings()
    {
        $this->User->set('settings', ['is_public' => true]);
        $this->User->set('settings', ['default_license' => 'CC0 1.0']);

        $this->assertEquals(true, $this->User->settings['is_public']);
    }
}
