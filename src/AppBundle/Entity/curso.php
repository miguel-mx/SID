<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * curso
 *
 * @ORM\Table(name="curso")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\cursoRepository")
 */
class curso
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
     * @ORM\Column(name="tema", type="string", length=60)
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
     * @return curso
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
     * @return curso
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
     * @return curso
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
     * @return curso
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
     * @return curso
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
     * @return curso
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
     * @return curso
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
     * @return curso
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
}
