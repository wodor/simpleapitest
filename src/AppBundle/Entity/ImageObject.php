<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Dunglas\ApiBundle\Annotation\Iri;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\Validator\Constraints as Assert;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

/**
 * An image file.
 * 
 * @see http://schema.org/ImageObject Documentation on Schema.org
 * 
 * @ORM\Entity
 * @Vich\Uploadable
 * @Iri("http://schema.org/ImageObject")
 */
class ImageObject extends MediaObject
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
     * @var string
     * 
     * @ORM\Column
     * @Assert\Type(type="string")
     * @Assert\NotNull
     */
    private $imageName;

    /**
     * @var string
     * 
     * @Vich\UploadableField(mapping="user_image", fileNameProperty="imageName")
     */
    private $imageFile;

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
     * Sets imageName.
     * 
     * @param string $imageName
     * 
     * @return $this
     */
    public function setImageName($imageName)
    {
        $this->imageName = $imageName;

        return $this;
    }

    /**
     * Gets imageName.
     * 
     * @return string
     */
    public function getImageName()
    {
        return $this->imageName;
    }

    /**
     * @param File|null $image
     * @return $this
     */
    public function setImageFile(File $image = null)
    {
        $this->imageFile = $image;

        if ($image) {
            // It is required that at least one field changes if you are using doctrine
            // otherwise the event listeners won't be called and the file is lost
            $this->updatedAt = new \DateTime('now');
        }

        return $this;
    }


    /**
     * Gets imageFile.
     * 
     * @return string
     */
    public function getImageFile()
    {
        return $this->imageFile;
    }
}
