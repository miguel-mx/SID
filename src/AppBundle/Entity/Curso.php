<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
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
     * @ORM\Column(name="curso", type="string", length=80)
     */
    private $curso;

    /**
     * @var string
     *
     * @ORM\Column(name="tema", type="string", length=180, nullable=true)
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
     * @ORM\Column(name="creditos", type="integer")
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
     * @ORM\Column(name="objetivo", type="string", length=100, nullable=true)
     */
    private $objetivo;

    /**
     * @var string
     *
     * @ORM\Column(name="temario", type="string", length=1000, nullable=true)
     */
    private $temario;

    /**
     * @var string
     *
     * @ORM\Column(name="bibliografia", type="string", length=1000, nullable=true)
     */
    private $bibliografia;

    /**
     * @var string
     *
     * @ORM\Column(name="requisitos", type="string", length=1000, nullable=true)
     */
    private $requisitos;

    /**
     * @var string
     *
     * @ORM\Column(name="comentarios", type="string", length=100, nullable=true)
     */
    private $comentarios;

    /**
     * @var string
     *
     * @ORM\Column(name="status", type="string", length=30, nullable=true)
     */
    private $status;

    /**
     * @var string
     *
     * @ORM\Column(name="clave_grupo", type="string", length=25)
     */
    private $claveGrupo;

    /**
     * @var string
     *
     * @ORM\Column(name="lugar", type="string", length=50, nullable=true)
     */
    private $lugar;

    /**
     * Many Cursos have Many Programas.
     * @ORM\ManyToMany(targetEntity="Programa", mappedBy="cursos")
     */
    private $programas;

   /**
    * Many Cursos have One Semestre.
    * @ORM\ManyToOne(targetEntity="Semestre", inversedBy="cursos")
    * @ORM\JoinColumn(name="semestre_id", referencedColumnName="id")
    */
    private $semestre;

   /**
    * Many Cursos have One Profesor.
    * @ORM\ManyToOne(targetEntity="Academico")
    * @ORM\JoinColumn(name="profesor_id", referencedColumnName="id", nullable=true)
    */
    private $profesor;

    /**
     * @Gedmo\Slug(fields={"curso"})
     * @ORM\Column(length=90, unique=true)
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
        $this->programas = new \Doctrine\Common\Collections\ArrayCollection();
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
     * @return string
     */
    public function getObjetivo()
    {
        return $this->objetivo;
    }

    /**
     * @param string $objetivo
     */
    public function setObjetivo($objetivo)
    {
        $this->objetivo = $objetivo;
    }

    /**
     * @return string
     */
    public function getTemario()
    {
        return $this->temario;
    }

    /**
     * @param string $temario
     */
    public function setTemario($temario)
    {
        $this->temario = $temario;
    }

    /**
     * @return string
     */
    public function getBibliografia()
    {
        return $this->bibliografia;
    }

    /**
     * @param string $bibliografia
     */
    public function setBibliografia($bibliografia)
    {
        $this->bibliografia = $bibliografia;
    }

    /**
     * @return string
     */
    public function getRequisitos()
    {
        return $this->requisitos;
    }

    /**
     * @param string $requisitos
     */
    public function setRequisitos($requisitos)
    {
        $this->requisitos = $requisitos;
    }

    /**
     * @return string
     */
    public function getComentarios()
    {
        return $this->comentarios;
    }

    /**
     * @param string $comentarios
     */
    public function setComentarios($comentarios)
    {
        $this->comentarios = $comentarios;
    }

    /**
     * @return string
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param string $status
     */
    public function setStatus($status)
    {
        $this->status = $status;
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

    public function addPrograma(Programa $programa)
    {
        $this->programas[] = $programa;
    }

    public function getProgramas()
    {
        return $this->programas;
    }

    public function __toString() {
        return $this->getSemestre() . ' | ' .  $this->claveGrupo . ' | ' .  $this->curso .  ' | ' . $this->getProfesor();
    }

    /**
     * @return Semestre
     */
    public function getSemestre()
    {
        return $this->semestre;
    }

    /**
     * @param Semestre $semestre
     */
    public function setSemestre(Semestre $semestre)
    {
        $this->semestre = $semestre;
    }

    /**
     * @return Academico
     */
    public function getProfesor()
    {
        return $this->profesor;
    }

    /**
     * @param Academico $profesor
     */
    public function setProfesor(Academico $profesor)
    {
        $this->profesor = $profesor;
    }
}
