<?php
namespace keeko\auth\action;

use keeko\framework\foundation\AbstractAction;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use keeko\framework\domain\payload\Found;

/**
 * Users Profile
 * 
 * This code is automatically created. Modifications will probably be overwritten.
 */
class ProfileReadAction extends AbstractAction {

	/**
	 * Automatically generated run method
	 * 
	 * @param Request $request
	 * @return Response
	 */
	public function run(Request $request) {
		$user = $this->getServiceContainer()->getAuthManager()->getUser();
		$payload = new Found(['model' => $user]);
		// note: $session must be not null for this action!
		return $this->responder->run($request, $payload);
	}
}
