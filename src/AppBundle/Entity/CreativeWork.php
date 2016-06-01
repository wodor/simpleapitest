<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Dunglas\ApiBundle\Annotation\Iri;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * The most generic kind of creative work, including books, movies, photographs, software programs, etc.
 * 
 * @see http://schema.org/CreativeWork Documentation on Schema.org
 * 
 * @ORM\MappedSuperclass
 * @Iri("http://schema.org/CreativeWork")
 */
abstract class CreativeWork extends Thing
{
    /**
     * @var \DateTime The date on which the CreativeWork was most recently modified.
     * 
     * @ORM\Column(type="datetime", nullable=true)
     * @Assert\DateTime
     * @Iri("https://schema.org/dateModified")
     */
    private $dateModified;

    /**
     * Sets dateModified.
     * 
     * @param \DateTime $dateModified
     * 
     * @return $this
     */
    public function setDateModified(\DateTime $dateModified = null)
    {
        $this->dateModified = $dateModified;

        return $this;
    }

    /**
     * Gets dateModified.
     * 
     * @return \DateTime
     */
    public function getDateModified()
    {
        return $this->dateModified;
    }
}
