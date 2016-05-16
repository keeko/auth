<?php
namespace keeko\auth\serializer;

use keeko\core\serializer\UserSerializer;

/**
 */
class AuthProfileSerializer extends UserSerializer {

	/**
	 * @param mixed $model
	 */
	public function getType($model) {
		return 'auth/profile';
	}
}
