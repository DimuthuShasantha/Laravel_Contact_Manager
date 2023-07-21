<?php

namespace domain\Facades;

use domain\Services\ContactService;
use Illuminate\Support\Facades\Facade;

class ContactFacade extends Facade
{
  protected static function getFacadeAccessor()
  {
    return ContactService::class;
  }
}