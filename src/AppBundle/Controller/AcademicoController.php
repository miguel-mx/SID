<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Academico;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Academico controller.
 *
 * @Route("academico")
 */
class AcademicoController extends Controller
{
    /**
     * Lists all academico entities.
     *
     * @Route("/", name="academico_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $academicos = $em->getRepository('AppBundle:Academico')->findAll();

        return $this->render('academico/index.html.twig', array(
            'academicos' => $academicos,
        ));
    }

    /**
     * Creates a new academico entity.
     *
     * @Route("/new", name="academico_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $this->denyAccessUnlessGranted('ROLE_ADMIN', null, 'Unable to access this page!');

        $academico = new Academico();
        $form = $this->createForm('AppBundle\Form\AcademicoType', $academico);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($academico);
            $em->flush($academico);

            return $this->redirectToRoute('academico_show', array('slug' => $academico->getSlug()));
        }

        return $this->render('academico/new.html.twig', array(
            'academico' => $academico,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a academico entity.
     *
     * @Route("/{slug}/{semestre}", requirements={"semestre" = "20\d\d-[1|2]"}, name="academico_show")
     * @Method("GET")
     */
    public function showAction(Academico $academico, $semestre = '2017-2')
    {
        $deleteForm = $this->createDeleteForm($academico);
        // $semestre_actual = $this->getParameter('semestre');

        $em = $this->getDoctrine()->getManager();

        $cursos = $em->getRepository('AppBundle:Academico')->findAllCursos($semestre, $academico->getId());
        $alumnos = $em->getRepository('AppBundle:Academico')->findAllAlumnos($semestre, $academico->getId());

        return $this->render('academico/show.html.twig', array(
            'academico' => $academico,
            'alumnos' => $alumnos,
            'cursos' => $cursos,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing academico entity.
     *
     * @Route("/{slug}/edit", name="academico_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Academico $academico)
    {
        $this->denyAccessUnlessGranted('ROLE_ADMIN', null, 'Unable to access this page!');

        $deleteForm = $this->createDeleteForm($academico);
        $editForm = $this->createForm('AppBundle\Form\AcademicoType', $academico);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            $this->addFlash(
                'notice',
                'Editado correctamente'
            );

            return $this->redirectToRoute('academico_edit', array('slug' => $academico->getSlug()));
        }

        return $this->render('academico/edit.html.twig', array(
            'academico' => $academico,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a academico entity.
     *
     * @Route("/{id}", name="academico_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Academico $academico)
    {
        $this->denyAccessUnlessGranted('ROLE_ADMIN', null, 'Unable to access this page!');
        $form = $this->createDeleteForm($academico);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($academico);
            $em->flush($academico);
        }

        return $this->redirectToRoute('academico_index');
    }

    /**
     * Creates a form to delete a academico entity.
     *
     * @param Academico $academico The academico entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Academico $academico)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('academico_delete', array('id' => $academico->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
