<?php
namespace keeko\auth\responder;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use keeko\framework\foundation\AbstractPayloadResponder;
use Tobscure\JsonApi\Resource;
use Tobscure\JsonApi\Document;
use keeko\auth\serializer\AuthProfileSerializer;
use keeko\framework\domain\payload\Found;

/**
 * Automatically generated JsonResponder for Users Profile
 */
class ProfileReadJsonResponder extends AbstractPayloadResponder {

	/**
	 */
	protected function getPayloadMethods() {
		return [
			'keeko\framework\domain\payload\Found' => 'found'
		];
	}
	
	protected function found(Request $request, Found $payload) {
		$serializer = new AuthProfileSerializer();
		$resource = new Resource($payload->getModel(), $serializer);
		$document = new Document($resource);

		return new JsonResponse($document->toArray(), 200);
	}
}
