<?php
namespace App\Controller\Admin;      

use App\Controller\AppController;

use Cake\Event\Event;

use Cake\Routing\Router;

use Cake\Mailer\Email;         

use Cake\Auth\DefaultPasswordHasher;

/**
 * Orders Controller
 *
 * @property \App\Model\Table\InvestsTable $Stores
 *
 * @method \App\Model\Entity\Store[] paginate($object = null, array $settings = [])
 */
class InvestsController extends AppController
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

        $this->Auth->allow(['index']);  

        $this->authcontent();
 

    }
    
    
    
        public function index()
    {
        $this->paginate = [
            'contain' => ['Users','Campaigns'],
            'order' => ['Invests.id' => 'desc']];
        $invests = $this->paginate($this->Invests);

        $this->set(compact('invests'));
        $this->set('_serialize', ['invests']); 
    }

    
    
        public function view($id = null)    
    {
        $order = $this->Orders->get($id, [
            'contain' => ['Users','Products'=>['Users']]           
        ]);
 
        $this->set('order', $order); 
        $this->set('_serialize', ['order']);    
    }
      
    public function payments(){    
        $this->paginate = [ 
            'contain' => ['Users','Seller']
        ];
        $orders = $this->paginate($this->Orders)->toArray();
         
        $this->set(compact('orders'));
        $this->set('_serialize', ['orders']);   
        
        
    }
    
    public function markpay(){ 
        
        
    }
    
  

}
