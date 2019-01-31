<?php

namespace OVAdmin\Api\ServiceProviders;


use Illuminate\Support\ServiceProvider;
use OVAdmin\Api\SSH\SSH;

class SSHServiceProvider extends ServiceProvider
{
    public function register() {
        $this->app->bind('SSH', function ($app) {
            return new SSH();
        });
    }
}