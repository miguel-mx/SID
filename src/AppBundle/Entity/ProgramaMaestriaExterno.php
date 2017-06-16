<?php

namespace AppBundle\Entity;

use Gedmo\Mapping\Annotation as Gedmo;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * ProgramaMaestriaExterno
 *
 * @ORM\Table(name="programa_maestria_externo")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ProgramaMaestriaExternoRepository")
 * @ORM\HasLifecycleCallbacks()
 */
class ProgramaMaestriaExterno
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
     * @ORM\Column(name="escuelaProcedencia", type="string", length=60)
     */
    private $escuelaProcedencia;

    /**
     * @var string
     *
     * @ORM\Column(name="pais", type="string", length=30)
     */
    private $pais;

    /**
     * @var string
     *
     * @ORM\Column(name="ciudad", type="string", length=30)
     */
    private $ciudad;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fechaGrado", type="date", nullable=true)
     */
    private $fechaGrado;

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
     * One ProgramaMaestriaExterno has One Alumno.
     * @ORM\OneToOne(targetEntity="AppBundle\Entity\Alumno", inversedBy="programaMaestriaExterno")
     * @ORM\JoinColumn(name="alumno_id", referencedColumnName="id")
     */
    private $alumno;


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
     * Set escuelaProcedencia
     *
     * @param string $escuelaProcedencia
     *
     * @return ProgramaMaestriaExterno
     */
    public function setEscuelaProcedencia($escuelaProcedencia)
    {
        $this->escuelaProcedencia = $escuelaProcedencia;

        return $this;
    }

    /**
     * Get escuelaProcedencia
     *
     * @return string
     */
    public function getEscuelaProcedencia()
    {
        return $this->escuelaProcedencia;
    }

    /**
     * Set pais
     *
     * @param string $pais
     *
     * @return ProgramaMaestriaExterno
     */
    public function setPais($pais)
    {
        $this->pais = $pais;

        return $this;
    }

    /**
     * Get pais
     *
     * @return string
     */
    public function getPais()
    {
        return $this->pais;
    }

    /**
     * Set ciudad
     *
     * @param string $ciudad
     *
     * @return ProgramaMaestriaExterno
     */
    public function setCiudad($ciudad)
    {
        $this->ciudad = $ciudad;

        return $this;
    }

    /**
     * Get ciudad
     *
     * @return string
     */
    public function getCiudad()
    {
        return $this->ciudad;
    }

    /**
     * @return \DateTime
     */
    public function getFechaGrado()
    {
        return $this->fechaGrado;
    }

    /**
     * @param \DateTime $fechaGrado
     */
    public function setFechaGrado($fechaGrado)
    {
        $this->fechaGrado = $fechaGrado;
    }

    /**
     * @return string
     */
    public function getOpcionTitulacion()
    {
        return $this->opcionTitulacion;
    }

    /**
     * @param string $opcionTitulacion
     */
    public function setOpcionTitulacion($opcionTitulacion)
    {
        $this->opcionTitulacion = $opcionTitulacion;
    }

    /**
     * @return string
     */
    public function getTituloTesis()
    {
        return $this->tituloTesis;
    }

    /**
     * @param string $tituloTesis
     */
    public function setTituloTesis($tituloTesis)
    {
        $this->tituloTesis = $tituloTesis;
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


}

