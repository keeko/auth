<?php
namespace keeko\auth\responder;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use keeko\framework\foundation\AbstractPayloadResponder;
use keeko\framework\domain\payload\Found;
use keeko\auth\serializer\AuthSessionSerializer;
use Tobscure\JsonApi\Resource;
use Tobscure\JsonApi\Document;

/**
 * Automatically generated JsonResponder for Session Status
 */
class StatusJsonResponder extends AbstractPayloadResponder {

	/**
	 */
	protected function getPayloadMethods() {
		return [
			'keeko\framework\domain\payload\Found' => 'found'
		];
	}
	
	protected function found(Request $request, Found $payload) {
		$serializer = new AuthSessionSerializer();
		$resource = new Resource($payload->getModel(), $serializer);
		$document = new Document($resource);

		return new JsonResponse($document->toArray(), 200);
	}
}
