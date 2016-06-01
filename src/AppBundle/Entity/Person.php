<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Dunglas\ApiBundle\Annotation\Iri;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * A person (alive, dead, undead, or fictional).
 * 
 * @see http://schema.org/Person Documentation on Schema.org
 * 
 * @ORM\Entity
 * @Iri("http://schema.org/Person")
 */
class Person extends Thing
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
     * @var PostalAddress Physical address of the item.
     * 
     * @ORM\ManyToOne(targetEntity="PostalAddress")
     * @Iri("https://schema.org/address")
     */
    private $address;
    /**
     * @var string Email address.
     * 
     * @ORM\Column(nullable=true)
     * @Assert\Email
     * @Iri("https://schema.org/email")
     */
    private $email;

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
     * Sets address.
     * 
     * @param PostalAddress $address
     * 
     * @return $this
     */
    public function setAddress(PostalAddress $address = null)
    {
        $this->address = $address;

        return $this;
    }

    /**
     * Gets address.
     * 
     * @return PostalAddress
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * Sets email.
     * 
     * @param string $email
     * 
     * @return $this
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Gets email.
     * 
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }
}
