<?php
namespace keeko\auth\serializer;

use keeko\core\serializer\SessionSerializer;

/**
 */
class AuthSessionSerializer extends SessionSerializer {

	/**
	 * @param mixed $model
	 */
	public function getType($model) {
		return 'auth/session';
	}
}
