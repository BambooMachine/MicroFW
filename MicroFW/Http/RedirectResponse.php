<?php
namespace MicroFW\Http;

use MicroFW\Http\BaseResponse;

class RedirectResponse extends BaseResponse
{
    const PERMANENT_REDIRECT_CODE = 301;
    const TEMPORARY_REDIRECT_CODE = 302;

    public function __construct($location, $permanent = false)
    {
        if ($permanent === true) {
            $this->setStatusCode(self::PERMANENT_REDIRECT_CODE);
        } else {
            $this->setStatusCode(self::TEMPORARY_REDIRECT_CODE);
        }

        $this->setContentType('text/html');
        $this->setHeader('Location', $location);
    }
}
