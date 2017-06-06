<?php

namespace AppBundle\Controller;

use AppBundle\Entity\ExamenGeneral;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Examengeneral controller.
 *
 * @Route("examengeneral")
 */
class ExamenGeneralController extends Controller
{
    /**
     * Lists all examenGeneral entities.
     *
     * @Route("/{semestre}", requirements={"semestre" = "20\d\d-[1|2]"}, name="examengeneral_index")
     * @Method("GET")
     */
    public function indexAction($semestre = '2017-2')
    {
        $em = $this->getDoctrine()->getManager();

        $examenGenerales = $em->getRepository('AppBundle:ExamenGeneral')->findAllOrderByExamenGeneral($semestre);
        $semestre_lista = $em->getRepository('AppBundle:Semestre')->findAllSemestre();

        return $this->render('examengeneral/index.html.twig', array(
            '_semestre' => $semestre,
            'examenGenerales' => $examenGenerales,
            'semestres_lista' => $semestre_lista,
        ));
    }

    /**
     * Creates a new examenGeneral entity.
     *
     * @Route("/new", name="examengeneral_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $this->denyAccessUnlessGranted('ROLE_ADMIN', null, 'Unable to access this page!');

        $em = $this->getDoctrine()->getManager();
        $semestre_lista = $em->getRepository('AppBundle:Semestre')->findAllSemestre();
        $semestre_final = end($semestre_lista);


        $form = $this->createForm('AppBundle\Form\ExamenGeneralType', $examenGeneral = new Examengeneral());
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($examenGeneral);
            $em->flush();


            return $this->redirectToRoute('examengeneral_show', array('id' => $examenGeneral->getId()));
        }

        return $this->render('examengeneral/new.html.twig', array(
            'examenGeneral' => $examenGeneral,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a examenGeneral entity.
     *
     * @Route("/{id}", name="examengeneral_show")
     * @Method("GET")
     */
    public function showAction(ExamenGeneral $examenGeneral)
    {
        $deleteForm = $this->createDeleteForm($examenGeneral);


        return $this->render('examengeneral/show.html.twig', array(
            'examenGeneral' => $examenGeneral,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing examenGeneral entity.
     *
     * @Route("/{id}/edit", name="examengeneral_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, ExamenGeneral $examenGeneral)
    {
        $this->denyAccessUnlessGranted('ROLE_ADMIN', null, 'Unable to access this page!');

        $deleteForm = $this->createDeleteForm($examenGeneral);
        $editForm = $this->createForm('AppBundle\Form\ExamenGeneralType', $examenGeneral);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();
            $this->addFlash(
                'notice',
                'Editado correctamente'
            );

            return $this->redirectToRoute('examengeneral_edit', array('id' => $examenGeneral->getId()));
        }

        return $this->render('examengeneral/edit.html.twig', array(
            'examenGeneral' => $examenGeneral,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a examenGeneral entity.
     *
     * @Route("/{id}", name="examengeneral_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, ExamenGeneral $examenGeneral)
    {
        $this->denyAccessUnlessGranted('ROLE_ADMIN', null, 'Unable to access this page!');

        $form = $this->createDeleteForm($examenGeneral);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($examenGeneral);
            $em->flush();
        }

        return $this->redirectToRoute('examengeneral_index');
    }

    /**
     * Creates a form to delete a examenGeneral entity.
     *
     * @param ExamenGeneral $examenGeneral The examenGeneral entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(ExamenGeneral $examenGeneral)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('examengeneral_delete', array('id' => $examenGeneral->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
