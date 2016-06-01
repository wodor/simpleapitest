<?php

namespace AppBundle\Normalizer;

use AppBundle\Entity\ImageObject;
use AppBundle\Serializer\DataUriNormalizer;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\Serializer\Exception\InvalidArgumentException;
use Symfony\Component\Serializer\Exception\UnexpectedValueException;
use Symfony\Component\Serializer\Normalizer\AbstractNormalizer;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;
use Symfony\Component\Serializer\Normalizer\SerializerAwareNormalizer;

class ImageObjectNormalizer extends SerializerAwareNormalizer implements NormalizerInterface, DenormalizerInterface
{

    /**
     * @var DataUriNormalizer
     */
    private $dataUriNormalizer;

    /**
     * @var AbstractNormalizer
     */
    private $normalizer;

    public function __construct(DataUriNormalizer $dataUriNormalizer, AbstractNormalizer $normalizer)
    {
        $this->dataUriNormalizer = $dataUriNormalizer;
        $this->normalizer = $normalizer;
    }

    /**
     * {@inheritdoc}
     */
    public function supportsDenormalization($data, $type, $format = null)
    {
        return $type === ImageObject::class;
    }


    /**
     * Denormalizes data back into an object of the given class.
     *
     * @param mixed $data data to restore
     * @param string $class the expected class to instantiate
     * @param string $format format the given data was extracted from
     * @param array $context options available to the denormalizer
     *
     * @return object
     */
    public function denormalize($data, $class, $format = null, array $context = array())
    {
        $data['imageFile'] = $this->denormalizeDataUri($data['imageFile'], UploadedFile::class);
        return $this->normalizer->denormalize($data, ImageObject::class, $format, $context);
    }

    public function denormalizeDataUri($data, $class)
    {
        if (!preg_match('/^data:([a-z0-9]+\/[a-z0-9]+(;[a-z0-9\-]+\=[a-z0-9\-]+)?)?(;base64)?,[a-z0-9\!\$\&\\\'\,\(\)\*\+\,\;\=\-\.\_\~\:\@\/\?\%\s]*\s*$/i', $data)) {
            throw new UnexpectedValueException('The provided "data:" URI is not valid.');
        }

        try {
            switch ($class) {
                case UploadedFile::class:
                    return new UploadedFile($data, md5($data));

                case File::class:
                    return new File($data, false);

                case 'SplFileObject':
                case 'SplFileInfo':
                    return new \SplFileObject($data);
            }
        } catch (\RuntimeException $exception) {
            throw new UnexpectedValueException($exception->getMessage(), $exception->getCode(), $exception);
        }

        throw new InvalidArgumentException(sprintf('The class parameter "%s" is not supported. It must be one of "SplFileInfo", "SplFileObject" or "Symfony\Component\HttpFoundation\File\File".', $class));
    }


    /**
     * Normalizes an object into a set of arrays/scalars.
     *
     * @param object $object object to normalize
     * @param string $format format the normalization result will be encoded as
     * @param array $context Context options for the normalizer
     *
     * @return array|string|bool|int|float|null
     */
    public function normalize($object, $format = null, array $context = array())
    {
        // TODO: Implement normalize() method.
    }

    /**
     * Checks whether the given class is supported for normalization by this normalizer.
     *
     * @param mixed $data Data to normalize.
     * @param string $format The format being (de-)serialized from or into.
     *
     * @return bool
     */
    public function supportsNormalization($data, $format = null)
    {
        // TODO: Implement supportsNormalization() method.
    }
}