<?php

namespace YouthConventionBundle\Controller;

use YouthConventionBundle\Entity\Delegates;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use YouthConventionBundle\Mvaayo;

/**
 * Delegate controller.
 *
 */
class DelegatesController extends Controller
{
    /**
     * Lists all delegate entities.
     *
     */
    public function indexAction()
    {

        $em = $this->getDoctrine()->getManager();
        $delegates = $em->getRepository('YouthConventionBundle:Delegates')->findAll();

        return $this->render('delegates/index.html.twig', array(
            'delegates' => $delegates,
        ));
    }

    /**
     * Creates a new delegate entity.
     *
     */
    public function newAction(Request $request)
    {
        $delegate = new Delegates();
        $form = $this->createForm('YouthConventionBundle\Form\DelegatesType', $delegate);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($delegate);
            $em->flush();

            $request->getSession()
                ->getFlashBag()
                ->add('success', 'Registration successful!');

            $mvaayo = new Mvaayo();
            $mvaayo->SmsAction($delegate);

            return $this->redirectToRoute('delegates_show', array('id' => $delegate->getId()));
        }

        return $this->render('delegates/new.html.twig', array(
            'delegate' => $delegate,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a delegate entity.
     *
     */
    public function showAction(Delegates $delegate)
    {
        $deleteForm = $this->createDeleteForm($delegate);

        return $this->render('delegates/show.html.twig', array(
            'delegate' => $delegate,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing delegate entity.
     *
     */
    public function editAction(Request $request, Delegates $delegate)
    {
        $deleteForm = $this->createDeleteForm($delegate);
        $editForm = $this->createForm('YouthConventionBundle\Form\DelegatesType', $delegate);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();
            $request->getSession()
                ->getFlashBag()
                ->add('success', 'Edited successfully!');
            return $this->redirectToRoute('delegates_edit', array('id' => $delegate->getId()));
        }

        return $this->render('delegates/edit.html.twig', array(
            'delegate' => $delegate,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a delegate entity.
     *
     */
    public function deleteAction(Request $request, Delegates $delegate)
    {
        $form = $this->createDeleteForm($delegate);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($delegate);
            $em->flush($delegate);
        }

        return $this->redirectToRoute('delegates_index');
    }

    /**
     * Creates a form to delete a delegate entity.
     *
     * @param Delegates $delegate The delegate entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Delegates $delegate)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('delegates_delete', array('id' => $delegate->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
