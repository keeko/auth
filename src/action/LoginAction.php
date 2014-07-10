<?php
namespace keeko\auth\action;

use keeko\core\action\AbstractAction;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * Login
 */
class LoginAction extends AbstractAction
{
    /**
     * Automatically generated method, will be overridden
     * 
     * @param Request $request
     * @return Response
     */
    public function run(Request $request)
    {
    	$authManager = $this->getModule()->getApplication()->getAuthManager();
    	if ($authManager->login($this->getParam('username'), $this->getParam('password'))) {
    		
    	}
    	
        return $this->response->run($request);
    }
}
