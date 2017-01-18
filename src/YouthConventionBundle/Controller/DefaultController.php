<?php

namespace YouthConventionBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('YouthConventionBundle:Default:index.html.twig');
    }
}
