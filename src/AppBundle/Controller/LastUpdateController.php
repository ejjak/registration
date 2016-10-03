<?php

namespace AppBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use AppBundle\Entity\LastUpdate;
use AppBundle\Form\LastUpdateType;

/**
 * LastUpdate controller.
 *
 * @Route("/lastupdate")
 */
class LastUpdateController extends Controller
{
    /**
     * Lists all LastUpdate entities.
     *
     * @Route("/", name="lastupdate_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $lastUpdates = $em->getRepository('AppBundle:LastUpdate')->findAll();

        return $this->render('lastupdate/index.html.twig', array(
            'lastUpdates' => $lastUpdates,
        ));
    }

    /**
     * Creates a new LastUpdate entity.
     *
     * @Route("/new", name="lastupdate_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $lastUpdate = new LastUpdate();
        $form = $this->createForm('AppBundle\Form\LastUpdateType', $lastUpdate);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($lastUpdate);
            $em->flush();

            return $this->redirectToRoute('lastupdate_show', array('id' => $lastUpdate->getId()));
        }

        return $this->render('lastupdate/new.html.twig', array(
            'lastUpdate' => $lastUpdate,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a LastUpdate entity.
     *
     * @Route("/{id}", name="lastupdate_show")
     * @Method("GET")
     */
    public function showAction(LastUpdate $lastUpdate)
    {
        $deleteForm = $this->createDeleteForm($lastUpdate);

        return $this->render('lastupdate/show.html.twig', array(
            'lastUpdate' => $lastUpdate,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing LastUpdate entity.
     *
     * @Route("/{id}/edit", name="lastupdate_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, LastUpdate $lastUpdate)
    {
        $deleteForm = $this->createDeleteForm($lastUpdate);
        $editForm = $this->createForm('AppBundle\Form\LastUpdateType', $lastUpdate);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($lastUpdate);
            $em->flush();

            return $this->redirectToRoute('lastupdate_edit', array('id' => $lastUpdate->getId()));
        }

        return $this->render('lastupdate/edit.html.twig', array(
            'lastUpdate' => $lastUpdate,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a LastUpdate entity.
     *
     * @Route("/{id}", name="lastupdate_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, LastUpdate $lastUpdate)
    {
        $form = $this->createDeleteForm($lastUpdate);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($lastUpdate);
            $em->flush();
        }

        return $this->redirectToRoute('lastupdate_index');
    }

    /**
     * Creates a form to delete a LastUpdate entity.
     *
     * @param LastUpdate $lastUpdate The LastUpdate entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(LastUpdate $lastUpdate)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('lastupdate_delete', array('id' => $lastUpdate->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
