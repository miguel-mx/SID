<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * EstatusExamenGeneral
 *
 * @ORM\Table(name="estatus_examen_general")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\EstatusExamenGeneralRepository")
 */
class EstatusExamenGeneral
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
     * @ORM\Column(name="estatus", type="string", length=40)
     */
    private $estatus;


    /**
     * Many ExamenGeneral have One EstatusExamenGeneral.
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\ExamenGeneral", inversedBy="estatusExamenesGenerales")
     * @ORM\JoinColumn(name="examenGeneral_id", referencedColumnName="id")
     */
    protected $examenGeneral;

    /**
     * Many Programa have One EstatusExamenGeneral.
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Programa", inversedBy="estatusExamenesGenerales")
     * @ORM\JoinColumn(name="programa_id", referencedColumnName="id")
     */
    protected $programa;


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
     * Set estatus
     *
     * @param string $estatus
     *
     * @return EstatusExamenGeneral
     */
    public function setEstatus($estatus)
    {
        $this->estatus = $estatus;

        return $this;
    }

    /**
     * Get estatus
     *
     * @return string
     */
    public function getEstatus()
    {
        return $this->estatus;
    }

    /**
     * @return mixed
     */
    public function getExamenGeneral()
    {
        return $this->examenGeneral;
    }

    /**
     * @param mixed $examenGeneral
     */
    public function setExamenGeneral($examenGeneral)
    {
        $this->examenGeneral = $examenGeneral;
    }

    /**
     * @return mixed
     */
    public function getPrograma()
    {
        return $this->programa;
    }

    /**
     * @param mixed $programa
     */
    public function setPrograma($programa)
    {
        $this->programa = $programa;
    }



}

