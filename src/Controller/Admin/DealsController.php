<?php
namespace App\Controller\Admin;     

use App\Controller\AppController;
use Cake\Event\Event;

use Cake\Core\Configure;

use Cake\Error\Debugger;  

/**
 * Categories Controller
 *
 * @property \App\Model\Table\DealsTable $Categories
 *
 * @method \App\Model\Entity\Category[] paginate($object = null, array $settings = [])
 */
class DealsController extends AppController
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
            'order' => ['Deals.id' => 'desc']
        ];
        $deals = $this->paginate($this->Deals);

        $this->set(compact('deals'));
        $this->set('_serialize', ['deals']);
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
        $deal = $this->Deals->get($id, [
            'contain' => []
        ]);

        $this->set('deal', $deal);
        $this->set('_serialize', ['deal']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $deal = $this->Deals->newEntity(); 
        if ($this->request->is('post')) {
            
            $image = $this->request->data['image'];
 
	        $name = time().$image['name']; 
		    $tmp_name = $image['tmp_name'];
		    $upload_path = WWW_ROOT.'images/categories/'.$name; 
		    move_uploaded_file($tmp_name, $upload_path);
            $this->request->data['image'] = $name;      
            $this->request->data['slug'] =$this->slugify($this->request->data['name']);
            
            $deal = $this->Deals->patchEntity($deal, $this->request->getData());
            if ($this->Deals->save($deal)) {
                $this->Flash->success(__('The deal has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The deal could not be saved. Please, try again.'));
        }
        $this->set(compact('deal'));
        $this->set('_serialize', ['deal']);
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
        $deal = $this->Deals->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            
            $post = $this->request->data;
            if($this->request->data['image']['name'] != ''){ 
					
			 	
			 
				$image = $this->request->data['image'];
				$name = time().$image['name'];
				$tmp_name = $image['tmp_name'];
				$upload_path = WWW_ROOT.'images/categories/'.$name;
				move_uploaded_file($tmp_name, $upload_path);
				 
				$post['image'] = $name;
			
			}else{
				unset($this->request->data['image']);
				$post = $this->request->data;
			}
            $deal = $this->Deals->patchEntity($deal, $post);
            if ($this->Deals->save($deal)) {
                $this->Flash->success(__('The deal has been updated.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The deal could not be updated. Please, try again.'));
        }
        $this->set(compact('deal'));
        $this->set('_serialize', ['deal']);
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
        $deal = $this->Deals->get($id);

        if ($this->Deals->delete($deal)) {
            $this->Flash->success(__('The deal has been deleted.'));
        } else {
            $this->Flash->error(__('The deal could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }  
}
