<?php
/**
 * Routes configuration
 *
 * In this file, you set up routes to your controllers and their actions.
 * Routes are very important mechanism that allows you to freely connect
 * different URLs to chosen controllers and their actions (functions).
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
 * @package       app.Config
 * @since         CakePHP(tm) v 0.2.9
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 */
 
/**
 * Here, we are connecting '/' (base path) to controller called 'Pages',
 * its action called 'display', and we pass a param to select the view file
 * to use (in this case, /app/View/Pages/home.ctp)...
 */
	Router::connect('/home', array('controller' => 'main', 'action' => 'home'));	
	Router::connect('/about', array('controller' => 'main', 'action' => 'about'));
	Router::connect('/contact', array('controller' => 'main', 'action' => 'contact'));
	Router::connect('/tests', array('controller' => 'main', 'action' => 'tests'));
	Router::connect('/privacyPolicy', array('controller' => 'main', 'action' => 'privacyPolicy'));
	Router::connect('/personalData', array('controller' => 'main', 'action' => 'personalData'));


	Router::connect('/profile', array('controller' => 'main', 'action' => 'profile'));
	Router::connect('/login-form', array('controller' => 'user', 'action' => 'loginForm'));
	Router::connect('/register-form', array('controller' => 'user', 'action' => 'registerForm'));
	Router::connect('/login-user', array('controller' => 'user', 'action' => 'loginUser'));
	Router::connect('/logout-user', array('controller' => 'user', 'action' => 'logoutUser'));
	Router::connect('/delete-user', array('controller' => 'user', 'action' => 'deleteUser'));
	Router::connect('/register-user', array('controller' => 'user', 'action' => 'registerUser'));
	Router::connect('/add-contact', array('controller' => 'contact', 'action' => 'addContact'));
	Router::connect('/remove-contact/:id', array('controller' => 'contact', 'action' => 'removeContact'));
	Router::connect('/favourite-contact/:id', array('controller' => 'contact', 'action' => 'favouriteContact'));
	Router::connect('/edit-contact', array('controller' => 'contact', 'action' => 'editContact'));
	Router::connect('/change-password', array('controller' => 'user', 'action' => 'changePassword'));
	Router::connect('/sortAplhaAsc', array('controller' => 'contact', 'action' => 'sortAplhabeticAsc'));
	Router::connect('/sortAplhaDesc', array('controller' => 'contact', 'action' => 'sortAplhabeticDesc'));
	Router::connect('/sortDateAsc', array('controller' => 'contact', 'action' => 'sortDateAsc'));
	Router::connect('/sortDateDesc', array('controller' => 'contact', 'action' => 'sortDateDesc'));
	Router::connect('/sortFav', array('controller' => 'contact', 'action' => 'sortFav'));
	Router::connect('/search/:query', array('controller' => 'contact', 'action' => 'searchContacts'));





/**
 * ...and connect the rest of 'Pages' controller's URLs.
 */
	Router::connect('/pages/*', array('controller' => 'pages', 'action' => 'display'));

/**
 * Load all plugin routes. See the CakePlugin documentation on
 * how to customize the loading of plugin routes.
 */
	CakePlugin::routes();

/**
 * Load the CakePHP default routes. Only remove this if you do not want to use
 * the built-in default routes.
 */
	require CAKE . 'Config' . DS . 'routes.php';
