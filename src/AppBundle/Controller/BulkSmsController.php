<?php
/**
 * Created by PhpStorm.
 * User: ejjak
 * Date: 15/10/16
 * Time: 3:50 PM
 */

namespace AppBundle\Controller;


use AppBundle\MvaayoBulk;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class BulkSmsController extends Controller
{
    /**
     * Creates a new Register entity.
     *
     */
    public function smsAction(Request $request)
    {
        $register = new BulkController();
        $form = $this->createForm('AppBundle\Form\SendSmsType', $register);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $mvaayo = new MvaayoBulk();
            $mvaayo->BulkSmsAction($register);

//            return $this->redirectToRoute('member_show', array('id' => $register->getId()));
        }

        return $this->render('register/bulksms.html.twig', array(
            'register' => $register,
            'form' => $form->createView(),
        ));
    }

}