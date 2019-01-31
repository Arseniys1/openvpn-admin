<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use OVAdmin\Api\SSH\SSH;

class SSHTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testExample()
    {
        $ssh = new SSH();
        $ssh->connect('185.251.38.170', '22');
        $ssh->getConnection()->login('root', '12JCKHvhz2DDy1Ph');

        if ($ssh->getConnection()->isAuthenticated()) {
            $this->assertTrue(true);
        } else {
            $this->assertTrue(false);
        }

    }
}
