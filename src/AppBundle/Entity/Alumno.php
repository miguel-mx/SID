<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Gedmo\Mapping\Annotation as Gedmo;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Alumno
 *
 * @ORM\Table(name="alumno")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\AlumnoRepository")
 * @ORM\HasLifecycleCallbacks()
 */
class Alumno
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
     * @Assert\NotBlank()
     *
     */
    private $paterno;

    /**
     * @var string
     *
     * @ORM\Column(name="materno", type="string", length=60)
     * @Assert\NotBlank()
     *
     */
    private $materno;

    /**
     * @var string
     *
     * @ORM\Column(name="nombre", type="string", length=60, nullable=true)
     * @Assert\NotBlank()
     *
     */
    private $nombre;

    /**
     * @var string
     *
     * @ORM\Column(name="telefono", type="string", length=15)
     */
    private $telefono;

    /**
     * @var string
     *
     * @ORM\Column(name="correo_institucional", type="string", length=30, nullable=true)
     */
    private $correo_institucional;

    /**
     * @var string
     *
     * @ORM\Column(name="correo_personal", type="string", length=30, nullable=true)
     */
    private $correo_personal;

    /**
     * @var string
     *
     * @ORM\Column(name="escuela_procedencia", type="string", length=60)
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
     * @ORM\Column(name="numero_cuenta", type="string", length=20)
     */
    private $numeroCuenta;

    /**
     * @var string
     *
     * @ORM\Column(name="cvu", type="string", length=20)
     */
    private $cvu;

    /**
     * @var string
     *
     * @ORM\Column(name="condicionado", type="boolean", nullable=true)
     */
    private $condicionado;

    /**
     * Many Alumnos have Many Cursos.
     * @ORM\ManyToMany(targetEntity="Curso", inversedBy="alumnos")
     * @ORM\JoinTable(name="alumnos_cursos")
     */
    private $cursos;

    /**
     * One Alumno has Many Programas.
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Programa", mappedBy="alumno")
     */
    private $programas;

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
     * Constructor de la clase
     */
    public function __construct()
    {
        $this->cursos = new \Doctrine\Common\Collections\ArrayCollection();
        $this->programas = new ArrayCollection();
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
     * Set paterno
     *
     * @param string $paterno
     * @return Alumno
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
     * @return Alumno
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
     * @return Alumno
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
     * @return Alumno
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
     * Set correo_institucional
     *
     * @param string $correo_institucional
     * @return Alumno
     */
    public function setCorreoInstitucional($correo_institucional)
    {
        $this->correo_institucional = $correo_institucional;

        return $this;
    }

    /**
     * Get correo_institucional
     *
     * @return string
     */
    public function getCorreoInstitucional()
    {
        return $this->correo_institucional;
    }

    /**
     * @param string $correo_personal
     */
    public function setCorreoPersonal($correo_personal)
    {
        $this->correo_personal = $correo_personal;
    }

    /**
     * @return string
     */
    public function getCorreoPersonal()
    {
        return $this->correo_personal;
    }


    /**
     * Set escuelaProcedencia
     *
     * @param string $escuelaProcedencia
     * @return Alumno
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
     * @return Alumno
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
     * Set numeroCuenta
     *
     * @param string $numeroCuenta
     * @return Alumno
     */
    public function setNumeroCuenta($numeroCuenta)
    {
        $this->numeroCuenta = $numeroCuenta;

        return $this;
    }

    /**
     * Get numeroCuenta
     *
     * @return string
     */
    public function getNumeroCuenta()
    {
        return $this->numeroCuenta;
    }

    /**
     * Set cvu
     *
     * @param string $cvu
     * @return Alumno
     */
    public function setCvu($cvu)
    {
        $this->cvu = $cvu;

        return $this;
    }

    /**
     * Get cvu
     *
     * @return string
     */
    public function getCvu()
    {
        return $this->cvu;
    }

    /**
     * @return mixed
     */
    public function getCondicionado()
    {
        return $this->condicionado;
    }

    /**
     * @param mixed $condicionado
     */
    public function setCondicionado($condicionado)
    {
        $this->condicionado = $condicionado;
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
     * @return Alumno
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
     * @return Alumno
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

    public function addCurso(Curso $curso)
    {
        $curso->addAlumno($this); // synchronously updating inverse side
        $this->cursos[] = $curso;
    }

    public function getCursos()
    {
        return $this->cursos;
    }

    public function __toString() {
        return $this->slug;
    }

    /**
     * @return mixed
     */
    public function getProgramas()
    {
        return $this->programas;
    }

    /**
     * @param mixed $programas
     */
    public function setProgramas($programas)
    {
        $this->programas = $programas;
    }
}
