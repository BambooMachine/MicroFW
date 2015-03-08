<?php
namespace MicroFW\Controllers;

interface IController
{
    /**
     * @var $request IRequest
     * @var $args array
     * @return IResponse
     */
    public static function controller($request, $args);

    /**
     * @return array
     */
    public function getContext();

    /**
     * @return IResponse
     */
    public function GET();

    /**
     * @return IResponse
     */
    public function POST();
}
