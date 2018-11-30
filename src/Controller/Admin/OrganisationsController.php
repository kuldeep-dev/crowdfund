<?php
namespace App\Controller\Admin;     

use App\Controller\AppController;
use Cake\Event\Event;

use Cake\Core\Configure;

use Cake\Error\Debugger;  

/**
 * Categories Controller
 *
 * @property \App\Model\Table\OrganisationsTable $Categories
 *
 * @method \App\Model\Entity\Category[] paginate($object = null, array $settings = [])
 */
class OrganisationsController extends AppController
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

        $this->Auth->allow(['slugify','index']); 

        $this->authcontent();

    } 
    
    
    
     private function slugify($str) {  
                // trim the string
                $str = strtolower(trim($str));
                // replace all non valid characters and spaces with an underscore
                $str = preg_replace('/[^a-z0-9-]/', '_', $str);
                $str = preg_replace('/-+/', "_", $str);
        return $str;
     } 
    
    
    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => [],
            'order' => ['Organisations.id' => 'desc']
        ];

        $organisations = $this->paginate($this->Organisations);

        $this->set(compact('organisations'));
        $this->set('_serialize', ['organisations']);
    }

    /**
     * View method
     *
     * @param string|null $id Category id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $organisation = $this->Organisations->get($id, [
            'contain' => []
        ]);

        $this->set('organisation', $organisation);
        $this->set('_serialize', ['organisation']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $organisation = $this->Organisations->newEntity(); 
        if ($this->request->is('post')) {
            
            $this->request->data['slug'] =$this->slugify($this->request->data['name']);
            
            $organisation = $this->Organisations->patchEntity($organisation, $this->request->getData());
            if ($this->Organisations->save($organisation)) {
                $this->Flash->success(__('The organisation has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The organisation could not be saved. Please, try again.'));
        }
        $this->set(compact('organisation'));
        $this->set('_serialize', ['organisation']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Category id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $organisation = $this->Organisations->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            
            $post = $this->request->data;
            $organisation = $this->Organisations->patchEntity($organisation, $post);
            if ($this->Organisations->save($organisation)) {
                $this->Flash->success(__('The organisation has been updated.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The organisation could not be updated. Please, try again.'));
        }
        $this->set(compact('organisation'));
        $this->set('_serialize', ['organisation']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Category id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $organisation = $this->Organisations->get($id);

        if ($this->Organisations->delete($organisation)) {
            $this->Flash->success(__('The organisation has been deleted.'));
        } else {
            $this->Flash->error(__('The organisation could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }  
}
