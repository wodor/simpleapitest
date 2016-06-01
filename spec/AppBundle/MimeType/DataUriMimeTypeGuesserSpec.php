<?php

namespace spec\AppBundle\MimeType;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Symfony\Component\Serializer\Exception\UnexpectedValueException;

class DataUriMimeTypeGuesserSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('AppBundle\MimeType\DataUriMimeTypeGuesser');
        $this->shouldImplement('Symfony\Component\HttpFoundation\File\MimeType\MimeTypeGuesserInterface');
    }


    function it_figures_out_mime_type_from_data()
    {
        $data = "data:image/gif;base64,R0lGODdhAQABAIAAAP///////ywAAAAAAQABAAACAkQBADs=";
        $this->guess($data)->shouldReturn('image/gif');
    }

    function it_throws_exception_when_data_is_malformed()
    {
        $data = 'foobar';
        $this->shouldThrow(UnexpectedValueException::class)->duringGuess($data);
    }
}
