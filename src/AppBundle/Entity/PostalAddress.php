<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Dunglas\ApiBundle\Annotation\Iri;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * The mailing address.
 * 
 * @see http://schema.org/PostalAddress Documentation on Schema.org
 * 
 * @ORM\Entity
 * @Iri("http://schema.org/PostalAddress")
 */
class PostalAddress extends ContactPoint
{
    /**
     * @var int
     * 
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;
    /**
     * @var string The country. For example, USA. You can also provide the two-letter [ISO 3166-1 alpha-2 country code](http://en.wikipedia.org/wiki/ISO_3166-1).
     * 
     * @ORM\Column(nullable=true)
     * @Assert\Type(type="string")
     * @Iri("https://schema.org/addressCountry")
     */
    private $addressCountry;
    /**
     * @var string The locality. For example, Mountain View.
     * 
     * @ORM\Column(nullable=true)
     * @Assert\Type(type="string")
     * @Iri("https://schema.org/addressLocality")
     */
    private $addressLocality;

    /**
     * Sets id.
     * 
     * @param int $id
     * 
     * @return $this
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Gets id.
     * 
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Sets addressCountry.
     * 
     * @param string $addressCountry
     * 
     * @return $this
     */
    public function setAddressCountry($addressCountry)
    {
        $this->addressCountry = $addressCountry;

        return $this;
    }

    /**
     * Gets addressCountry.
     * 
     * @return string
     */
    public function getAddressCountry()
    {
        return $this->addressCountry;
    }

    /**
     * Sets addressLocality.
     * 
     * @param string $addressLocality
     * 
     * @return $this
     */
    public function setAddressLocality($addressLocality)
    {
        $this->addressLocality = $addressLocality;

        return $this;
    }

    /**
     * Gets addressLocality.
     * 
     * @return string
     */
    public function getAddressLocality()
    {
        return $this->addressLocality;
    }
}
