<?php
namespace App\Controller\Admin;

use App\Controller\AppController;

use Cake\Event\Event;
use Cake\Routing\Router;
use Cake\Core\Configure;

use Cake\Error\Debugger; 
use Cake\ORM\TableRegistry;

/**
 * Products Controller
 *
 * @property \App\Model\Table\ProductsTable $Products
 *
 * @method \App\Model\Entity\Product[] paginate($object = null, array $settings = [])
 */
class CampaignsController extends AppController
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

        $this->Auth->allow(['slugify','gallery']); 

        $this->authcontent();
    ini_set('memory_limit', '-1');    

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
        $campaigns = $this->Campaigns->find('all',[
            'order'   => ['Campaigns.id' => 'desc'],
            'contain' => ['Users','Campaigncategories'=>['Categories'],'Deals','Organisations','Perks','Invests']
            ]);
	$campaigns = $campaigns->all()->toArray();
        $this->set(compact('campaigns'));
        $this->set('_serialize', ['campaigns']);
    }

    public function desable($id = null) {
        $campaign = $this->Campaigns->get($id);
        $post['status'] = 0;
        $campaign = $this->Campaigns->patchEntity($campaign, $post);
       if ($this->Campaigns->save($campaign)) {

           $this->Flash->success(__('Deactivated successfully.'));

       } else {  

           $this->Flash->error(__('Unable to Deactivated.'));

       }



       return $this->redirect(['action' => 'index']);
   }

   public function enable($id = null) {
    $campaign = $this->Campaigns->get($id);
    $post['status'] = 1;
    $campaign = $this->Campaigns->patchEntity($campaign, $post);
 if ($this->Campaigns->save($campaign)) {

     $this->Flash->success(__('Activated successfully.'));

 } else {

     $this->Flash->error(__('Unable to activate.'));

 }

 return $this->redirect(['action' => 'index']);
}
    

    /**
     * View method
     *
     * @param string|null $id Product id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null) 
    {
        $campaign = $this->Campaigns->get($id,[
            'contain' => ['Users','Campaigncategories'=>['Categories'],'Deals','Organisations','Perks']
            ]);
        $this->set('campaign', $campaign);
        $this->set('_serialize', ['campaign']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $product = $this->Products->newEntity();
        if ($this->request->is('post')) {
        // echo "<pre>";
        // print_r($_POST);
        // die();

        $image = $this->request->data['image'];

        $name = time().$image['name'];
		$tmp_name = $image['tmp_name'];
		$upload_path = WWW_ROOT.'images/products/'.$name;
		move_uploaded_file($tmp_name, $upload_path);
            $this->request->data['image'] = $name;      
            $this->request->data['slug'] =$this->slugify($this->request->data['name']);


            $lat = $_POST['lat'];
            $lng = trim($_POST['long']);
            $data = file_get_contents("https://maps.google.com/maps/api/geocode/json?latlng=$lat,$lng&sensor=false&key=AIzaSyBQrWZPh0mrrL54_UKhBI2_y8cnegeex1o");
            $data = json_decode($data);
            $add_array  = $data->results;
            $add_array = $add_array[0];
            $add_array = $add_array->address_components;
            $country = "Not found";
            $state = "Not found"; 
            $city = "Not found";
            foreach ($add_array as $key) {
            if($key->types[0] == 'administrative_area_level_2')
            {
            $city = $key->long_name;
            }
            if($key->types[0] == 'administrative_area_level_1')
            {
            $state = $key->long_name;
            }
            if($key->types[0] == 'country')
            {
            $country = $key->long_name;
            }
            }
            $this->request->data['city'] = $city;



            $product = $this->Products->patchEntity($product, $this->request->getData());
            if ($this->Products->save($product)) {
                $this->Flash->success(__('The product has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The product could not be saved. Please, try again.'));
        }
        $cats = $this->Products->Categories->find('treeList', ['limit' => 200]); 
        //$stores = $this->Products->Stores->find('list', ['limit' => 200]);
        $users = $this->Products->Users->find('list',array('conditions'=>array('Users.role'=>'user'))); 
        $this->set(compact('product', 'cats','users'));
        $this->set('_serialize', ['product']);
    }

    
  
    /**
     * Edit method
     *
     * @param string|null $id Product id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $product = $this->Products->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) { 
            
            	        $post = $this->request->data;

			if($this->request->data['image']['name'] != ''){ 
					
			 	
			 
				$image = $this->request->data['image'];
				$name = time().$image['name'];
				$tmp_name = $image['tmp_name'];
				$upload_path = WWW_ROOT.'images/products/'.$name;
				move_uploaded_file($tmp_name, $upload_path);
				 
				$post['image'] = $name;
			
			}else{
				unset($this->request->data['image']);
				$post = $this->request->data;
			}
            $product = $this->Products->patchEntity($product, $post );  
            if ($this->Products->save($product)) {
                $this->Flash->success(__('The product has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The product could not be saved. Please, try again.'));
        }
        $cats = $this->Products->Categories->find('treeList', ['limit' => 200]); 
       // $stores = $this->Products->Stores->find('list', ['limit' => 200]);
        $users = $this->Products->Users->find('list',array('conditions'=>array('Users.role'=>'user'))); 
        $this->set(compact('product', 'cats','users'));  
        $this->set('_serialize', ['product']);
    }


    public function supporters($id = null)
    {
        $supporter = $this->Campaigns->get($id,[
            'conditions' => ['Campaigns.status' => '1'],
            'contain' => ['Invests'=>['Users']]
            ])->toArray();  

        $this->set(compact('supporter',$supporter));
        $this->set('_serialize', ['supporter']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Product id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $campaign = $this->Campaigns->get($id);
        if ($this->Campaigns->delete($campaign)) {
            $this->Flash->success(__('The Campaigns has been deleted.'));
        } else {
            $this->Flash->error(__('The Campaigns could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
    
     
}
