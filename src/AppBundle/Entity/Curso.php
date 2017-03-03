<?php

namespace AppBundle\Entity;

use Gedmo\Mapping\Annotation as Gedmo;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Curso
 *
 * @ORM\Table(name="curso")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\CursoRepository")
 * @ORM\HasLifecycleCallbacks()
 */
class Curso
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
     * @ORM\Column(name="tipo", type="string", length=12)
     */
    private $tipo;

    /**
     * @var string
     *
     * @ORM\Column(name="curso", type="string", length=60)
     */
    private $curso;

    /**
     * @var string
     *
     * @ORM\Column(name="tema", type="string", length=60, nullable=true)
     */
    private $tema;

    /**
     * @var string
     *
     * @ORM\Column(name="horas_semana", type="string", length=10)
     */
    private $horasSemana;

    /**
     * @var string
     *
     * @ORM\Column(name="creditos", type="string", length=4)
     */
    private $creditos;

    /**
     * @var string
     *
     * @ORM\Column(name="asignatura", type="string", length=60)
     */
    private $asignatura;

    /**
     * @var string
     *
     * @ORM\Column(name="clave_grupo", type="string", length=25)
     */
    private $claveGrupo;

    /**
     * @var string
     *
     * @ORM\Column(name="lugar", type="string", length=50)
     */
    private $lugar;

    /**
     * Many Cursos have Many Alumnos.
     * @ORM\ManyToMany(targetEntity="Alumno", mappedBy="cursos")
     */
    private $alumnos;

    /**
     * @Gedmo\Slug(fields={"curso"})
     * @ORM\Column(length=30, unique=true)
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

    /**
     * curso constructor.
     */
    public function __construct() {
        $this->alumnos = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set tipo
     *
     * @param string $tipo
     * @return Curso
     */
    public function setTipo($tipo)
    {
        $this->tipo = $tipo;

        return $this;
    }

    /**
     * Get tipo
     *
     * @return string 
     */
    public function getTipo()
    {
        return $this->tipo;
    }

    /**
     * Set curso
     *
     * @param string $curso
     * @return Curso
     */
    public function setCurso($curso)
    {
        $this->curso = $curso;

        return $this;
    }

    /**
     * Get curso
     *
     * @return string 
     */
    public function getCurso()
    {
        return $this->curso;
    }

    /**
     * Set tema
     *
     * @param string $tema
     * @return Curso
     */
    public function setTema($tema)
    {
        $this->tema = $tema;

        return $this;
    }

    /**
     * Get tema
     *
     * @return string 
     */
    public function getTema()
    {
        return $this->tema;
    }

    /**
     * Set horasSemana
     *
     * @param string $horasSemana
     * @return Curso
     */
    public function setHorasSemana($horasSemana)
    {
        $this->horasSemana = $horasSemana;

        return $this;
    }

    /**
     * Get horasSemana
     *
     * @return string 
     */
    public function getHorasSemana()
    {
        return $this->horasSemana;
    }

    /**
     * Set creditos
     *
     * @param string $creditos
     * @return Curso
     */
    public function setCreditos($creditos)
    {
        $this->creditos = $creditos;

        return $this;
    }

    /**
     * Get creditos
     *
     * @return string 
     */
    public function getCreditos()
    {
        return $this->creditos;
    }

    /**
     * Set asignatura
     *
     * @param string $asignatura
     * @return Curso
     */
    public function setAsignatura($asignatura)
    {
        $this->asignatura = $asignatura;

        return $this;
    }

    /**
     * Get asignatura
     *
     * @return string 
     */
    public function getAsignatura()
    {
        return $this->asignatura;
    }

    /**
     * Set claveGrupo
     *
     * @param string $claveGrupo
     * @return Curso
     */
    public function setClaveGrupo($claveGrupo)
    {
        $this->claveGrupo = $claveGrupo;

        return $this;
    }

    /**
     * Get claveGrupo
     *
     * @return string 
     */
    public function getClaveGrupo()
    {
        return $this->claveGrupo;
    }

    /**
     * Set lugar
     *
     * @param string $lugar
     * @return Curso
     */
    public function setLugar($lugar)
    {
        $this->lugar = $lugar;

        return $this;
    }

    /**
     * Get lugar
     *
     * @return string 
     */
    public function getLugar()
    {
        return $this->lugar;
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
     * @return Curso
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
     * @return Curso
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

    public function addAlumno(Alumno $alumno)
    {
        $this->alumnos[] = $alumno;
    }

    public function getAlumnos()
    {
        return $this->alumnos;
    }

    public function __toString() {
        return $this->curso;
    }
}
