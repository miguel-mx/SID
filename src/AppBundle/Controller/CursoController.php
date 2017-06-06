<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Curso;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

/**
 * Curso controller.
 *
 * @Route("curso")
 */
class CursoController extends Controller
{
    /**
     * Lists all curso entities.
     *
     * @Route("/{semestre}", requirements={"semestre" = "20\d\d-[1|2]"}, name="curso_index")
     * @Method("GET")
     */
    public function indexAction($semestre = '2017-2')
    {
        $em = $this->getDoctrine()->getManager();

        //$cursos = $em->getRepository('AppBundle:Curso')->findAll();
        //$semestre_actual = $this->getParameter('semestre');
        $cursos = $em->getRepository('AppBundle:Curso')->findAllOrderByCurso($semestre);
        $semestre_lista = $em->getRepository('AppBundle:Semestre')->findAllSemestre();

        return $this->render('curso/index.html.twig', array(
            '_semestre' => $semestre,
            'cursos' => $cursos,
            'semestres_lista' => $semestre_lista,

        ));
    }

    /**
     * Creates a new curso entity.
     *
     * @Route("/new", name="curso_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $semestre_lista = $em->getRepository('AppBundle:Semestre')->findAllSemestre();
        $semestre_final = end($semestre_lista);

        $form = $this->createForm('AppBundle\Form\CursoType' ,$curso = new Curso())
//           ->add('semestre', 'hidden')->setData($semestre_final)
        ;

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid() && $curso->getCurso()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($curso);
            $em->flush();

            return $this->redirectToRoute('curso_show', array('id' => $curso->getId()));
        }

        return $this->render('curso/new.html.twig', array(
            'form' => $form->createView(),


        ));
    }

    /**
     * Finds and displays a curso entity.
     *
     * @Route("/{id}", name="curso_show")
     * @Method("GET")
     */
    public function showAction(Curso $curso)
    {
        $deleteForm = $this->createDeleteForm($curso);

        return $this->render('curso/show.html.twig', array(
            'curso' => $curso,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing curso entity.
     *
     * @Route("/{id}/edit", name="curso_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Curso $curso)
    {
        $this->denyAccessUnlessGranted('ROLE_ADMIN', null, 'Unable to access this page!');



        $deleteForm = $this->createDeleteForm($curso);
        $editForm = $this->createForm('AppBundle\Form\CursoType', $curso)
            ->add('horasSemana')
            ->add('creditos')
            ->add('asignatura')
            ->add('claveGrupo')
            ->add('lugar')
            ->add('semestre')
            ->add('aceptado')
        ;
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($curso);
            $em->flush();
            $this->addFlash(
                'notice',
                'Editado correctamente'
            );

            return $this->redirectToRoute('curso_edit', array('id' => $curso->getId()));
        }
        return $this->render('curso/edit.html.twig', array(
            'curso' => $curso,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a curso entity.
     *
     * @Route("/{id}", name="curso_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Curso $curso)
    {
        $this->denyAccessUnlessGranted('ROLE_ADMIN', null, 'Unable to access this page!');

        $form = $this->createDeleteForm($curso);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($curso);
            $em->flush($curso);
        }

        return $this->redirectToRoute('curso_index');
    }

    /**
     * Creates a form to delete a curso entity.
     *
     * @param Curso $curso The Curso entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Curso $curso)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('curso_delete', array('id' => $curso->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
