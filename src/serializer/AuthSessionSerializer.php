<?php
namespace keeko\auth\serializer;

use keeko\core\serializer\SessionSerializer;
use Tobscure\JsonApi\Relationship;
use Tobscure\JsonApi\Resource;

/**
 */
class AuthSessionSerializer extends SessionSerializer {

	/**
	 * @param mixed $model
	 */
	public function getType($model) {
		return 'auth/session';
	}
	
	public function getRelationships() {
		return [
			'profile' => 'auth/profile'
		];
	}
	
	/**
	 * @param mixed $model
	 * @return Relationship
	 */
	public function profile($model) {
		$serializer = new AuthProfileSerializer();
		$relationship = new Relationship(new Resource($model->getUser(), $serializer));
		$relationship->setLinks([
			'related' => '%apiurl%' . $serializer->getType(null) . '/' . $serializer->getId($model)
		]);
		return $this->addRelationshipSelfLink($relationship, $model, 'profile');
	}
}
