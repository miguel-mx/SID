<?php

namespace AppBundle\Controller;

use AppBundle\Entity\ProgramaMaestriaExterno;
use AppBundle\Entity\Alumno;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Programamaestriaexterno controller.
 *
 * @Route("programamaestriaexterno")
 */
class ProgramaMaestriaExternoController extends Controller
{
    /**
     * Lists all programaMaestriaExterno entities.
     *
     * @Route("/", name="programamaestriaexterno_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $programaMaestriaExternos = $em->getRepository('AppBundle:ProgramaMaestriaExterno')->findAll();

        return $this->render('programamaestriaexterno/index.html.twig', array(
            'programaMaestriaExternos' => $programaMaestriaExternos,
        ));
    }

    /**
     * Creates a new programaMaestriaExterno entity.
     *
     * @Route("/{slug}/new", name="programamaestriaexterno_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request, Alumno $alumno)
    {
        $programaMaestriaExterno = new Programamaestriaexterno();
        $form = $this->createForm('AppBundle\Form\ProgramaMaestriaExternoType', $programaMaestriaExterno);
        $form->handleRequest($request);

        $programaMaestriaExterno->setAlumno($alumno);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($programaMaestriaExterno);
            $em->flush();

            return $this->redirectToRoute('alumno_show', array('slug' => $programaMaestriaExterno->getAlumno()->getSlug()));
        }

        return $this->render('programamaestriaexterno/new.html.twig', array(
            'programaMaestriaExterno' => $programaMaestriaExterno,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a programaMaestriaExterno entity.
     *
     * @Route("/{id}", name="programamaestriaexterno_show")
     * @Method("GET")
     */
    public function showAction(ProgramaMaestriaExterno $programaMaestriaExterno)
    {
        $deleteForm = $this->createDeleteForm($programaMaestriaExterno);

        return $this->render('programamaestriaexterno/show.html.twig', array(
            'programaMaestriaExterno' => $programaMaestriaExterno,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing programaMaestriaExterno entity.
     *
     * @Route("/{id}/edit", name="programamaestriaexterno_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, ProgramaMaestriaExterno $programaMaestriaExterno)
    {
        $deleteForm = $this->createDeleteForm($programaMaestriaExterno);
        $editForm = $this->createForm('AppBundle\Form\ProgramaMaestriaExternoType', $programaMaestriaExterno);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            $this->addFlash(
                'notice',
                'Editado correctamente'
            );

            //return $this->redirectToRoute('programamaestriaexterno_edit', array('id' => $programaMaestriaExterno->getId()));
            return $this->redirectToRoute('alumno_show', array('slug' => $programaMaestriaExterno->getAlumno()->getSlug()));
        }

        return $this->render('programamaestriaexterno/edit.html.twig', array(
            'programaMaestriaExterno' => $programaMaestriaExterno,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a programaMaestriaExterno entity.
     *
     * @Route("/{id}", name="programamaestriaexterno_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, ProgramaMaestriaExterno $programaMaestriaExterno)
    {
        $this->denyAccessUnlessGranted('ROLE_ADMIN', null, 'Unable to access this page!');

        $form = $this->createDeleteForm($programaMaestriaExterno);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($programaMaestriaExterno);
            $em->flush();
        }

        return $this->redirectToRoute('programamaestriaexterno_index');
    }

    /**
     * Creates a form to delete a programaMaestriaExterno entity.
     *
     * @param ProgramaMaestriaExterno $programaMaestriaExterno The programaMaestriaExterno entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(ProgramaMaestriaExterno $programaMaestriaExterno)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('programamaestriaexterno_delete', array('id' => $programaMaestriaExterno->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
