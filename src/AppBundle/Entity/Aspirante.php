<?php

namespace AppBundle\Entity;

use Gedmo\Mapping\Annotation as Gedmo;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Aspirante
 *
 * @ORM\Table(name="aspirante")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\AspiranteRepository")
 * @ORM\HasLifecycleCallbacks()
 */
class Aspirante
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
     * @ORM\Column(name="paterno", type="string", length=60)
     */
    private $paterno;

    /**
     * @var string
     *
     * @ORM\Column(name="materno", type="string", length=60, nullable=true)
     */
    private $materno;

    /**
     * @var string
     *
     * @ORM\Column(name="nombre", type="string", length=60)
     */
    private $nombre;

    /**
     * @var string
     *
     * @ORM\Column(name="telefono", type="string", length=15, nullable=true)
     */
    private $telefono;

    /**
     * @var string
     *
     * @ORM\Column(name="rfc", type="string", length=30, nullable=true)
     */
    private $rfc;

    /**
     * @var string
     *
     * @ORM\Column(name="correo_personal", type="string", length=40, nullable=true)
     */
    private $correoPersonal;

    /**
     * @var string
     *
     * @ORM\Column(name="pais", type="string", length=30)
     */
    private $pais;

    /**
     * @var string
     *
     * @ORM\Column(name="estado", type="string", length=60, nullable=true)
     */
    private $estado;

    /**
     * @var string
     *
     * @ORM\Column(name="genero", type="string", length=15)
     */
    private $genero;

    /**
     * @var string
     *
     * @ORM\Column(name="estatus", type="boolean", nullable=true)
     */
    private $estatus;

    /**
     * @var string
     *
     * @ORM\Column(name="curp", type="string", length=20, nullable=true)
     */
    private $curp;

    /**
     * @var string
     *
     * @ORM\Column(name="fecha_nacimiento", type="datetime")
     */
    private $fechaNacimiento;

    /**
     * @var string
     *
     * @ORM\Column(name="programa", type="string", length=15)
     */
    private $programa;

    /**
     * @var string
     *
     * @ORM\Column(name="carrera", type="string", length=60, nullable=true)
     */
    private $carrera;

    /**
     * @var string
     *
     * @ORM\Column(name="promedio", type="string", length=10, nullable=true)
     */
    private $promedio;

    /**
     * @var string
     *
     * @ORM\Column(name="fecha_inicio_estudios", type="datetime", nullable=true)
     */
    private $fechaInicioEstudios;

    /**
     * @var string
     *
     * @ORM\Column(name="fecha_termino_creditos", type="datetime", nullable=true)
     */
    private $fechaTerminoCreditos;

    /**
     * @var string
     *
     * @ORM\Column(name="fecha_titulacion", type="datetime", nullable=true)
     */
    private $fechaTitulacion;


    /**
     * @var string
     *
     * @ORM\Column(name="escuelaProcedencia", type="string", length=60)
     */
    private $escuelaProcedencia;

    /**
     * @Gedmo\Slug(fields={"paterno", "materno", "nombre"})
     * @ORM\Column(length=50, unique=true )
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
     * Many Aspirantes have One Semestre.
     * @ORM\ManyToOne(targetEntity="Semestre", inversedBy="aspirantes")
     * @ORM\JoinColumn(name="semestre_aspirante_id", referencedColumnName="id")
     */
    private $semestre;


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
     * Set paterno
     *
     * @param string $paterno
     *
     * @return Aspirante
     */
    public function setPaterno($paterno)
    {
        $this->paterno = $paterno;

        return $this;
    }

    /**
     * Get paterno
     *
     * @return string
     */
    public function getPaterno()
    {
        return $this->paterno;
    }

    /**
     * Set materno
     *
     * @param string $materno
     *
     * @return Aspirante
     */
    public function setMaterno($materno)
    {
        $this->materno = $materno;

        return $this;
    }

    /**
     * Get materno
     *
     * @return string
     */
    public function getMaterno()
    {
        return $this->materno;
    }

    /**
     * Set nombre
     *
     * @param string $nombre
     *
     * @return Aspirante
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
     * Set telefono
     *
     * @param string $telefono
     *
     * @return Aspirante
     */
    public function setTelefono($telefono)
    {
        $this->telefono = $telefono;

        return $this;
    }

    /**
     * Get telefono
     *
     * @return string
     */
    public function getTelefono()
    {
        return $this->telefono;
    }

    /**
     * @return string
     */
    public function getRfc()
    {
        return $this->rfc;
    }

    /**
     * @param string $rfc
     */
    public function setRfc($rfc)
    {
        $this->rfc = $rfc;
    }



    /**
     * Set correoPersonal
     *
     * @param string $correoPersonal
     *
     * @return Aspirante
     */
    public function setCorreoPersonal($correoPersonal)
    {
        $this->correoPersonal = $correoPersonal;

        return $this;
    }

    /**
     * Get correoPersonal
     *
     * @return string
     */
    public function getCorreoPersonal()
    {
        return $this->correoPersonal;
    }

    /**
     * Set escuelaProcedencia
     *
     * @param string $escuelaProcedencia
     *
     * @return Aspirante
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
     * @return Aspirante
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
     * Set estado
     *
     * @param string $estado
     *
     * @return Aspirante
     */
    public function setEstado($estado)
    {
        $this->estado = $estado;

        return $this;
    }

    /**
     * Get estado
     *
     * @return string
     */
    public function getEstado()
    {
        return $this->estado;
    }

    /**
     * Set genero
     *
     * @param string $genero
     *
     * @return Aspirante
     */
    public function setGenero($genero)
    {
        $this->genero = $genero;

        return $this;
    }

    /**
     * Get genero
     *
     * @return string
     */
    public function getGenero()
    {
        return $this->genero;
    }

    /**
     * Set estatus
     *
     * @param string $estatus
     *
     * @return Aspirante
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
     * @return string
     */
    public function getCurp()
    {
        return $this->curp;
    }

    /**
     * @param string $curp
     */
    public function setCurp($curp)
    {
        $this->curp = $curp;
    }

    /**
     * @return string
     */
    public function getFechaNacimiento()
    {
        return $this->fechaNacimiento;
    }

    /**
     * @param string $fechaNacimiento
     */
    public function setFechaNacimiento($fechaNacimiento)
    {
        $this->fechaNacimiento = $fechaNacimiento;
    }

    /**
     * @return string
     */
    public function getPrograma()
    {
        return $this->programa;
    }

    /**
     * @param string $programa
     */
    public function setPrograma($programa)
    {
        $this->programa = $programa;
    }

    /**
     * @return string
     */
    public function getCarrera()
    {
        return $this->carrera;
    }

    /**
     * @param string $carrera
     */
    public function setCarrera($carrera)
    {
        $this->carrera = $carrera;
    }

    /**
     * @return string
     */
    public function getPromedio()
    {
        return $this->promedio;
    }

    /**
     * @param string $promedio
     */
    public function setPromedio($promedio)
    {
        $this->promedio = $promedio;
    }

    /**
     * @return string
     */
    public function getFechaInicioEstudios()
    {
        return $this->fechaInicioEstudios;
    }

    /**
     * @param string $fechaInicioEstudios
     */
    public function setFechaInicioEstudios($fechaInicioEstudios)
    {
        $this->fechaInicioEstudios = $fechaInicioEstudios;
    }

    /**
     * @return string
     */
    public function getFechaTerminoCreditos()
    {
        return $this->fechaTerminoCreditos;
    }

    /**
     * @param string $fechaTerminoCreditos
     */
    public function setFechaTerminoCreditos($fechaTerminoCreditos)
    {
        $this->fechaTerminoCreditos = $fechaTerminoCreditos;
    }

    /**
     * @return mixed
     */
    public function getFechaTitulacion()
    {
        return $this->fechaTitulacion;
    }

    /**
     * @param mixed $fechaTitulacion
     */
    public function setFechaTitulacion($fechaTitulacion)
    {
        $this->fechaTitulacion = $fechaTitulacion;
    }

    /**
     * @return mixed
     */
    public function getSlug()
    {
        return $this->slug;
    }

    /**
     * @param mixed $slug
     */
    public function setSlug($slug)
    {
        $this->slug = $slug;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     *
     * @return Aspirante
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
     *
     * @return Aspirante
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

    public function __toString() {
        return $this->slug;
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


}

