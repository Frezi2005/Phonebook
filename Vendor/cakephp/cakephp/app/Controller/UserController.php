<?php
/**
 * Static content controller.
 *
 * This file will render views from views/pages/
 *
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 */

App::uses('AppController', 'Controller');

/**
 * Static content controller
 *
 * Override this controller by placing a copy in controllers directory of an application
 *
 * @package       app.Controller
 * @link https://book.cakephp.org/2.0/en/controllers/pages-controller.html
 */
class UserController extends AppController {

/**
 * This controller does not use a model
 *
 * @var array
 */
	public $uses = array();

	public function beforeFilter() {
		parent::beforeFilter();
		$this->loadModel('User');
		App::uses('CakeText', 'Utility');
		if(empty($this->Session->Check('LoggedIn'))) {
			$this->layout = 'default';
		}			
		else 
			$this->layout = 'loggedIn';
	}

/**
 * Displays a view
 *
 * @return CakeResponse|null
 * @throws ForbiddenException When a directory traversal attempt.
 * @throws NotFoundException When the view file could not be found
 *   or MissingViewException in debug mode.
 */
	public function display() {
		$path = func_get_args();

		$count = count($path);
		if (!$count) {
			return $this->redirect('/');
		}
		if (in_array('..', $path, true) || in_array('.', $path, true)) {
			throw new ForbiddenException();
		}
		$page = $subpage = $title_for_layout = null;

		if (!empty($path[0])) {
			$page = $path[0];
		}
		if (!empty($path[1])) {
			$subpage = $path[1];
		}
		if (!empty($path[$count - 1])) {
			$title_for_layout = Inflector::humanize($path[$count - 1]);
		}
		$this->set(compact('page', 'subpage', 'title_for_layout'));

		try {
			$this->render(implode('/', $path));
		} catch (MissingViewException $e) {
			if (Configure::read('debug')) {
				throw $e;
			}
			throw new NotFoundException();
		}
	}

	public function loginForm() {
		echo "I'm in loginForm()";
	}

	public function registerForm() {
		echo "I'm in registerForm()";
	}

	public function loginUser() {

		$userCredentials = $this->request->data['Login'];

		if(!empty($this->User->find('first', array('conditions' => array('password' => hash("SHA384", md5($this->request->data['Login']['password'])), 'username' => $this->request->data['Login']['login']))))) {
			$user = $this->User->find('first', array('conditions' => array('password' => hash("SHA384", md5($this->request->data['Login']['password'])), 'username' => $this->request->data['Login']['login'])));
			$this->Session->write("LoggedIn", true);
			$this->Session->write("uuid", $user['User']['uuid']);
			$this->redirect("/profile");
		} else {
			$this->Session->write('loginError', 'Username or password is incorrect!');
			$this->redirect("/home");
		}
	}

	public function registerUser() {

		$user = $this->request->data['Register'];
		$this->User->set($this->request->data['Register']);
		$this->BadLogin = $this->Components->load('BadLogin');
		$this->BadLogin->validate($user['login']);
		
		if($this->User->validates() && $this->BadLogin->validate($user['login']) && $user['password'] != $user['login']) {
			if($this->User->save(array('id' => null, 'username' => $user['login'], 'password' => hash("SHA384", md5($user['password'])), 'uuid' => CakeText::uuid()))) {
				$this->Session->write("registerMessage", "Your account have been created succeselfully. You can login now!");
			}
		} else if(!$this->BadLogin->validate($user['login'])) {
			$_SESSION['registerError'] = 'Your login has a curse word in it!';
		} 

		$this->redirect("/home");

	}
		
	public function logoutUser() {
		$this->Session->delete("LoggedIn");

		$this->redirect("/home");
	}

	public function deleteUser() {

		$this->User->deleteAll(array('User.uuid' => $this->Session->read('uuid')), false);
		$this->Session->delete("LoggedIn");

		$this->Session->read('uuid');

	}

	public function changePassword() {
		
		$password = isset($this->request->data['ChangePassword']) ? $this->request->data['ChangePassword'] : null ;

		$this->set('login', $password);

		$this->User->read(null, $_SESSION['uuid']);

		if(isset($this->request->data['ChangePassword'])) {
			$this->User->updateAll(
				array('password' => "'".hash("SHA384", md5($password['newPassword']))."'"), 
				array('uuid' => $this->Session->read('uuid')));
			$this->User->save();
			$this->redirect("/profile");
		}
	}

}
