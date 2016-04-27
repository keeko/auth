<?php
namespace keeko\auth\responder;

use keeko\auth\serializer\AuthSessionSerializer;
use keeko\framework\domain\payload\Failed;
use keeko\framework\domain\payload\Success;
use keeko\framework\exceptions\InvalidCredentialsException;
use keeko\framework\foundation\AbstractPayloadResponder;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Tobscure\JsonApi\Document;
use Tobscure\JsonApi\Resource;

/**
 * Automatically generated JsonResponder for Login
 */
class LoginJsonResponder extends AbstractPayloadResponder {

	/**
	 */
	protected function getPayloadMethods() {
		return [
			'keeko\framework\domain\payload\Success' => 'success',
			'keeko\framework\domain\payload\Failed' => 'failed'
		];
	}
	
	protected function success(Request $request, Success $payload) {
		$serializer = new AuthSessionSerializer();
		$resource = new Resource($payload->get('session'), $serializer);
		$document = new Document($resource);
		
		return new JsonResponse($document->toArray(), 201);
	}
	
	protected function failed(Request $request, Failed $payload) {
		throw new InvalidCredentialsException();
	}
	
}
