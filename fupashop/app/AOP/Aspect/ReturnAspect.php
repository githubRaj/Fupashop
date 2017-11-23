<?php

namespace App\AOP\Aspect;

use Go\Aop\Aspect;
use Go\Aop\Intercept\FieldAccess;
use Go\Aop\Intercept\MethodInvocation;
use Go\Lang\Annotation\After;
use Go\Lang\Annotation\Before;
use Go\Lang\Annotation\Around;
use Go\Lang\Annotation\Pointcut;

use App\Http\Controllers\UsersController;
/**
 * Monitor aspect
 */
class ReturnAspect implements Aspect
{

    /**
     * Method that will be called before real method
     *
     * @param MethodInvocation $invocation Invocation
     * @Before("execution(public App\Http\Controllers\UsersController->pastOrders(*))")
     */
    public function beforeMethodExecution(MethodInvocation $invocation)
    {
        $obj->aopDate = date("z");
    }
}