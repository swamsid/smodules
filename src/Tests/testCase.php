<?php

namespace Arsoft\Module\Tests;

use Arsoft\Modules\ModuleServiceProvider;

class testCase
{
  public function setUp(): void
  {
    parent::setUp();
    // additional setup
  }

  protected function getPackageProviders($app)
  {
    return [
        ModuleServiceProvider::class,
    ];
  }

  protected function getEnvironmentSetUp($app)
  {
    // perform environment setup
  }
}