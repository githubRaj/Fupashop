<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request as Request;
use Auth as Auth;
use App\User as User;
use App\Purchase as Purchase;
use App\Serial as Serial;
use App\Mapper\Mapper as Mapper;

class UsersController extends UsersController__AopProxied implements \Go\Aop\Proxy
{

    /**
     * Property was created automatically, do not change it manually
     */
    private static $__joinPoints = [];
    
    
    public function pastOrders()
    {
        return self::$__joinPoints['method:pastOrders']->__invoke($this);
    }
    
    
    public function return(\Illuminate\Http\Request $request)
    {
        return self::$__joinPoints['method:return']->__invoke($this, [$request]);
    }
    
}
\Go\Proxy\ClassProxy::injectJoinPoints('App\Http\Controllers\UsersController',array (
  'method' => 
  array (
    'pastOrders' => 
    array (
      0 => 'advisor.App\\AOP\\Aspect\\ReturnAspect->beforeMethodExecution',
    ),
    'return' => 
    array (
      0 => 'advisor.App\\AOP\\Aspect\\ReturnAspect->afterMethodExecution',
    ),
  ),
));