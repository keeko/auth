<?php
namespace keeko\auth\action;

use keeko\framework\domain\payload\Found;
use keeko\framework\foundation\AbstractAction;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * Session Status
 * 
 * This code is automatically created. Modifications will probably be overwritten.
 */
class StatusAction extends AbstractAction {

	/**
	 * Automatically generated run method
	 * 
	 * @param Request $request
	 * @return Response
	 */
	public function run(Request $request) {
		$session = $this->getServiceContainer()->getAuthManager()->getSession();
		$payload = new Found(['model' => $session]);
		// note: $session must be not null for this action!
		return $this->responder->run($request, $payload);
	}
}
