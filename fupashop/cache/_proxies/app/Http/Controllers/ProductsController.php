<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request as Request;
use App\Items\Desktop as Desktop;
use App\Items\Laptop as Laptop;
use App\Items\Monitor as Monitor;
use App\Items\Tablet as Tablet;
use App\Mapper\Mapper as Mapper;
use App\Items\SerialNumber as SerialNumber;
use Session as Session;
use App\Cart as Cart;

class ProductsController extends ProductsController__AopProxied implements \Go\Aop\Proxy
{

    /**
     * Property was created automatically, do not change it manually
     */
    private static $__joinPoints = [];
    
    
    public function __construct()
    {
        return self::$__joinPoints['method:__construct']->__invoke($this);
    }
    
    
    public function getViewDirName($className)
    {
        return self::$__joinPoints['method:getViewDirName']->__invoke($this, [$className]);
    }
    
    
    public function getSerialNumberItem($modelNumber, $serialNumber, $className)
    {
        return self::$__joinPoints['method:getSerialNumberItem']->__invoke($this, [$modelNumber, $serialNumber, $className]);
    }
    
    
    public function getItem($modelNumber, $className)
    {
        return self::$__joinPoints['method:getItem']->__invoke($this, [$modelNumber, $className]);
    }
    
    
    public function getIndex($className, $filters)
    {
        return self::$__joinPoints['method:getIndex']->__invoke($this, [$className, $filters]);
    }
    
    
    public function getDesktop($modelNumber)
    {
        return self::$__joinPoints['method:getDesktop']->__invoke($this, [$modelNumber]);
    }
    
    
    public function getLaptop($modelNumber)
    {
        return self::$__joinPoints['method:getLaptop']->__invoke($this, [$modelNumber]);
    }
    
    
    public function getMonitor($modelNumber)
    {
        return self::$__joinPoints['method:getMonitor']->__invoke($this, [$modelNumber]);
    }
    
    
    public function getTablet($modelNumber)
    {
        return self::$__joinPoints['method:getTablet']->__invoke($this, [$modelNumber]);
    }
    
    
    public function Desktopindex()
    {
        return self::$__joinPoints['method:Desktopindex']->__invoke($this);
    }
    
    
    public function Laptopindex()
    {
        return self::$__joinPoints['method:Laptopindex']->__invoke($this);
    }
    
    
    public function Monitorindex()
    {
        return self::$__joinPoints['method:Monitorindex']->__invoke($this);
    }
    
    
    public function Tabletindex()
    {
        return self::$__joinPoints['method:Tabletindex']->__invoke($this);
    }
    
    
    public function getShowcaseArrays()
    {
        return self::$__joinPoints['method:getShowcaseArrays']->__invoke($this);
    }
    
    
    public function test()
    {
        return self::$__joinPoints['method:test']->__invoke($this);
    }
    
    
    public function getAddToCart(\Illuminate\Http\Request $request, $id)
    {
        return self::$__joinPoints['method:getAddToCart']->__invoke($this, [$request, $id]);
    }
    
    /**
     * Authorize a given action for the current user.
     *
     * @param  mixed  $ability
     * @param  mixed|array  $arguments
     * @return \Illuminate\Auth\Access\Response
     *
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function authorize($ability, $arguments = array (
    ))
    {
        return self::$__joinPoints['method:authorize']->__invoke($this, \array_slice([$ability, $arguments], 0, \func_num_args()));
    }
    
    /**
     * Authorize a given action for a user.
     *
     * @param  \Illuminate\Contracts\Auth\Authenticatable|mixed  $user
     * @param  mixed  $ability
     * @param  mixed|array  $arguments
     * @return \Illuminate\Auth\Access\Response
     *
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function authorizeForUser($user, $ability, $arguments = array (
    ))
    {
        return self::$__joinPoints['method:authorizeForUser']->__invoke($this, \array_slice([$user, $ability, $arguments], 0, \func_num_args()));
    }
    
    /**
     * Authorize a resource action based on the incoming request.
     *
     * @param  string  $model
     * @param  string|null  $parameter
     * @param  array  $options
     * @param  \Illuminate\Http\Request|null  $request
     * @return void
     */
    public function authorizeResource($model, $parameter = NULL, array $options = array (
    ), $request = NULL)
    {
        return self::$__joinPoints['method:authorizeResource']->__invoke($this, \array_slice([$model, $parameter, $options, $request], 0, \func_num_args()));
    }
    
    /**
     * Dispatch a job to its appropriate handler in the current process.
     *
     * @param  mixed  $job
     * @return mixed
     */
    public function dispatchNow($job)
    {
        return self::$__joinPoints['method:dispatchNow']->__invoke($this, [$job]);
    }
    
    /**
     * Run the validation routine against the given validator.
     *
     * @param  \Illuminate\Contracts\Validation\Validator|array  $validator
     * @param  \Illuminate\Http\Request|null  $request
     * @return array
     */
    public function validateWith($validator, ?\Illuminate\Http\Request $request = NULL)
    {
        return self::$__joinPoints['method:validateWith']->__invoke($this, \array_slice([$validator, $request], 0, \func_num_args()));
    }
    
    /**
     * Validate the given request with the given rules.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  array  $rules
     * @param  array  $messages
     * @param  array  $customAttributes
     * @return array
     */
    public function validate(\Illuminate\Http\Request $request, array $rules, array $messages = array (
    ), array $customAttributes = array (
    ))
    {
        return self::$__joinPoints['method:validate']->__invoke($this, \array_slice([$request, $rules, $messages, $customAttributes], 0, \func_num_args()));
    }
    
