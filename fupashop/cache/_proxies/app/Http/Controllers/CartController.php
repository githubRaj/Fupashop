<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller as Controller;
use Illuminate\Http\Request as Request;
use Session as Session;
use Auth as Auth;
use App\User as User;
use App\Cart as Cart;
use App\Items\Tv as Tv;
use App\Items\Desktop as Desktop;
use App\Items\Laptop as Laptop;
use App\Items\Monitor as Monitor;
use App\Items\Tablet as Tablet;
use App\Items\SerialNumber as SerialNumber;
use App\Mapper\Mapper as Mapper;

class CartController extends CartController__AopProxied implements \Go\Aop\Proxy
{

    /**
     * Property was created automatically, do not change it manually
     */
    private static $__joinPoints = [];
    
    
    public function addToCart(\Illuminate\Http\Request $request)
    {
        return self::$__joinPoints['method:addToCart']->__invoke($this, [$request]);
    }
    
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        return self::$__joinPoints['method:__construct']->__invoke($this);
    }
    
    /**
     * Show the cart
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return self::$__joinPoints['method:index']->__invoke($this);
    }
    
    
    public function getViewDirName($className)
    {
        return self::$__joinPoints['method:getViewDirName']->__invoke($this, [$className]);
    }
    
    
    public function deleteFromCart(\Illuminate\Http\Request $request)
    {
        return self::$__joinPoints['method:deleteFromCart']->__invoke($this, [$request]);
    }
    
    
    public function checkout()
    {
        return self::$__joinPoints['method:checkout']->__invoke($this);
    }
    
    
    public function getTotal()
    {
        return self::$__joinPoints['method:getTotal']->__invoke($this);
    }
    
    
    public function getSubtotal()
    {
        return self::$__joinPoints['method:getSubtotal']->__invoke($this);
    }
    
    
    public function calculateTax()
    {
        return self::$__joinPoints['method:calculateTax']->__invoke($this);
    }
    
    
    public function updateTotalsAndTax()
    {
        return self::$__joinPoints['method:updateTotalsAndTax']->__invoke($this);
    }
    
    
    public function getCartItem($modelNumber)
    {
        return self::$__joinPoints['method:getCartItem']->__invoke($this, [$modelNumber]);
    }
    
    
    public function updateCartInRepo()
    {
        return self::$__joinPoints['method:updateCartInRepo']->__invoke($this);
    }
    
    
    public function checkCartItemsTimings()
    {
        return self::$__joinPoints['method:checkCartItemsTimings']->__invoke($this);
    }
    
    
    public function setFirstAvailableSNUnpurchasable($modelNum, $className)
    {
        return self::$__joinPoints['method:setFirstAvailableSNUnpurchasable']->__invoke($this, [$modelNum, $className]);
    }
    
    
    public function setFirstAvailableSNPurchasable($modelNum, $className)
    {
        return self::$__joinPoints['method:setFirstAvailableSNPurchasable']->__invoke($this, [$modelNum, $className]);
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
\Go\Proxy\ClassProxy::injectJoinPoints('App\Http\Controllers\CartController',array (
  'method' => 
  array (
    'addToCart' => 
    array (
      0 => 'advisor.App\\AOP\\Aspect\\CartAspect->beforeMethodExecution',
      1 => 'advisor.App\\AOP\\Aspect\\CartAspect->afterMethodExecution',
    ),
    '__construct' => 
    array (
      0 => 'advisor.App\\AOP\\Aspect\\CartAspect->afterMethodExecution',
    ),
    'index' => 
    array (
      0 => 'advisor.App\\AOP\\Aspect\\CartAspect->afterMethodExecution',
    ),
    'getViewDirName' => 
    array (
      0 => 'advisor.App\\AOP\\Aspect\\CartAspect->afterMethodExecution',
    ),
    'deleteFromCart' => 
    array (
      0 => 'advisor.App\\AOP\\Aspect\\CartAspect->afterMethodExecution',
    ),
    'checkout' => 
    array (
      0 => 'advisor.App\\AOP\\Aspect\\CartAspect->afterMethodExecution',
    ),
    'getTotal' => 
    array (
      0 => 'advisor.App\\AOP\\Aspect\\CartAspect->afterMethodExecution',
    ),
    'getSubtotal' => 
    array (
      0 => 'advisor.App\\AOP\\Aspect\\CartAspect->afterMethodExecution',
    ),
    'calculateTax' => 
    array (
      0 => 'advisor.App\\AOP\\Aspect\\CartAspect->afterMethodExecution',
    ),
    'updateTotalsAndTax' => 
    array (
      0 => 'advisor.App\\AOP\\Aspect\\CartAspect->afterMethodExecution',
    ),
    'getCartItem' => 
    array (
      0 => 'advisor.App\\AOP\\Aspect\\CartAspect->afterMethodExecution',
    ),
    'updateCartInRepo' => 
    array (
      0 => 'advisor.App\\AOP\\Aspect\\CartAspect->afterMethodExecution',
    ),
    'checkCartItemsTimings' => 
    array (
      0 => 'advisor.App\\AOP\\Aspect\\CartAspect->afterMethodExecution',
    ),
    'setFirstAvailableSNUnpurchasable' => 
    array (
      0 => 'advisor.App\\AOP\\Aspect\\CartAspect->afterMethodExecution',
    ),
    'setFirstAvailableSNPurchasable' => 
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