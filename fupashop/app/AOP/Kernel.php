<?php 

namespace App\AOP;

use Go\Core\AspectKernel;
use Go\Core\AspectContainer;
use App\AOP\Aspect\ReturnAspect;

class Kernel extends AspectKernel
{
    /**
     * Configure an AspectContainer with advisors, aspects and pointcuts
     *
     * @param AspectContainer $container
     *
     * @return void
     */
    protected function configureAop(AspectContainer $container)
    {
        $container->registerAspect(new ReturnAspect());
    }
}
