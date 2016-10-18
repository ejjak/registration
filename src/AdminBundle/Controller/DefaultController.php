<?php
/**
 * Created by PhpStorm.
 * User: Demi
 * Date: 9/2/2016
 * Time: 10:48 AM
 */

namespace AdminBundle\Controller;


use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{

    public function indexAction()
    {
        return $this->render('DesmeeAdminBundle:Default:index.html.twig');
    }

    /**
     * @Route("/logout" name="logout")
     */

    public function logoutAction()
    {

    }

}