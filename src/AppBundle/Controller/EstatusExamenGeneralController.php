<?php

namespace AppBundle\Controller;

use AppBundle\Entity\EstatusExamenGeneral;
use AppBundle\Entity\Programa;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Estatusexamengeneral controller.
 *
 * @Route("estatusexamengeneral")
 */
class EstatusExamenGeneralController extends Controller
{
    /**
     * Lists all estatusExamenGeneral entities.
     *
     * @Route("/", name="estatusexamengeneral_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $estatusExamenGenerales = $em->getRepository('AppBundle:EstatusExamenGeneral')->findAll();

        return $this->render('estatusexamengeneral/index.html.twig', array(
            'estatusExamenGenerales' => $estatusExamenGenerales,
        ));
    }

    /**
     * Creates a new estatusExamenGeneral entity.
     *
     * @Route("/{id}/new", requirements={"semestre" = "20\d\d-[1|2]"}, name="estatusexamengeneral_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request, Programa $programa)
    {

        $estatusExamenGeneral = new Estatusexamengeneral();
        $estatusExamenGeneral->setPrograma($programa);

        $form = $this->createForm('AppBundle\Form\EstatusExamenGeneralType',  $estatusExamenGeneral );
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($estatusExamenGeneral);
            $em->flush();

            return $this->redirectToRoute('estatusexamengeneral_show', array('id' => $estatusExamenGeneral->getId()));
        }

        return $this->render('estatusexamengeneral/new.html.twig', array(
            'estatusExamenGeneral' => $estatusExamenGeneral,
            'form' => $form->createView(),
            'programa' => $programa,
        ));
    }

    /**
     * Finds and displays a estatusExamenGeneral entity.
     *
     * @Route("/{id}", name="estatusexamengeneral_show")
     * @Method("GET")
     */
    public function showAction(EstatusExamenGeneral $estatusExamenGeneral)
    {
        $deleteForm = $this->createDeleteForm($estatusExamenGeneral);

        return $this->render('estatusexamengeneral/show.html.twig', array(
            'estatusExamenGeneral' => $estatusExamenGeneral,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing estatusExamenGeneral entity.
     *
     * @Route("/{id}/edit", name="estatusexamengeneral_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, EstatusExamenGeneral $estatusExamenGeneral)
    {
        $deleteForm = $this->createDeleteForm($estatusExamenGeneral);
        $editForm = $this->createForm('AppBundle\Form\EstatusExamenGeneralType', $estatusExamenGeneral);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('estatusexamengeneral_edit', array('id' => $estatusExamenGeneral->getId()));
        }

        return $this->render('estatusexamengeneral/edit.html.twig', array(
            'estatusExamenGeneral' => $estatusExamenGeneral,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a estatusExamenGeneral entity.
     *
     * @Route("/{id}", name="estatusexamengeneral_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, EstatusExamenGeneral $estatusExamenGeneral)
    {
        $form = $this->createDeleteForm($estatusExamenGeneral);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($estatusExamenGeneral);
            $em->flush();
        }

        return $this->redirectToRoute('estatusexamengeneral_index');
    }

    /**
     * Creates a form to delete a estatusExamenGeneral entity.
     *
     * @param EstatusExamenGeneral $estatusExamenGeneral The estatusExamenGeneral entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(EstatusExamenGeneral $estatusExamenGeneral)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('estatusexamengeneral_delete', array('id' => $estatusExamenGeneral->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
