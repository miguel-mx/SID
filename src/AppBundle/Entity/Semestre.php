<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Gedmo\Mapping\Annotation as Gedmo;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Semestre
 *
 * @ORM\Table(name="semestre")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\SemestreRepository")
 * @ORM\HasLifecycleCallbacks()
 */
class Semestre
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="semestre", type="string", length=10)
     */
    private $semestre;

    /**
     * @var \Date
     *
     * @ORM\Column(name="fechaInicio", type="date")
     */
    private $fechaInicio;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fechaFin", type="date")
     */
    private $fechaFin;

    /**
     * One Semestre has Many Cursos.
     * @ORM\OneToMany(targetEntity="Curso", mappedBy="semestre")
     */
    private $cursos;

    /**
     * One Semestre has Many Aspirantes.
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Aspirante", mappedBy="semestre")
     */
    private $aspirantes;

   /**
    * Many Semestres have Many Programas.
    * @ORM\ManyToMany(targetEntity="Programa", mappedBy="semestres")
    */
    private $programas;

    /**
     * @Gedmo\Slug(fields={"semestre"})
     * @ORM\Column(length=10, unique=true)
     */
    private $slug;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="createdAt", type="datetime")
     */
    private $createdAt;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="modifiedAt", type="datetime")
     */
    private $modifiedAt;

    public function __construct() {
        $this->cursos = new \Doctrine\Common\Collections\ArrayCollection();
        $this->programas = new \Doctrine\Common\Collections\ArrayCollection();
        $this->aspirantes = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set semestre
     *
     * @param string $semestre
     * @return Semestre
     */
    public function setSemestre($semestre)
    {
        $this->semestre = $semestre;

        return $this;
    }

    /**
     * Get semestre
     *
     * @return string
     */
    public function getSemestre()
    {
        return $this->semestre;
    }

    /**
     * Set fechaInicio
     *
     * @param \DateTime $fechaInicio
     * @return Semestre
     */
    public function setFechaInicio($fechaInicio)
    {
        $this->fechaInicio = $fechaInicio;

        return $this;
    }

    /**
     * Get fechaInicio
     *
     * @return \DateTime
     */
    public function getFechaInicio()
    {
        return $this->fechaInicio;
    }

    /**
     * Set fechaFin
     *
     * @param \DateTime $fechaFin
     * @return Semestre
     */
    public function setFechaFin($fechaFin)
    {
        $this->fechaFin = $fechaFin;

        return $this;
    }

    /**
     * Get fechaFin
     *
     * @return \DateTime
     */
    public function getFechaFin()
    {
        return $this->fechaFin;
    }
    /**
     * Get slug
     *
     * @return string
     */
    public function getSlug()
    {
        return $this->slug;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     * @return Semestre
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * Get createdAt
     *
     * @return \DateTime
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * Set modifiedAt
     *
     * @param \DateTime $modifiedAt
     * @return Semestre
     */
    public function setModifiedAt($modifiedAt)
    {
        $this->modifiedAt = $modifiedAt;

        return $this;
    }

    /**
     * Get modifiedAt
     *
     * @return \DateTime
     */
    public function getModifiedAt()
    {
        return $this->modifiedAt;
    }

    /**
     * @ORM\PrePersist
     */
    public function setCreatedAtValue()
    {
        $this->createdAt = new \DateTime();
        $this->modifiedAt = new \DateTime();
    }

    /**
     * @return Curso
     */
    public function getCursos()
    {
        return $this->cursos;
    }

    /**
     * @param Curso $cursos
     */
    public function setCursos(Curso $cursos)
    {
        $this->cursos = $cursos;
    }

    /**
     * @return Aspirante
     */
    public function getAspirantes()
    {
        return $this->aspirantes;
    }

    /**
     * @param mixed $aspirantes
     */
    public function setAspirantes(Aspirante $aspirantes)
    {
        $this->aspirantes = $aspirantes;
    }


    public function __toString() {
        return $this->semestre;
    }

    /**
     * @return mixed
     */
    public function getProgramas()
    {
        return $this->programas;
    }

    /**
     * @param Programa $programa
     */
    public function addPrograma(Programa $programa)
    {
        $this->programas[] = $programa;
    }
}
