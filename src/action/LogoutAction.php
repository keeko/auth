<?php
namespace keeko\auth\action;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use keeko\framework\foundation\AbstractAction;
use keeko\auth\domain\SessionDomain;

/**
 * Logout
 */
class LogoutAction extends AbstractAction {
	
	/**
	 * Automatically generated method, will be overridden
	 *
	 * @param Request $request
	 * @return Response
	 */
	public function run(Request $request) {
		$domain = new SessionDomain($this->getServiceContainer());
		$payload = $domain->logout();
		return $this->responder->run($request, $payload);
	}
}
