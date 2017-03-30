<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Semestre;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Semestre controller.
 *
 * @Route("semestre")
 */
class SemestreController extends Controller
{
    /**
     * Lists all semestre entities.
     *
     * @Route("/", name="semestre_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $semestres = $em->getRepository('AppBundle:Semestre')->findAll();



        return $this->render('semestre/index.html.twig', array(
            'semestres' => $semestres,
        ));
    }

    /**
     * Creates a new semestre entity.
     *
     * @Route("/new", name="semestre_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $semestre = new Semestre();
        $form = $this->createForm('AppBundle\Form\SemestreType', $semestre);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($semestre);
            $em->flush($semestre);

            return $this->redirectToRoute('semestre_show', array('id' => $semestre->getId()));
        }

        return $this->render('semestre/new.html.twig', array(
            'semestre' => $semestre,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a semestre entity.
     *
     * @Route("/{slug}", name="semestre_show")
     * @Method("GET")
     */
    public function showAction(Semestre $semestre)
    {

        $em = $this->getDoctrine()->getManager();

        $alumnos_maestria = $em->getRepository('AppBundle:Alumno')->findAllBySemestre($semestre->getSemestre(), 'Maestría');
        $alumnos_doctorado = $em->getRepository('AppBundle:Alumno')->findAllBySemestre($semestre->getSemestre(), 'Doctorado');
        $programas_egresan = $em->getRepository('AppBundle:Programa')->findByTermino($semestre->getSemestre());
        $examenes_candidatura = $em->getRepository('AppBundle:Alumno')->findAllByExamenCandidatura($semestre->getSemestre());

        return $this->render('semestre/show.html.twig', array(
            'semestre' => $semestre,
            'alumnos_maestria' => $alumnos_maestria,
            'alumnos_doctorado' => $alumnos_doctorado,
            'programas_egresan' => $programas_egresan,
            'examenes_candidatura' => $examenes_candidatura,
        ));
    }

    /**
     * Displays a form to edit an existing semestre entity.
     *
     * @Route("/{slug}/edit", name="semestre_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Semestre $semestre)
    {
        $deleteForm = $this->createDeleteForm($semestre);
        $editForm = $this->createForm('AppBundle\Form\SemestreType', $semestre);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            $this->addFlash(
                'notice',
                'Editado correctamente'
            );

            return $this->redirectToRoute('semestre_edit', array('slug' => $semestre->getSlug()));
        }

        return $this->render('semestre/edit.html.twig', array(
            'semestre' => $semestre,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a semestre entity.
     *
     * @Route("/{slug}", name="semestre_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Semestre $semestre)
    {
        $form = $this->createDeleteForm($semestre);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($semestre);
            $em->flush($semestre);
        }

        return $this->redirectToRoute('semestre_index');
    }

    /**
     * Creates a form to delete a semestre entity.
     *
     * @param Semestre $semestre The semestre entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Semestre $semestre)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('semestre_delete', array('slug' => $semestre->getslug())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
