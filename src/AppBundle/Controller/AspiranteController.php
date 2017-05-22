<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Aspirante;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;
use Doctrine\ORM\Mapping as ORM;

/**
 * Aspirante controller.
 *
 * @Route("aspirante")
 */
class AspiranteController extends Controller
{
    /**
     * Lists all aspirante entities.
     *
     * @Route("/{semestre}", requirements={"semestre" = "20\d\d-[1|2]"}, name="aspirante_index")
     * @Method("GET")
     */
    public function indexAction($semestre = '2017-2')
    {
        $em = $this->getDoctrine()->getManager();

        $aspirantes = $em->getRepository('AppBundle:Aspirante')->findAll();
        $aspirantes_maestria = $em->getRepository('AppBundle:Aspirante')->findAllBySemestre($semestre, 'Maestría');
        $aspirantes_doctorado = $em->getRepository('AppBundle:Aspirante')->findAllBySemestre($semestre, 'Doctorado');
        $semestre_lista = $em->getRepository('AppBundle:Semestre')->findAllSemestre();

        return $this->render('aspirante/index.html.twig', array(
            '_semestre' => $semestre,
            'aspirantes' => $aspirantes,
            'semestres_lista' => $semestre_lista,
            'aspirantes_maestria' => $aspirantes_maestria,
            'aspirantes_doctorado' => $aspirantes_doctorado,
        ));
    }

    /**
     * Creates a new aspirante entity.
     *
     * @Route("/new", name="aspirante_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $this->denyAccessUnlessGranted('ROLE_ADMIN', null, 'Unable to access this page!');

        $aspirante = new Aspirante();
        $form = $this->createForm('AppBundle\Form\AspiranteType', $aspirante);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($aspirante);
            $em->flush();

            return $this->redirectToRoute('aspirante_show', array('slug' => $aspirante->getSlug()));
        }

        return $this->render('aspirante/new.html.twig', array(
            'aspirante' => $aspirante,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a aspirante entity.
     *
     * @Route("/{slug}", name="aspirante_show")
     * @Method("GET")
     */
    public function showAction(Aspirante $aspirante)
    {
        $deleteForm = $this->createDeleteForm($aspirante);

        return $this->render('aspirante/show.html.twig', array(
            'aspirante' => $aspirante,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing aspirante entity.
     *
     * @Route("/{slug}/edit", name="aspirante_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Aspirante $aspirante)
    {
        $this->denyAccessUnlessGranted('ROLE_ADMIN', null, 'Unable to access this page!');

        $deleteForm = $this->createDeleteForm($aspirante);
        $editForm = $this->createForm('AppBundle\Form\AspiranteType', $aspirante);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            $this->addFlash(
                'notice',
                'Editado correctamente'
            );

            return $this->redirectToRoute('aspirante_edit', array('slug' => $aspirante->getSlug()));
        }

        return $this->render('aspirante/edit.html.twig', array(
            'aspirante' => $aspirante,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a aspirante entity.
     *
     * @Route("/{id}", name="aspirante_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Aspirante $aspirante)
    {
        $form = $this->createDeleteForm($aspirante);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($aspirante);
            $em->flush();
        }

        return $this->redirectToRoute('aspirante_index');
    }

    /**
     * Creates a form to delete a aspirante entity.
     *
     * @param Aspirante $aspirante The aspirante entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Aspirante $aspirante)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('aspirante_delete', array('id' => $aspirante->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
