<?php
namespace keeko\auth\action;

use keeko\framework\foundation\AbstractAction;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use keeko\core\model\GroupQuery;
use keeko\framework\domain\payload\Found;

/**
 * User Permissions
 * 
 * This code is automatically created. Modifications will probably be overwritten.
 */
class PermissionsAction extends AbstractAction {

	/**
	 * Automatically generated run method
	 * 
	 * @param Request $request
	 * @return Response
	 */
	public function run(Request $request) {
		$user = $this->getServiceContainer()->getAuthManager()->getUser();
		
		// always allow what guests can do
		$guestGroup = GroupQuery::create()->findOneByIsGuest(true);
		
		// collect groups from user
		$groups = GroupQuery::create()->filterByUser($user)->find();
		$userGroup = GroupQuery::create()->filterByOwnerId($user->getId())->findOne();
		if ($userGroup) {
			$groups[] = $userGroup;
		}
		$groups[] = $guestGroup;
		
		// ... structure them
		$permissions = [];
		foreach ($groups as $group) {
			foreach ($group->getActions() as $action) {
				$moduleName = $action->getModule()->getName();
				if (!isset($permissions[$moduleName])) {
					$permissions[$moduleName] = [];
				}
				$permissions[$moduleName][] = $action->getName();
			}
		}

		return $this->responder->run($request, new Found(['permissions' => $permissions]));
	}
}
