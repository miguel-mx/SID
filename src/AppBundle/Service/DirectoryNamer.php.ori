<?php
namespace AppBundle\Service;

use Vich\UploaderBundle\Naming\DirectoryNamerInterface;
use Vich\UploaderBundle\Mapping\PropertyMapping;
use AppBundle\Entity\Alumno;


class DirectoryNamer implements DirectoryNamerInterface
{
    /**
     * @param Alumno $alumno
     * @param PropertyMapping $mapping
     *
     * @return string
     */
    public function directoryName($alumno, PropertyMapping $mapping)
    {
        $userSlug = $alumno->getSlug()->toString();

        return $userSlug.'/';
    }
}