<?php
use Dunglas\ApiBundle\Controller\ResourceController;
use Symfony\Component\HttpFoundation\Request;

/**
 * Created by PhpStorm.
 * User: wodor
 * Date: 26/05/2016
 * Time: 17:54
 */
class UserController extends ResourceController
{
    // Customize the AppBundle:Custom:custom action
    public function getAction(Request $request, $id)
    {
        $this->get('logger')->info('This is my custom controller.');

        return parent::getAction($request, $id);
    }
}
