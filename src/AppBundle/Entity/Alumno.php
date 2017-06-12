<?php

namespace AppBundle\Entity;

use Gedmo\Mapping\Annotation as Gedmo;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Vich\UploaderBundle\Mapping\Annotation as Vich;
use Symfony\Component\HttpFoundation\File\File;
use Doctrine\Common\Collections\ArrayCollection;


/**
 * Alumno
 *
 * @ORM\Table(name="alumno")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\AlumnoRepository")
 * @ORM\HasLifecycleCallbacks()
 * @Vich\Uploadable
 *
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
     * @ORM\Column(name="materno", type="string", length=60, nullable=true)
     * @Assert\NotBlank()
     *
     */
    private $materno;

    /**
     * @var string
     *
     * @ORM\Column(name="nombre", type="string", length=60)
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
     * @ORM\Column(name="correo_institucional", type="string", length=40, nullable=true)
     */
    private $correo_institucional;

    /**
     * @var string
     *
     * @ORM\Column(name="correo_personal", type="string", length=40, nullable=true)
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
     * @ORM\Column(name="estado", type="string", length=60, nullable=true)
     */
    private $estado;

    /**
     * @var string
     *
     * @ORM\Column(name="genero", type="string", length=60)
     */
    private $genero;

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
     * @ORM\Column(name="comentarios", type="text", nullable=true)
     */
    private $comentarios;

    /**
     * @var string
     *
     * @ORM\Column(name="condicionado", type="boolean", nullable=true)
     */
    private $condicionado;

    /**
     * @var string
     *
     * @ORM\Column(name="estatus", type="string", length=25, nullable=true)
     */
    private $estatus;

    /**
     * @Vich\UploadableField(mapping="alumno_documento", fileNameProperty="tesisLicenciaturaName")
     *
     * @Assert\File(
     *     maxSize = "2048k",
     *     mimeTypes = {"application/pdf", "application/x-pdf"},
     *     mimeTypesMessage = "Favor de subir el archivo en formato PDF"
     * )
     *
     * @var File
     */
    private $tesisLicenciaturaFile;

    /**
     * @ORM\Column(type="string", length=255)
     *
     * @var string
     */
    private $tesisLicenciaturaName;

    /**
     * @Vich\UploadableField(mapping="curriculum_documento", fileNameProperty="curriculumName")
     *
     * @Assert\File(
     *     maxSize = "2048k",
     *     mimeTypes = {"application/pdf", "application/x-pdf"},
     *     mimeTypesMessage = "Favor de subir el archivo en formato PDF"
     * )
     *
     * @var File
     */
    private $curriculumFile;

    /**
     * @ORM\Column(type="string", length=255)
     *
     * @var string
     */
    private $curriculumName;

    /**
     * @Vich\UploadableField(mapping="foto_documento", fileNameProperty="fotoName")
     *
     * @Assert\File(
     *     maxSize = "2048k",
     *     mimeTypes={"image/png", "image/jpeg", "image/pjpeg"},
     *     mimeTypesMessage = "Favor de subir el archivo en formato PNG, JPEG o PJPEG"
     * )
     *
     * @var File
     */
    private $fotoFile;

    /**
     * @ORM\Column(type="string", length=255)
     *
     * @var string
     */
    private $fotoName;

    /**
     * @Vich\UploadableField(mapping="cedula_documento", fileNameProperty="cedulaName")
     *
     * @Assert\File(
     *     maxSize = "2048k",
     *     mimeTypes = {"application/pdf", "application/x-pdf"},
     *     mimeTypesMessage = "Favor de subir el archivo en formato PNG, JPEG o PJPEG"
     * )
     *
     * @var File
     */
    private $cedulaFile;

    /**
     * @ORM\Column(type="string", length=255)
     *
     * @var string
     */
    private $cedulaName;

    /**
     * One Alumno has Many Programas.
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Programa", mappedBy="alumno")
     */
    private $programas;


    /**
     * One Alumno has One ProgramaMaestriaExterno.
     * @ORM\OneToOne(targetEntity="AppBundle\Entity\ProgramaMaestriaExterno", mappedBy="alumno")
     */
    private $programaMaestriaExterno;


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
        $this->programas = new ArrayCollection();
        $this->programaMaestriaExterno = new ArrayCollection();
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
     * @return string
     */
    public function getEstado()
    {
        return $this->estado;
    }

    /**
     * @param string $estado
     */
    public function setEstado($estado)
    {
        $this->estado = $estado;
    }

    /**
     * @return string
     */
    public function getGenero()
    {
        return $this->genero;
    }

    /**
     * @param string $genero
     */
    public function setGenero($genero)
    {
        $this->genero = $genero;
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
     * @return string
     */
    public function getEstatus()
    {
        return $this->estatus;
    }

    /**
     * @param string $estatus
     */
    public function setEstatus($estatus)
    {
        $this->estatus = $estatus;
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


    /**
     * Add programas
     *
     * @param \AppBundle\Entity\Programa $programas
     * @return Alumno
     */
    public function addPrograma(\AppBundle\Entity\Programa $programas)
    {
        $this->programas[] = $programas;

        return $this;
    }

    /**
     * Remove programas
     *
     * @param \AppBundle\Entity\Programa $programas
     */
    public function removePrograma(\AppBundle\Entity\Programa $programas)
    {
        $this->programas->removeElement($programas);
    }

   /**
    * Programa actual del alumno
    *
    * @return string
    */
    public function programaActual()
    {
        // Recorrer los programas y revisar en cual está inscrito

    }

    /**
     * @return File|null
     */
    public function getTesisLicenciaturaFile()
    {
        return $this->tesisLicenciaturaFile;
    }

    /**
     *
     * @param File|\Symfony\Component\HttpFoundation\File\UploadedFile $file
     *
     * @return Alumno
     */
    public function setTesisLicenciaturaFile(File $file = null)
    {
        $this->tesisLicenciaturaFile = $file;

        if ($file) {
            // It is required that at least one field changes if you are using doctrine
            // otherwise the event listeners won't be called and the file is lost
            $this->modifiedAt = new \DateTime();
        }

        return $this;
    }

    /**
     * @return string|null
     */
    public function getTesisLicenciaturaName()
    {
        return $this->tesisLicenciaturaName;
    }

    /**
     * @param string $tesisLicenciaturaName
     * @return Alumno
     */
    public function setTesisLicenciaturaName($tesisLicenciaturaName)
    {
        $this->tesisLicenciaturaName = $tesisLicenciaturaName;

        return $this;
    }

    /**
     * @return File|null
     */
    public function getCurriculumFile()
    {
        return $this->curriculumFile;
    }

    /**
     *
     * @param File|\Symfony\Component\HttpFoundation\File\UploadedFile $file
     * @return Alumno
     */
    public function setCurriculumFile(File $file = null)
    {
        $this->curriculumFile = $file;

        if ($file) {
            // It is required that at least one field changes if you are using doctrine
            // otherwise the event listeners won't be called and the file is lost
            $this->modifiedAt = new \DateTime();
        }

        return $this;
    }

    /**
     * @return string|null
     */
    public function getCurriculumName()
    {
        return $this->curriculumName;
    }

    /**
     * @param string $curriculumName
     * @return Alumno
     */
    public function setCurriculumName($curriculumName)
    {
        $this->curriculumName = $curriculumName;
    }

    /**
     * @return File|null
     */
    public function getFotoFile()
    {
        return $this->fotoFile;
    }

    /**
     *
     * @param File|\Symfony\Component\HttpFoundation\File\UploadedFile $file
     * @return Alumno
     */
    public function setFotoFile(File $file = null)
    {

        $this->fotoFile = $file;

        if ($file) {
            // It is required that at least one field changes if you are using doctrine
            // otherwise the event listeners won't be called and the file is lost
            $this->modifiedAt = new \DateTime();
        }

        return $this;
    }

    /**
     * @return string|null
     */
    public function getFotoName()
    {
        return $this->fotoName;
    }

    /**
     * @param string $fotoName
     * @return Alumno
     */
    public function setFotoName($fotoName)
    {
        $this->fotoName = $fotoName;
    }

    /**
     * @return File|null
     */
    public function getCedulaFile()
    {
        return $this->cedulaFile;
    }

    /**
     * @param File|\Symfony\Component\HttpFoundation\File\UploadedFile $file
     * @return Alumno
     */
    public function setCedulaFile(File $file = null)
    {

        $this->cedulaFile = $file;

        if ($file) {
            // It is required that at least one field changes if you are using doctrine
            // otherwise the event listeners won't be called and the file is lost
            $this->modifiedAt = new \DateTime();
        }

        return $this;
    }

    /**
     * @return string|null
     */
    public function getCedulaName()
    {
        return $this->cedulaName;
    }

    /**
     * @param string $cedulaName
     * @return Alumno
     */
    public function setCedulaName($cedulaName)
    {
        $this->cedulaName = $cedulaName;
    }

    /**
     * @return mixed
     */
    public function getProgramaMaestriaExterno()
    {
        return $this->programaMaestriaExterno;
    }

    /**
     * @param mixed $programaMaestriaExterno
     */
    public function setProgramaMaestriaExterno($programaMaestriaExterno)
    {
        $this->programaMaestriaExterno = $programaMaestriaExterno;
    }

    /**
     * Add programaMaestriaExterno
     *
     * @param \AppBundle\Entity\ProgramaMaestriaExterno $programaMaestriaExterno
     * @return Alumno
     */
    public function addProgramaMaestriaExterno(\AppBundle\Entity\ProgramaMaestriaExterno $programaMaestriaExterno)
    {
        $this->programaMaestriaExterno[] = $programaMaestriaExterno;

        return $this;
    }

    /**
     * Remove programaMaestriaExterno
     *
     * @param \AppBundle\Entity\ProgramaMaestriaExterno $programaMaestriaExterno
     */
    public function removeProgramaMaestriaExterno(\AppBundle\Entity\ProgramaMaestriaExterno $programaMaestriaExterno)
    {
        $this->programaMaestriaExterno->removeElement($programaMaestriaExterno);
    }

}
