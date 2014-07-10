<?php
namespace keeko\auth\action;

use keeko\core\action\AbstractAction;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * Logout
 */
class LogoutAction extends AbstractAction
{
    /**
     * Automatically generated method, will be overridden
     * 
     * @param Request $request
     * @return Response
     */
    public function run(Request $request)
    {
        return $this->response->run($request);
    }
}
