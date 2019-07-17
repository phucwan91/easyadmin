<?php

namespace App\Controller;

use FOS\UserBundle\Controller\SecurityController as BaseSecurityController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class SecurityController extends BaseSecurityController
{
	 /*
     * @param Request $request
     *
     * @return Response
     */
    public function loginAction(Request $request)
    {
    	$authChecker = $this->container->get('security.authorization_checker');
	    $router      = $this->container->get('router');

	    if ($authChecker->isGranted('IS_AUTHENTICATED_FULLY')) {
	        return new RedirectResponse('/admin', 307);
	    } 

		return parent::loginAction($request);
    }

    // /**
    //  * @Route("/admin", name="home")
    //  */
    // public function homeAction()
    // {
    //     return $this->render('@EasyAdmin/page/blank.html.twig');
    // }
}