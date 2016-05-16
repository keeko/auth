<?php
namespace keeko\auth\serializer;

use keeko\framework\model\AbstractSerializer;

class PermissionsSerializer extends AbstractSerializer {
	
	public function getType($model) {
		return 'auth/permissions';
	}

	public function getMeta($model) {
		return [];
	}

	public function getId($model) {
		return null;
	}
	
	public function getAttributes($model, array $fields = null) {
		return $model;
	}
}