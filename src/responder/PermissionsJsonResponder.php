<?php
namespace keeko\auth\responder;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use keeko\framework\foundation\AbstractPayloadResponder;
use keeko\framework\domain\payload\Found;
use keeko\auth\serializer\PermissionsSerializer;
use Tobscure\JsonApi\Resource;
use Tobscure\JsonApi\Document;

/**
 * Automatically generated JsonResponder for User Permissions
 */
class PermissionsJsonResponder extends AbstractPayloadResponder {

	/**
	 */
	protected function getPayloadMethods() {
		return [
			'keeko\framework\domain\payload\Found' => 'found'
		];
	}
	
	protected function found(Request $request, Found $payload) {
		$serializer = new PermissionsSerializer();
		$resource = new Resource($payload->get('permissions'), $serializer);
		$document = new Document($resource);
		
		return new JsonResponse($document->toArray(), 200);
	}
}
