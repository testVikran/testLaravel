<?php
/**
 * Static content controller.
 *
 * This file will render views from views/pages/
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

App::uses('AppController', 'Controller');

/**
 * Static content controller
 *
 * Override this controller by placing a copy in controllers directory of an application
 *
 * @package       app.Controller
 * @link http://book.cakephp.org/2.0/en/controllers/pages-controller.html
 */
class PagesController extends AppController {

/**
 * This controller does not use a model
 *
 * @var array
 */
	public $uses = array('User','Hotel','Comment');

/**
 * Displays a view
 *
 * @return void
 * @throws NotFoundException When the view file could not be found
 *	or MissingViewException in debug mode.
 */
	function index(){
		$hotels = $this->Hotel->find('all');
		$comments = $this->Comment->find('all', array( 'fields' =>array('group_concat(`comment`)','id','hotel_id'),'group' => 'hotel_id' ));
		$this->set('hotels',$hotels);
		$this->set('comments',$comments);	
	}
	function logout(){
		$this->Session->delete('User');
        $this->Session->destroy();
        $this->redirect( array( 'controller' => 'pages', 'action' => 'index' ) );
	}
	function createHotel(){
		$user_id = $this->_checkLogin();
		if ($this->data) {
			$this->Hotel->save($this->data);
			$this->Session->setFlash('<div class="row text-center well"><h3 class="text-success">Thank you your requiest submitted successfully</h3></div>');
			$this->redirect( array( 'controller' => 'pages', 'action' => 'createHotel' ) );
		}
		
	}
	function logins() {
		if ($this->data) {
		$login_detail = $this->User->find('first', array( 'conditions' => array('username' => $this->data['username'])));
			if(empty($login_detail)) {
				$this->redirect( array( 'controller' => 'pages', 'action' => 'index?status=2' ) );
			} else {
				if($login_detail['User']['username'] == $this->data['username'] && $login_detail['User']['password'] == md5($this->data['password'])) {
					$login_detail['User']['UserId'] = $login_detail['User']['id'];
					$this->Session->write('User',$login_detail['User']);
					
					$this->redirect( array( 'controller' => 'pages', 'action' => 'index' ) );
				} else {
					$this->redirect( array( 'controller' => 'pages', 'action' => 'index' ) );
				}
			}
		}
	}
	function addComment(){
		$this->autoRender = false;
		if ($this->data) {
			$data['hotel_id'] = $this->data['hotel'];
			$data['comment'] = $this->data['comment'];
			if($this->Comment->save($data)){
				return true;
			} else {
				return false;
			}
		}
	}
}
