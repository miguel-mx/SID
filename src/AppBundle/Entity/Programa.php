<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Programa
 *
 * @ORM\Table(name="programa")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ProgramaRepository")
 * @ORM\HasLifecycleCallbacks()
 */
class Programa
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
     * @ORM\Column(name="programa", type="string", length=10)
     */
    private $programa;

    /**
     * @var string
     *
     * @ORM\Column(name="ingreso", type="string", length=15)
     */
    private $ingreso;

    /**
     * @var string
     *
     * @ORM\Column(name="termino", type="string", length=15)
     */
    private $termino;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fechaGradoUMSNH", type="date", nullable=true)
     */
    private $fechaGradoUMSNH;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fechaGradoUNAM", type="date", nullable=true)
     */
    private $fechaGradoUNAM;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fechaCandidatura", type="date", nullable=true)
     */
    private $fechaCandidatura;

    /**
     * @var string
     *
     * @ORM\Column(name="opcionTitulacion", type="string", length=15, nullable=true)
     */
    private $opcionTitulacion;

    /**
     * @var string
     *
     * @ORM\Column(name="tituloTesis", type="string", length=250, nullable=true)
     */
    private $tituloTesis;

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
     * Many Programas have Many Cursos.
     * @ORM\ManyToMany(targetEntity="Curso", inversedBy="programas")
     * @ORM\JoinTable(name="programas_cursos")
     */
    private $cursos;


    /**
     * Many Programas have One Alumno.
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Alumno", inversedBy="programas")
     * @ORM\JoinColumn(name="alumno_id", referencedColumnName="id")
     */
    private $alumno;

   /**
    * Many Programas have Many Semestres.
    * @ORM\ManyToMany(targetEntity="Semestre", inversedBy="programas")
    * @ORM\JoinTable(name="programas_semestres")
    */
    private $semestres;

    /**
     * Many Programas have One Tutor.
     * @ORM\ManyToOne(targetEntity="Academico")
     * @ORM\JoinColumn(name="tutor_id", referencedColumnName="id", nullable=true)
     */
    private $tutor;

   /**
    * Many Programas have Many Tutores.
    * @ORM\ManyToMany(targetEntity="Academico", inversedBy="tutorias")
    * @ORM\JoinTable(name="programas_tutores")
    */
    private $comite_tutorial;

    /** @ORM\OneToMany(targetEntity="AppBundle\Entity\EstatusExamenGeneral", mappedBy="programa") */
    protected $estatusExamenesGenerales;


    public function __construct() {
        $this->semestres = new \Doctrine\Common\Collections\ArrayCollection();
        $this->cursos = new \Doctrine\Common\Collections\ArrayCollection();
        $this->comite_tutorial = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set programa
     *
     * @param string $programa
     * @return Programa
     */
    public function setPrograma($programa)
    {
        $this->programa = $programa;

        return $this;
    }

    /**
     * Get programa
     *
     * @return string 
     */
    public function getPrograma()
    {
        return $this->programa;
    }

    /**
     * Set ingreso
     *
     * @param string $ingreso
     * @return Programa
     */
    public function setIngreso($ingreso)
    {
        $this->ingreso = $ingreso;

        return $this;
    }

    /**
     * Get ingreso
     *
     * @return string 
     */
    public function getIngreso()
    {
        return $this->ingreso;
    }

    /**
     * Set termino
     *
     * @param string $termino
     * @return Programa
     */
    public function setTermino($termino)
    {
        $this->termino = $termino;

        return $this;
    }

    /**
     * Get termino
     *
     * @return string 
     */
    public function getTermino()
    {
        return $this->termino;
    }

    /**
     * Set fechaGradoUMSNH
     *
     * @param \DateTime $fechaGradoUMSNH
     * @return Programa
     */
    public function setFechaGradoUMSNH($fechaGradoUMSNH)
    {
        $this->fechaGradoUMSNH = $fechaGradoUMSNH;

        return $this;
    }

    /**
     * Get fechaGradoUMSNH
     *
     * @return \DateTime 
     */
    public function getFechaGradoUMSNH()
    {
        return $this->fechaGradoUMSNH;
    }

    /**
     * Set fechaGradoUNAM
     *
     * @param \DateTime $fechaGradoUNAM
     * @return Programa
     */
    public function setFechaGradoUNAM($fechaGradoUNAM)
    {
        $this->fechaGradoUNAM = $fechaGradoUNAM;

        return $this;
    }

    /**
     * Get fechaGradoUNAM
     *
     * @return \DateTime 
     */
    public function getFechaGradoUNAM()
    {
        return $this->fechaGradoUNAM;
    }

    /**
     * @return \DateTime
     */
    public function getFechaCandidatura()
    {
        return $this->fechaCandidatura;
    }

    /**
     * @param \DateTime $fechaCandidatura
     */
    public function setFechaCandidatura($fechaCandidatura)
    {
        $this->fechaCandidatura = $fechaCandidatura;
    }

    /**
     * Set opcionTitulacion
     *
     * @param string $opcionTitulacion
     * @return Programa
     */
    public function setOpcionTitulacion($opcionTitulacion)
    {
        $this->opcionTitulacion = $opcionTitulacion;

        return $this;
    }

    /**
     * Get opcionTitulacion
     *
     * @return string 
     */
    public function getOpcionTitulacion()
    {
        return $this->opcionTitulacion;
    }

    /**
     * Set tituloTesis
     *
     * @param string $tituloTesis
     * @return Programa
     */
    public function setTituloTesis($tituloTesis)
    {
        $this->tituloTesis = $tituloTesis;

        return $this;
    }

    /**
     * Get tituloTesis
     *
     * @return string 
     */
    public function getTituloTesis()
    {
        return $this->tituloTesis;
    }

    /**
     * @return \DateTime
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * @param \DateTime $createdAt
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;
    }

    /**
     * @return \DateTime
     */
    public function getModifiedAt()
    {
        return $this->modifiedAt;
    }

    /**
     * @param \DateTime $modifiedAt
     */
    public function setModifiedAt($modifiedAt)
    {
        $this->modifiedAt = $modifiedAt;
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
     * @return mixed
     */
    public function getAlumno()
    {
        return $this->alumno;
    }

    /**
     * @param mixed $alumno
     */
    public function setAlumno($alumno)
    {
        $this->alumno = $alumno;
    }

    public function __toString() {
        return $this->getPrograma(). ' | ' .  $this->getAlumno() ;
    }
    /**
     * @return mixed
     */
    public function getSemestres()
    {
        return $this->semestres;
    }

    /**
     * @param Semestre $semestre
     */
    public function addSemestre(Semestre $semestre)
    {
        $semestre->addPrograma($this);
        $this->semestres[] = $semestre;
    }

    public function addCurso(Curso $curso)
    {
        $curso->addPrograma($this); // synchronously updating inverse side
        $this->cursos[] = $curso;
    }

    public function getCursos()
    {
        return $this->cursos;
    }

    /**
     * @return mixed
     */
    public function getTutor()
    {
        return $this->tutor;
    }

    /**
     * @param Academico $tutor
     */
    public function setTutor(Academico $tutor)
    {
        $this->tutor = $tutor;
    }

    /**
     * @return Academico
     */
    public function getComiteTutorial()
    {
        return $this->comite_tutorial;
    }

    /**
     * @param Academico $tutor
     */
    public function addComiteTutorial(Academico $tutor)
    {
        $tutor->addTutoria($this);
        $this->comite_tutorial[] = $tutor;
    }

    /**
     * @return mixed
     */
    public function getEstatusExamenesGenerales()
    {
        return $this->estatusExamenesGenerales;
    }

    /**
     * @param mixed $estatusExamenesGenerales
     */
    public function setEstatusExamenesGenerales($estatusExamenesGenerales)
    {
        $this->estatusExamenesGenerales = $estatusExamenesGenerales;
    }




}
