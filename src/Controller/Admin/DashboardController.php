<?php

namespace App\Controller\Admin;



use App\Controller\AppController;

use Cake\Event\Event;

use Cake\Core\Configure;

use Cake\Error\Debugger;



/**

 * Users Controller

 *

 * @property \App\Model\Table\UsersTable $Users

 *

 * @method \App\Model\Entity\User[] paginate($object = null, array $settings = [])

 */

class DashboardController extends AppController

{

	public function beforeFilter(Event $event) {

        parent::beforeFilter($event);

        if ($this->request->params['prefix'] == 'admin') {

            $this->viewBuilder()->setLayout('admin');
            if($this->Auth->user() && $this->Auth->user('role') !='admin'){
             $this->Auth->logout(); 
              //  $this->viewBuilder()->setLayout('admin');
            }

        }

        $this->Auth->allow(['logout']);

        $this->authcontent();

    }



	public function index(){

		$this->loadModel('Users');
		
		$users = $this->Users->find('all',[
			'conditions' => ['Users.role' => 'user','Users.status' => 1]
		])->all()->toArray();
		
		$this->set('users', $users);
		$this->set('_serialize', ['users']);
		
		
		$members = $this->Users->find('all',[
			'conditions' => ['Users.status' => 1],
			'order'		=> ['Users.id' => 'desc'],
			'limit'		=>	8
		])->all()->toArray();
		
		$this->set('members', $members);
		$this->set('_serialize', ['members']);

		///////  project categories ///////////


		$this->loadModel('Categories');
		
		$categories = $this->Categories->find('all',[
			'conditions' => ['Categories.status' => 1]
		])->all()->toArray();
		
		$this->set('categories', $categories);
		$this->set('_serialize', ['categories']);

		///////  project categories ///////////

		///////  organisations ///////////


		$this->loadModel('Organisations');
		
		$organisations = $this->Organisations->find('all',[
			'conditions' => ['Organisations.status' => 1]
		])->all()->toArray();
		
		$this->set('organisations', $organisations);
		$this->set('_serialize', ['organisations']);

		///////  organisations ///////////

		///////  deals ///////////


		$this->loadModel('Deals');
		
		$deals = $this->Deals->find('all',[
			'conditions' => ['Deals.status' => 1]
		])->all()->toArray();
		
		$this->set('deals', $deals);
		$this->set('_serialize', ['deals']);

		///////  deals ///////////

		/////////// campaigns ////////////////

		$this->loadModel('Campaigns');
		
		$campaign = $this->Campaigns->find('all',[
			'conditions' => ['Campaigns.status' => 1],
			'order'		=> ['Campaigns.id' => 'desc']
		])->all()->toArray();
		
		$this->set('campaign', $campaign);
		$this->set('_serialize', ['campaign']);




		/////////// campaigns ////////////////


		/////////// total amount ////////////////

		$this->loadModel('Invests');
		
		$invest = $this->Invests->find('all',[
			'conditions' => []
		])->all()->toArray();
		
		$this->set('invest', $invest);
		$this->set('_serialize', ['invest']);

		/////////// total amount ////////////////


	}
}