<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Dunglas\ApiBundle\Annotation\Iri;

/**
 * The most generic type of item.
 * 
 * @see http://schema.org/Thing Documentation on Schema.org
 * 
 * @ORM\MappedSuperclass
 * @Iri("http://schema.org/Thing")
 */
abstract class Thing
{
}
