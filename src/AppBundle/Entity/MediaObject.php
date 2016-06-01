<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Dunglas\ApiBundle\Annotation\Iri;

/**
 * An image, video, or audio object embedded in a web page. Note that a creative work may have many media objects associated with it on the same web page. For example, a page about a single song (MusicRecording) may have a music video (VideoObject), and a high and low bandwidth audio stream (2 AudioObject's).
 * 
 * @see http://schema.org/MediaObject Documentation on Schema.org
 * 
 * @ORM\MappedSuperclass
 * @Iri("http://schema.org/MediaObject")
 */
abstract class MediaObject extends CreativeWork
{
}
