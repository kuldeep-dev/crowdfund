<?php
namespace App\Controller\Admin;     

use App\Controller\AppController;
use Cake\Event\Event;

use Cake\Core\Configure;

use Cake\Error\Debugger;  

/**
 * Categories Controller
 *
 * @property \App\Model\Table\PerksTable $Categories
 *
 * @method \App\Model\Entity\Category[] paginate($object = null, array $settings = [])
 */
class PerksController extends AppController
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
            'order' => ['Perks.id' => 'desc']
        ];
        $perks = $this->paginate($this->Perks);

        $this->set(compact('perks'));
        $this->set('_serialize', ['perks']);
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
        $perk = $this->Perks->get($id, [
            'contain' => []
        ]);

        $this->set('perk', $perk);
        $this->set('_serialize', ['perk']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $perk = $this->Perks->newEntity(); 
        if ($this->request->is('post')) {
            
            $this->request->data['slug'] =$this->slugify($this->request->data['name']);
            
            $perk = $this->Perks->patchEntity($perk, $this->request->getData());
            if ($this->Perks->save($perk)) {
                $this->Flash->success(__('The Perks has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The Perks could not be saved. Please, try again.'));
        }
        $this->set(compact('perk'));
        $this->set('_serialize', ['perk']);
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
        $perk = $this->Perks->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            
            $post = $this->request->data;
            $perk = $this->Perks->patchEntity($perk, $post);
            if ($this->Perks->save($perk)) {
                $this->Flash->success(__('The perk has been updated.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The perk could not be updated. Please, try again.'));
        }
        $this->set(compact('perk'));
        $this->set('_serialize', ['perk']);
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
        $perk = $this->Perks->get($id);

        if ($this->Perks->delete($perk)) {
            $this->Flash->success(__('The perk has been deleted.'));
        } else {
            $this->Flash->error(__('The perk could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }  
}
