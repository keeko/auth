<?php
namespace keeko\auth\action;

use keeko\core\action\AbstractAction;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use keeko\core\exceptions\InvalidCredentialsException;

/**
 * Login
 */
class LoginAction extends AbstractAction
{
	protected function setDefaultParams(OptionsResolverInterface $resolver) {
		$resolver->setRequired(['username', 'password']);
	}

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
    		$auth = $authManager->getAuth();
    		$this->response->setData([
    			'token' => $auth->getToken() 
    		]);
    	} else {
    		throw new InvalidCredentialsException();
    	}
    	
        return $this->response->run($request);
    }
}
