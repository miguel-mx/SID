<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Programa
 *
 * @ORM\Table(name="programa")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ProgramaRepository")
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
     * @var string
     *
     * @ORM\Column(name="opcionTitulacion", type="string", length=15, nullable=true)
     */
    private $opcionTitulacion;

    /**
     * @var string
     *
     * @ORM\Column(name="tituloTesis", type="string", length=80, nullable=true)
     */
    private $tituloTesis;

    /**
     * Many Programas have One Alumno.
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Alumno", inversedBy="programas")
     * @ORM\JoinColumn(name="alumno_id", referencedColumnName="id")
     */
    private $alumno;

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
