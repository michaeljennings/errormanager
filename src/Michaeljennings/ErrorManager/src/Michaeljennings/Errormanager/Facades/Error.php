<?php namespace Michaeljennings\Errormanager\Facades;

use Illuminate\Support\Facades\Facade;

class Error extends Facade {

    protected static function getFacadeAccessor(){ return 'error'; }
    
}