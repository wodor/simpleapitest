<?php
namespace AppBundle\MimeType;

use Symfony\Component\HttpFoundation\File\MimeType\MimeTypeGuesserInterface;
use Symfony\Component\Serializer\Exception\UnexpectedValueException;

class DataUriMimeTypeGuesser implements MimeTypeGuesserInterface
{

    /**
     * Guesses the mime type of the file with the given path.
     *
     * @param string $path The path to the file
     *
     * @return string The mime type or NULL, if none could be guessed
     *
     * @throws \Symfony\Component\HttpFoundation\File\Exception\FileNotFoundException If the file does not exist
     * @throws \Symfony\Component\HttpFoundation\File\Exception\AccessDeniedException If the file could not be read
     */
    public function guess($path)
    {
        if (!preg_match('/^data:([a-z0-9]+\/[a-z0-9]+(;[a-z0-9\-]+\=[a-z0-9\-]+)?)?(;base64)?,[a-z0-9\!\$\&\\\'\,\(\)\*\+\,\;\=\-\.\_\~\:\@\/\?\%\s]*\s*$/i', $path)) {
            throw new UnexpectedValueException('The provided "data:" URI is not valid. ');
        }

        preg_match('/^data:([a-z0-9]+\/[a-z0-9]+(;[a-z0-9\-]+\=[a-z0-9\-]+)?)?/', $path, $matches);
        return $matches[1];
    }
}