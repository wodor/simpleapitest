<?php

namespace AppBundle;

use AppBundle\MimeType\DataUriMimeTypeGuesser;
use AppBundle\Serializer\DataUriNormalizer;
use Symfony\Component\HttpFoundation\File\MimeType\MimeTypeGuesser;
use Symfony\Component\HttpKernel\Bundle\Bundle;

class AppBundle extends Bundle
{
    public function __construct()
    {
        MimeTypeGuesser::getInstance()->register(new DataUriMimeTypeGuesser());
    }

}
