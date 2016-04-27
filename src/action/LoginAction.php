<?php
namespace keeko\auth\action;

use Flow\JSONPath\JSONPath;
use keeko\auth\domain\SessionDomain;
use keeko\framework\foundation\AbstractAction;
use phootwork\json\Json;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * Login
 */
class LoginAction extends AbstractAction {
	
	/**
	 * Automatically generated method, will be overridden
	 *
	 * @param Request $request      	
	 * @return Response
	 */
	public function run(Request $request) {
		$json = Json::decode($request->getContent());
		$path = new JSONPath($json);
		$login = $path->find('$.data.attributes.login')->first();
		$password = $path->find('$.data.attributes.password')->first();

		$domain = new SessionDomain($this->getServiceContainer());
		$payload = $domain->login(
			$login, 
			$password
		);
		return $this->responder->run($request, $payload);
	}
}