    /**
     * Validate the given request with the given rules.
     *
     * @param  string  $errorBag
     * @param  \Illuminate\Http\Request  $request
     * @param  array  $rules
     * @param  array  $messages
     * @param  array  $customAttributes
     * @return array
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function validateWithBag($errorBag, \Illuminate\Http\Request $request, array $rules, array $messages = array (
    ), array $customAttributes = array (
    ))
    {
        return self::$__joinPoints['method:validateWithBag']->__invoke($this, \array_slice([$errorBag, $request, $rules, $messages, $customAttributes], 0, \func_num_args()));
    }
    
    /**
     * Register middleware on the controller.
     *
     * @param  array|string|\Closure  $middleware
     * @param  array   $options
     * @return \Illuminate\Routing\ControllerMiddlewareOptions
     */
    public function middleware($middleware, array $options = array (
    ))
    {
        return self::$__joinPoints['method:middleware']->__invoke($this, \array_slice([$middleware, $options], 0, \func_num_args()));
    }
    
    /**
     * Get the middleware assigned to the controller.
     *
     * @return array
     */
    public function getMiddleware()
    {
        return self::$__joinPoints['method:getMiddleware']->__invoke($this);
    }
    
    /**
     * Execute an action on the controller.
     *
     * @param  string  $method
     * @param  array   $parameters
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function callAction($method, $parameters)
    {
        return self::$__joinPoints['method:callAction']->__invoke($this, [$method, $parameters]);
    }
    
    /**
     * Handle calls to missing methods on the controller.
     *
     * @param  string  $method
     * @param  array   $parameters
     * @return mixed
     *
     * @throws \BadMethodCallException
     */
    public function __call($method, $parameters)
    {
        return self::$__joinPoints['method:__call']->__invoke($this, [$method, $parameters]);
    }
    
}
\Go\Proxy\ClassProxy::injectJoinPoints('App\Http\Controllers\ProductsController',array (
  'method' => 
  array (
    '__construct' => 
    array (
      0 => 'advisor.App\\AOP\\Aspect\\CartAspect->afterMethodExecution',
    ),
    'getViewDirName' => 
    array (
      0 => 'advisor.App\\AOP\\Aspect\\CartAspect->afterMethodExecution',
    ),
    'getSerialNumberItem' => 
    array (
      0 => 'advisor.App\\AOP\\Aspect\\CartAspect->afterMethodExecution',
    ),
    'getItem' => 
    array (
      0 => 'advisor.App\\AOP\\Aspect\\CartAspect->afterMethodExecution',
    ),
    'getIndex' => 
    array (
      0 => 'advisor.App\\AOP\\Aspect\\CartAspect->afterMethodExecution',
    ),
    'getDesktop' => 
    array (
      0 => 'advisor.App\\AOP\\Aspect\\CartAspect->afterMethodExecution',
    ),
    'getLaptop' => 
    array (
      0 => 'advisor.App\\AOP\\Aspect\\CartAspect->afterMethodExecution',
    ),
    'getMonitor' => 
    array (
      0 => 'advisor.App\\AOP\\Aspect\\CartAspect->afterMethodExecution',
    ),
    'getTablet' => 
    array (
      0 => 'advisor.App\\AOP\\Aspect\\CartAspect->afterMethodExecution',
    ),
    'Desktopindex' => 
    array (
      0 => 'advisor.App\\AOP\\Aspect\\CartAspect->afterMethodExecution',
    ),
    'Laptopindex' => 
    array (
      0 => 'advisor.App\\AOP\\Aspect\\CartAspect->afterMethodExecution',
    ),
    'Monitorindex' => 
    array (
      0 => 'advisor.App\\AOP\\Aspect\\CartAspect->afterMethodExecution',
    ),
    'Tabletindex' => 
    array (
      0 => 'advisor.App\\AOP\\Aspect\\CartAspect->afterMethodExecution',
    ),
    'getShowcaseArrays' => 
    array (
      0 => 'advisor.App\\AOP\\Aspect\\CartAspect->afterMethodExecution',
    ),
    'test' => 
    array (
      0 => 'advisor.App\\AOP\\Aspect\\CartAspect->afterMethodExecution',
    ),
    'getAddToCart' => 
    array (
      0 => 'advisor.App\\AOP\\Aspect\\CartAspect->afterMethodExecution',
    ),
    'authorize' => 
    array (
      0 => 'advisor.App\\AOP\\Aspect\\CartAspect->afterMethodExecution',
    ),
    'authorizeForUser' => 
    array (
      0 => 'advisor.App\\AOP\\Aspect\\CartAspect->afterMethodExecution',
    ),
    'authorizeResource' => 
    array (
      0 => 'advisor.App\\AOP\\Aspect\\CartAspect->afterMethodExecution',
    ),
    'dispatchNow' => 
    array (
      0 => 'advisor.App\\AOP\\Aspect\\CartAspect->afterMethodExecution',
    ),
    'validateWith' => 
    array (
      0 => 'advisor.App\\AOP\\Aspect\\CartAspect->afterMethodExecution',
    ),
    'validate' => 
    array (
      0 => 'advisor.App\\AOP\\Aspect\\CartAspect->afterMethodExecution',
    ),
    'validateWithBag' => 
    array (
      0 => 'advisor.App\\AOP\\Aspect\\CartAspect->afterMethodExecution',
    ),
    'middleware' => 
    array (
      0 => 'advisor.App\\AOP\\Aspect\\CartAspect->afterMethodExecution',
    ),
    'getMiddleware' => 
    array (
      0 => 'advisor.App\\AOP\\Aspect\\CartAspect->afterMethodExecution',
    ),
    'callAction' => 
    array (
      0 => 'advisor.App\\AOP\\Aspect\\CartAspect->afterMethodExecution',
    ),
    '__call' => 
    array (
      0 => 'advisor.App\\AOP\\Aspect\\CartAspect->afterMethodExecution',
    ),
  ),
));