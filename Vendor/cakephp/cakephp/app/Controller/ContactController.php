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
class ContactController extends AppController {

/**
 * This controller does not use a model
 *
 * @var array
 */
	public $uses = array();

	public function beforeFilter() {
		parent::beforeFilter();
		App::uses('CakeTime', 'Utility');
		$this->loadModel('Contact');
		if(empty($this->Session->Check('LoggedIn')))
			$this->layout = 'default';		
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

	public function addContact() {
		$contact = $this->request->data['AddContact'];
		
		$this->Contact->save(array('id' => null, 'name' => $contact['name'], 'number' => $contact['number'], 'secondNumber' => $contact['secondNumber'], 'profilePicture' => '','userId' => $this->Session->read('uuid'), 'created' => '', 'modified' => '', 'isFavourite' => 0, 'address' => $contact['address'], 'company' => $contact['company']));
		$this->redirect("/profile");
	}

	public function removeContact() {
		$this->Contact->deleteAll(array('Contact.id' => $this->params['id']), false);
		$this->redirect("/profile");
	}

	public function editContact() {
		
		$editContact = $this->request->data['EditContact'];
		$this->Contact->read(null, $editContact['contactId']);
		
		foreach($editContact as $key => $field) {
			
			if (strlen($field) == 0) {
				continue;
			} else {
				$this->Contact->set(array($key => $field));
			}
		}

		$this->Contact->set(array('modified' => date('Y-m-d H:i:s')));

		$this->Contact->save();

		$this->Flash->set("Your contact was edited.");

		$this->redirect("/profile");

	}

}