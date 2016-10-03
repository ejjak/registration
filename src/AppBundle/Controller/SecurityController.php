<?php
/**
 * Created by PhpStorm.
 * User: Demi
 * Date: 8/26/2016
 * Time: 1:26 PM
 */

namespace AppBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class SecurityController extends Controller
{
    /**
     * @Route("/login", name="login")
     */
    public function loginAction(Request $request)
    {
        $authenticationUtils = $this->get('security.authentication_utils');

        // get the login error if there is one
        $error = $authenticationUtils->getLastAuthenticationError();

        // last username entered by the user
        $lastUsername = $authenticationUtils->getLastUsername();

        return $this->render(
            'security/login.html.twig',
            array(
                // last username entered by the user
                'last_username' => $lastUsername,
                'error'         => $error,
            )
        );
    }

    /**
     * @Route("/logout", name="logout")
     */

    public function logoutAction()
    {
//        return $this->render('security/logout.html.twig');
//        $this->get('security.token_storage')->setToken(null);
//        $this->get('request')->getSession()->invalidate();
    }
}