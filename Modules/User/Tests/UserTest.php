<?php

namespace Modules\User\Tests;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Modules\User\Entities\User;


class UserTest extends TestCase
{

    protected $user;

    protected function setUp()
    {
        parent::setUp();
        $this->user = factory(User::class)->create();
        $this->actingAs($this->user);
    }
    /**
     *
     *
     * @return void
     */
    public function testAuthUser()
    {
        // stub
        $this->assertTrue(true);
    }
}
