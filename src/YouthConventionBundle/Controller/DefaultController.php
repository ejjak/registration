<?php

namespace YouthConventionBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('YouthConventionBundle:Default:index.html.twig');
    }

//    /**
//     * @return \Symfony\Component\HttpFoundation\Response
//     * @Route("/east", name="east")
//     */
//
//    public function EastAction()
//    {
//        $em = $this->getDoctrine()->getEntityManager();
//        $value = $em->getRepository('YouthConventionBundle:Delegates')->findEastAction();
//        return $this->render(':delegates:east.html.twig', array(
//            'count' => $value
//        ));
//    }
//
//    /**
//     * @return \Symfony\Component\HttpFoundation\Response
//     * @Route("/north", name="west")
//     */
//
//    public function WestAction()
//    {
//        $em = $this->getDoctrine()->getEntityManager();
//        $value = $em->getRepository('YouthConventionBundle:Delegates')->findNorthAction();
//        return $this->render(':delegates:north.html.twig', array(
//            'count' => $value
//        ));
//    }
}
