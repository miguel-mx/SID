<?php

namespace AppBundle\Entity;

use Gedmo\Mapping\Annotation as Gedmo;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Academico
 *
 * @ORM\Table(name="academico")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\AcademicoRepository")
 * @ORM\HasLifecycleCallbacks()
 */
class Academico
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
     * @ORM\Column(name="rfc", type="string", length=25)
     */
    private $rfc;

    /**
     * @var string
     *
     * @ORM\Column(name="curp", type="string", length=20)
     */
    private $curp;

    /**
     * @var string
     *
     * @ORM\Column(name="adscripcion", type="string", length=80)
     */
    private $adscripcion;

    /**
     * @var string
     *
     * @ORM\Column(name="correo", type="string", length=35)
     */
    private $correo;

    /**
     * @var string
     *
     * @ORM\Column(name="telefono", type="string", length=15)
     */
    private $telefono;

    /**
     * @var string
     *
     * @ORM\Column(name="extension", type="string", length=10)
     */
    private $extension;

    /**
     * @var string
     *
     * @ORM\Column(name="cvu", type="string", length=20, nullable=true)
     */
    private $cvu;

    /**
     * @var string
     *
     * @ORM\Column(name="acreditacion", type="string", length=40)
     */
    private $acreditacion;

    /**
     * @var string
     *
     * @ORM\Column(name="area_investigacion", type="string", length=500, nullable=true)
     */
    private $areaInvestigacion;

    /**
     * @var string
     *
     * @ORM\Column(name="resumen", type="text", nullable=true)
     */
    private $resumen;

    /**
     * @var string
     *
     * @ORM\Column(name="ubicacion", type="string", length=120, nullable=true)
     */
    private $ubicacion;

    /**
     * @var string
     *
     * @ORM\Column(name="pagina", type="string", length=90, nullable=true)
     */
    private $pagina;

    /**
    * Many Academicos have Many Tutorias.
    * @ORM\ManyToMany(targetEntity="Programa", mappedBy="comite_tutorial")
    */
    private $tutorias;

    /**
     * @var string
     * @Gedmo\Slug(fields={"paterno", "materno", "nombre"})
     * @ORM\Column(name="slug", type="string", length=60, unique=true)
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

    public function __construct() {
        $this->tutorias = new \Doctrine\Common\Collections\ArrayCollection();
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
     * @return Academico
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
     * @return Academico
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
     * @return Academico
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
     * Set rfc
     *
     * @param string $rfc
     * @return Academico
     */
    public function setRfc($rfc)
    {
        $this->rfc = $rfc;

        return $this;
    }

    /**
     * Get rfc
     *
     * @return string 
     */
    public function getRfc()
    {
        return $this->rfc;
    }

    /**
     * Set curp
     *
     * @param string $curp
     * @return Academico
     */
    public function setCurp($curp)
    {
        $this->curp = $curp;

        return $this;
    }

    /**
     * Get curp
     *
     * @return string 
     */
    public function getCurp()
    {
        return $this->curp;
    }

    /**
     * Set adscripcion
     *
     * @param string $adscripcion
     * @return Academico
     */
    public function setAdscripcion($adscripcion)
    {
        $this->adscripcion = $adscripcion;

        return $this;
    }

    /**
     * Get adscripcion
     *
     * @return string 
     */
    public function getAdscripcion()
    {
        return $this->adscripcion;
    }

    /**
     * Set correo
     *
     * @param string $correo
     * @return Academico
     */
    public function setCorreo($correo)
    {
        $this->correo = $correo;

        return $this;
    }

    /**
     * Get correo
     *
     * @return string 
     */
    public function getCorreo()
    {
        return $this->correo;
    }

    /**
     * Set telefono
     *
     * @param string $telefono
     * @return Academico
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
     * Set extension
     *
     * @param string $extension
     * @return Academico
     */
    public function setExtension($extension)
    {
        $this->extension = $extension;

        return $this;
    }

    /**
     * Get extension
     *
     * @return string 
     */
    public function getExtension()
    {
        return $this->extension;
    }

    /**
     * Set cvu
     *
     * @param string $cvu
     * @return Academico
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
     * Set acreditacion
     *
     * @param string $acreditacion
     * @return Academico
     */
    public function setAcreditacion($acreditacion)
    {
        $this->acreditacion = $acreditacion;

        return $this;
    }

    /**
     * Get acreditacion
     *
     * @return string 
     */
    public function getAcreditacion()
    {
        return $this->acreditacion;
    }

    /**
     * @return string
     */
    public function getAreaInvestigacion()
    {
        return $this->areaInvestigacion;
    }

    /**
     * @param string $areaInvestigacion
     */
    public function setAreaInvestigacion($areaInvestigacion)
    {
        $this->areaInvestigacion = $areaInvestigacion;
    }

    /**
     * @return string
     */
    public function getResumen()
    {
        return $this->resumen;
    }

    /**
     * @param string $resumen
     */
    public function setResumen($resumen)
    {
        $this->resumen = $resumen;
    }

    /**
     * @return string
     */
    public function getUbicacion()
    {
        return $this->ubicacion;
    }

    /**
     * @param string $ubicacion
     */
    public function setUbicacion($ubicacion)
    {
        $this->ubicacion = $ubicacion;
    }

    /**
     * @return string
     */
    public function getPagina()
    {
        return $this->pagina;
    }

    /**
     * @param string $pagina
     */
    public function setPagina($pagina)
    {
        $this->pagina = $pagina;
    }

    /**
     * Set slug
     *
     * @param string $slug
     * @return Academico
     */
    public function setSlug($slug)
    {
        $this->slug = $slug;

        return $this;
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
     * @return Academico
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
     * @return Academico
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
        return $this->paterno . " " . $this->materno . " " . $this->nombre;
    }

    /**
     * @return mixed
     */
    public function getTutorias()
    {
        return $this->tutorias;
    }

    /**
     * @param Academico $tutor
     */
    public function addTutoria($tutor)
    {
        $this->tutorias[] = $tutor;
    }
}
