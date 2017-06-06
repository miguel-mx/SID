<?php

namespace AppBundle\Entity;

use Gedmo\Mapping\Annotation as Gedmo;
use Doctrine\ORM\Mapping as ORM;

/**
 * ExamenGeneral
 *
 * @ORM\Table(name="examen_general")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ExamenGeneralRepository")
 * @ORM\HasLifecycleCallbacks()
 */
class ExamenGeneral
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
     * @ORM\Column(name="nombre", type="string", length=80)
     */
    private $nombre;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha", type="datetime", nullable=true)
     */
    private $fecha;

    /**
     * @var string
     *
     * @ORM\Column(name="lugar", type="string", length=50, nullable=true)
     */
    private $lugar;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="hora", type="string", length=20, nullable=true)
     */
    private $hora;

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
     * Many ExamenesGenerales have One Semestre.
     * @ORM\ManyToOne(targetEntity="Semestre", inversedBy="examenesGenerales")
     * @ORM\JoinColumn(name="semestre_id", referencedColumnName="id")
     */
    private $semestre;

    /**
     * Many ExamenesGenerales have One Profesor.
     * @ORM\ManyToOne(targetEntity="Academico")
     * @ORM\JoinColumn(name="profesor_id", referencedColumnName="id", nullable=true)
     */
    private $coordinador;

    /**
     * Many ExamenesGenerales have Many Tutores.
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\Academico", inversedBy="examenGeneralComite")
     * @ORM\JoinTable(name="examenGeneral_comite")
     */
    private $comite;

    /** @ORM\OneToMany(targetEntity="AppBundle\Entity\EstatusExamenGeneral", mappedBy="examenGeneral") */
    protected $estatusExamenesGenerales;

    public function __construct() {

        $this->comite = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set nombre
     *
     * @param string $nombre
     *
     * @return ExamenGeneral
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;

        return $this;
    }

    /**
     * Get nombre
     *
     * @return string
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Set fecha
     *
     * @param \DateTime $fecha
     *
     * @return ExamenGeneral
     */
    public function setFecha($fecha)
    {
        $this->fecha = $fecha;

        return $this;
    }

    /**
     * Get fecha
     *
     * @return \DateTime
     */
    public function getFecha()
    {
        return $this->fecha;
    }

    /**
     * Set lugar
     *
     * @param string $lugar
     *
     * @return ExamenGeneral
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
     * Set hora
     *
     * @param string $hora
     *
     * @return ExamenGeneral
     */
    public function setHora($hora)
    {
        $this->hora = $hora;

        return $this;
    }

    /**
     * Get hora
     *
     * @return string
     */
    public function getHora()
    {
        return $this->hora;
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
     * @return ExamenGeneral
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
     * @return ExamenGeneral
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

    public function __toString() {
        return $this->getSemestre()->getSemestre(). ' | ' .  $this->nombre ;
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
    public function getCoordinador()
    {
        return $this->coordinador;
    }

    /**
     * @param Academico $coordinador
     */
    public function setCoordinador(Academico $coordinador)
    {
        $this->coordinador = $coordinador;
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

    /**
     * @return mixed
     */
    public function getComite()
    {
        return $this->comite;
    }

    /**
     * @param Academico $tutor
     */
    public function addComite($tutor)
    {
        $this->comite[] = $tutor;
    }

}

