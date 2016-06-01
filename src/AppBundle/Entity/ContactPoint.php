<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Dunglas\ApiBundle\Annotation\Iri;

/**
 * A contact point—for example, a Customer Complaints department.
 * 
 * @see http://schema.org/ContactPoint Documentation on Schema.org
 * 
 * @ORM\MappedSuperclass
 * @Iri("http://schema.org/ContactPoint")
 */
abstract class ContactPoint extends StructuredValue
{
}
