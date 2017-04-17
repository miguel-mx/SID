<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Alumno;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;
use Doctrine\ORM\Mapping as ORM;

/**
 * Alumno controller.
 *
 * @Route("alumno")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\AlumnoRepository")
 */
class AlumnoController extends Controller
{
    /**
     * Lists all alumno entities.
     * @Route("/{semestre}", requirements={"semestre" = "20\d\d-[1|2]"}, name="alumno_index")
     * @Method("GET")
     */
    public function indexAction($semestre = '2017-2')
    {
        $em = $this->getDoctrine()->getManager();

        //$semestre_actual = $this->getParameter('semestre');
        $alumnos_maestria = $em->getRepository('AppBundle:Alumno')->findAllBySemestre($semestre, 'Maestría');
        $alumnos_doctorado = $em->getRepository('AppBundle:Alumno')->findAllBySemestre($semestre, 'Doctorado');
        $semestre_lista = $em->getRepository('AppBundle:Semestre')->findAllSemestre();

        return $this->render('alumno/index.html.twig', array(
            '_semestre' => $semestre,
            'alumnos_maestria' => $alumnos_maestria,
            'alumnos_doctorado' => $alumnos_doctorado,
            'semestres_lista' => $semestre_lista,
        ));
    }

    /**
     * Lists all alumno entities.
     *
     * @Route("/all", name="alumno_all")
     * @Method("GET")
     */
    public function allAction()
    {
        $em = $this->getDoctrine()->getManager();


        $alumnos = $em->getRepository('AppBundle:Alumno')->findAllOrderedByPaterno();

        return $this->render(':alumno:todos.html.twig', array(
            'alumnos' => $alumnos,
        ));
    }

    /**
     * Creates a new alumno entity.
     *
     * @Route("/new", name="alumno_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $this->denyAccessUnlessGranted('ROLE_ADMIN', null, 'Unable to access this page!');

        $alumno = new Alumno();
        $form = $this->createForm('AppBundle\Form\AlumnoType', $alumno);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($alumno);
            $em->flush($alumno);

            return $this->redirectToRoute('alumno_show', array('slug' => $alumno->getSlug()));
        }

        return $this->render('alumno/new.html.twig', array(
            'alumno' => $alumno,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a alumno entity.
     *
     * @Route("/{slug}", name="alumno_show")
     * @Method("GET")
     */
    public function showAction(Alumno $alumno)
    {
        $deleteForm = $this->createDeleteForm($alumno);

        return $this->render('alumno/show.html.twig', array(
            'alumno' => $alumno,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing alumno entity.
     *
     * @Route("/{slug}/edit", name="alumno_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Alumno $alumno)
    {
        $this->denyAccessUnlessGranted('ROLE_ADMIN', null, 'Unable to access this page!');

        $deleteForm = $this->createDeleteForm($alumno);
        $editForm = $this->createForm('AppBundle\Form\AlumnoType', $alumno);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            $this->addFlash(
                'notice',
                'Editado correctamente'
            );

            return $this->redirectToRoute('alumno_edit', array('slug' => $alumno->getSlug()));
        }

        return $this->render('alumno/edit.html.twig', array(
            'alumno' => $alumno,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),


        ));
    }

    /**
     * Deletes a alumno entity.
     *
     * @Route("/{id}", name="alumno_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Alumno $alumno)
    {

        $this->denyAccessUnlessGranted('ROLE_ADMIN', null, 'Unable to access this page!');
        $form = $this->createDeleteForm($alumno);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($alumno);
            $em->flush($alumno);
        }

        return $this->redirectToRoute('alumno_index');
    }

    /**
     * Creates a form to delete a alumno entity.
     *
     * @param Alumno $alumno The alumno entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Alumno $alumno)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('alumno_delete', array('id' => $alumno->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
