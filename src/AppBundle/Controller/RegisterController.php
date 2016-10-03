<?php

namespace AppBundle\Controller;

use AppBundle\Mvaayo;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use AppBundle\Entity\Register;
use AppBundle\Form\RegisterType;

/**
 * Register controller.
 *
 */
class RegisterController extends Controller
{
    /**
     * Lists all Register entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        $registers = $em->getRepository('AppBundle:Register')->findAll();
        return $this->render('register/index.html.twig', array(
            'registers' => $registers,

        ));

    }

    /**
     * Creates a new Register entity.
     *
     */
    public function newAction(Request $request)
    {
        $register = new Register();
        $form = $this->createForm('AppBundle\Form\RegisterType', $register);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($register);
            $em->flush();

            $mvaayo = new Mvaayo();
            $mvaayo->SmsAction($register);

            return $this->redirectToRoute('member_show', array('id' => $register->getId()));
        }

        return $this->render('register/new.html.twig', array(
            'register' => $register,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Register entity.
     *
     */
    public function showAction(Register $register)
    {
        $deleteForm = $this->createDeleteForm($register);

        return $this->render('register/show.html.twig', array(
            'register' => $register,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Register entity.
     *
     */
    public function editAction(Request $request, Register $register)
    {
        $deleteForm = $this->createDeleteForm($register);
        $editForm = $this->createForm('AppBundle\Form\RegisterType', $register);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($register);
            $em->flush();

            return $this->redirectToRoute('member_edit', array('id' => $register->getId()));
        }

        return $this->render('register/edit.html.twig', array(
            'register' => $register,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Register entity.
     *
     */
    public function deleteAction(Request $request, Register $register)
    {
        $form = $this->createDeleteForm($register);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($register);
            $em->flush();
        }

        return $this->redirectToRoute('member_index');
    }

    /**
     * Creates a form to delete a Register entity.
     *
     * @param Register $register The Register entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Register $register)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('member_delete', array('id' => $register->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
