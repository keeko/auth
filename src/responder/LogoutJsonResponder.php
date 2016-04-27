<?php
namespace keeko\auth\responder;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use keeko\framework\foundation\AbstractPayloadResponder;
use keeko\framework\domain\payload\Success;
use keeko\framework\domain\payload\Failed;

/**
 * Automatically generated JsonResponder for Logout
 */
class LogoutJsonResponder extends AbstractPayloadResponder {

	/**
	 */
	protected function getPayloadMethods() {
		return [
			'keeko\framework\domain\payload\Success' => 'success',
			'keeko\framework\domain\payload\Failed' => 'failed'
		];
	}
	
	protected function success(Request $request, Success $payload) {
		return new JsonResponse(null, 204);
	}
	
	protected function failed(Request $request, Failed $payload) {
		throw new \Exception('Something gone wrong');
	}
}
