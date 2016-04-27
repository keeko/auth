<?php
namespace keeko\auth\domain;

use keeko\framework\domain\payload\Failed;
use keeko\framework\domain\payload\PayloadInterface;
use keeko\framework\domain\payload\Success;
use keeko\framework\foundation\AbstractDomain;

/**
 */
class SessionDomain extends AbstractDomain {
	
	/**
	 * @param string $login
	 * @param string $password
	 * @return PayloadInterface
	 */
	public function login($login, $password) {
		$authManager = $this->getServiceContainer()->getAuthManager();
		if ($authManager->login($login, $password)) {
			$session = $authManager->getSession();
			return new Success(['session' => $session]);
		}
		
		return new Failed();
	}
	
	/**
	 * 
	 * @return PayloadInterface
	 */
	public function logout() {
		$authManager = $this->getServiceContainer()->getAuthManager();
		if ($authManager->logout()) {
			return new Success();
		}
		
		return new Failed();
	}
}
