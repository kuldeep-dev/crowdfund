<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;
use Cake\Event\Event;
use Cake\Routing\Router;
use Cake\Mailer\Email;
use Cake\Auth\DefaultPasswordHasher;
use Cake\Datasource\ConnectionManager;
//use \CROSCON\CommissionJunction\Client;      



/**
 * Products Controller
 *
 * @property \App\Model\Table\CampaignsTable $Products
 *
 * @method \App\Model\Entity\Product[] paginate($object = null, array $settings = [])
 */
class CampaignsController extends AppController
{

    
    public function initialize()
    { 
        parent::initialize(); 
    }
    
    
    public function beforeFilter(Event $event) {

        parent::beforeFilter($event);
        $this->Auth->allow(['slugify','view','index','campaigninfo','invest']);            

        $this->authcontent();        
    }
    
     private function slugify($str) {   
                // trim the string
                $str = strtolower(trim($str));
                // replace all non valid characters and spaces with an underscore
                $str = preg_replace('/[^a-z0-9-]/', '-', $str);
                $str = preg_replace('/-+/', "-", $str);
        return $str;
     } 
    
    
    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {  
        $this->loadModel('Users');
        $this->loadModel('Categories');
        if($this->request->is('post')){
        $uname =  $this->request->data['sellername'];     
        $seller = $this->Users->find('all',['conditions'=>['Users.name LIKE' => '%' . $uname . '%']]); 
        $seller = $seller->first();
        $seller_id = $seller['id'];    
        $this->paginate = [
            'contain' => ['Categories', 'Users'],
            'conditions'=>['Products.user_id'=>$seller_id]
        ];  
        
        }else{

        $this->paginate = [
            'contain' => ['Categories', 'Users','Reviews']
        ];
            
        }
        $products = $this->paginate($this->Products); 
        
        $categories = $this->Categories->find('all',[ 'contain' => ['Products']]); 
        $categories = $categories->all();
        $this->set(compact('products','categories')); 
        $this->set('_serialize', ['products','categories']);  
    }

    
      

    
    
    
    /**
     * View method
     *
     * @param string|null $id Product id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($slug = null)
    {
    
        $product = $this->Products->find('all', array('contain'=>array('Users','Galleries','Reviews'=>'Users'),
                'conditions' => ['Products.slug'=>$slug]   
            ));
        $product = $product->first(); 
   
        $this->set('product', $product);
        $this->set('_serialize', ['product']);
    }

    
    
    
    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $this->loadModel('Organisations');
        $organisations = $this->Organisations->find('all', 
        ['conditions' => ['Organisations.status' => '1']])->all()->toArray();

        $this->loadModel('Categories');
        $categories = $this->Categories->find('all', 
        ['conditions' => ['Categories.status' => '1']])->all()->toArray();

        $this->loadModel('Perks');
        $perks = $this->Perks->find('all', 
        ['conditions' => ['Perks.status' => '1']])->all()->toArray();

        $this->loadModel('Deals');
        $deals = $this->Deals->find('all', 
        ['conditions' => ['Deals.status' => '1']])->all()->toArray();

        $campaign = $this->Campaigns->newEntity();
        if ($this->request->is('post')) {

            $this->request->data['user_id'] = $this->Auth->user('id');
            $this->request->data['slug'] =$this->slugify($this->request->data['name']);

            $ppt_thumbnail = $this->request->data['ppt_thumbnail'];
            $name = time().$ppt_thumbnail['name'];
            $tmp_name = $ppt_thumbnail['tmp_name'];
            $upload_path = WWW_ROOT.'images/campaign/'.$name;
            move_uploaded_file($tmp_name, $upload_path);
            $this->request->data['ppt_thumbnail'] = $name;

            $image = $this->request->data['image'];
            $name = time().$image['name'];
            $tmp_name = $image['tmp_name'];
            $upload_path = WWW_ROOT.'images/campaign/'.$name;
            move_uploaded_file($tmp_name, $upload_path);
            $this->request->data['image'] = $name;

            $d = strtotime("+".$this->request->data['duration']." months",strtotime($this->request->data['live']));
            $end_date = date("Y-m-d",$d); 
            $post = $this->request->getData();
            $post['end_date']    = $end_date;
           $campaign = $this->Campaigns->patchEntity($campaign, $post);

            if ($this->Campaigns->save($campaign)) {
                $this->loadModel('Campaigncategories');
                $campcat = $this->request->data['cat_id'];
                $post1 = array();
                for ($i = 0; $i < count($campcat); $i++) {
                    $post1['cat_id'] = $campcat[$i];
                    $post1['camp_id'] = $campaign->id;
                    $campcate = $this->Campaigncategories->newEntity();
                    $campcate = $this->Campaigncategories->patchEntity($campcate, $post1);
                    $this->Campaigncategories->save($campcate);
                }     
                $this->Flash->success(__('The Campaign has been saved.'));

                //return $this->redirect(['action' => 'index']);
                return $this->redirect(['controller' => 'users', 'action' => 'myaccount']);
            }
            $this->Flash->error(__('The Campaign could not be saved. Please, try again.'));
        }
        $this->set(compact('organisations','categories','perks','deals','campaign'));
        $this->set('_serialize', ['organisations']);
    }

    public function campaigninfo($idd = null)
    {
        $this->loadModel('Users');
        $userdata = [];
        if($this->Auth->user())
        {
            $uid =  $this->Auth->user('id');
            if($uid){
            $userdata  = $this->Users->find('all',array('conditions'=>array('Users.id'=>$uid)));
            $userdata  = $userdata->first();
            }
        }

        $id = base64_decode($idd);
        $campaign = $this->Campaigns->get($id,[
            'conditions' => ['Campaigns.status' => '1'],
            'contain' => ['Users','Campaigncategories'=>['Categories'],'Deals','Organisations','Perks','Invests'=>['Users'],'Updates','Faqs']
            ])->toArray();

           // print_r($campaign);
          //  exit;

        $this->set(compact('campaign','userdata'));
        $this->set('_serialize', ['campaign','userdata']);
        
    }

    public function deletecampaign()
    {
        $response = array();
        $this->request->allowMethod(['post', 'delete']);
        $campaign = $this->Campaigns->get($this->request->data['id']);

        if ($this->Campaigns->delete($campaign)) {
            $response['isSucess'] = "true";
            $this->Flash->success(__('This campaign has been deleted.'));
        } else {
            $response['isSucess'] = "false";
            $this->Flash->error(__('This campaign could not be deleted. Please, try again.'));
        }

        echo json_encode($response) ;
        exit;
    } 


    public function contactorganizer(){
        $response = array();
        if(!empty($this->request->data['email'])){     
                $ms = '<table width="200" border="1">
                <tr><th scope="row">Name</th><td>' . $this->request->data['name'] . '</td></tr>
                <tr><th scope="row">Email</th><td>' . $this->request->data['email'] . '</td></tr>
                <tr><th scope="row">Phone</th><td>' . $this->request->data['phone'] . '</td></tr>
                <tr><th scope="row">Subject</th><td>' . $this->request->data['subject'] . '</td></tr>
                <th scope="row">Message</th><td>' . $this->request->data['message'] . '</td></tr>
                </table>';
                $email = new Email('default');
                $email->from(['kuldeepjha@avainfotech.com' => 'Crowd Funding'])
                ->emailFormat('html')
                ->template('default', 'default')
                ->to($this->request->data['campaignuser'])
                ->subject('Contact Us Enquiry')
                ->send($ms);
                $response['isSucess'] = "true";
                $response['msg'] = "<div class='alert alert-success'><strong>Thank you for contacting us! We will get back to you shortly.</strong></div>";
                $this->Flash->success(__('Thank you for contacting us! We will get back to you shortly.'));    
       }else{
                $response['data'] = "no data";
                $response['isSucess'] = "false";
                $response['msg'] = "<div class='alert alert-danger'><strong>Email is requred</strong></div>";
                $this->Flash->error(__('Email is requred'));    
       } 
       echo json_encode($response) ;
       exit;
    }


    public function campaignupdate($idd = null)
    {
        $this->loadModel('Users');
        $userdata = [];
        if($this->Auth->user())
        {
            $uid =  $this->Auth->user('id');
            if($uid){
            $userdata  = $this->Users->find('all',array('conditions'=>array('Users.id'=>$uid)));
            $userdata  = $userdata->first();
            }
        }
        $id = base64_decode($idd);
        $campaign = $this->Campaigns->get($id,[
            'conditions' => ['Campaigns.status' => '1'],
            'contain' => ['Users','Campaigncategories'=>['Categories'],'Deals','Organisations','Perks','Invests'=>['Users'],'Updates','Faqs']
            ])->toArray();

             //print_r($campaign);
             //exit;

        $this->set(compact('campaign','userdata'));
        $this->set('_serialize', ['campaign','userdata']);
        
    }

    public function campaignupdatesdata(){
        $this->loadModel('Updates');
        $update = $this->Updates->newEntity();
        $response = array();
        if(!empty($this->request->data['camp_id'])){     
            $post = $this->request->getData();   
            $update = $this->Updates->patchEntity($update, $post);
            if ($this->Updates->save($update)) {
                $response['isSucess'] = "true";
                $response['msg'] = "New updates of campaigns is saved.";
                $this->Flash->success(__('New updates of campaigns is saved.'));  
            }else{
                $response['data'] = "no data";
                $response['isSucess'] = "false";
                $response['msg'] = "New updates of campaigns can not be saved.";
                $this->Flash->error(__('New updates of campaigns can not be saved'));    
            }
        }else{
                $response['data'] = "no data";
                $response['isSucess'] = "false";
                $response['msg'] = "New updates of campaigns can not be saved.";
                $this->Flash->error(__('New updates of campaigns can not be saved.'));    
       } 
       echo json_encode($response) ;
       exit;
    }

    public function campaignaskqueries(){
        $this->loadModel('Faqs');
        $faqs = $this->Faqs->newEntity();
        $response = array();
        if(!empty($this->request->data['camp_id'])){     
            $post = $this->request->getData();   
            $faqs = $this->Faqs->patchEntity($faqs, $post);
            if ($this->Faqs->save($faqs)) {
                $response['isSucess'] = "true";
                $response['msg'] = "New question and answer of campaigns is saved.";
                $this->Flash->success(__('New question and answer of campaigns is saved.'));  
            }else{
                $response['data'] = "no data";
                $response['isSucess'] = "false";
                $response['msg'] = "New question and answer of campaigns can not be saved.";
                $this->Flash->error(__('New question and answer of campaigns can not be saved'));    
            }
        }else{
                $response['data'] = "no data";
                $response['isSucess'] = "false";
                $response['msg'] = "New question and answer of campaigns can not be saved.";
                $this->Flash->error(__('New question and answer of campaigns can not be saved.'));    
       } 
       echo json_encode($response) ;
       exit;
    }



    public function getfunded($slug = null)
    {
        $date = date('Y-m-d');
        $this->loadModel('Campaigns');
        $this->loadModel('Categories');
        $categories = $this->Categories->find('all', 
        ['conditions' => ['Categories.status' => '1']])->all()->toArray();

        //$cat_slug = $this->request->getQuery($slug);
        // print_r($cat_slug);
        $slugs = base64_decode($slug);
        $camp_status = 1;
        if(empty($slug))
        {
            $ongoingcampaigns = $this->Campaigns->find('all',[
                        'conditions' => ['Campaigns.user_id' => $this->Auth->user('id') , 'Campaigns.status' => '1','Campaigns.live <=' => $date ,'Campaigns.end_date >=' => $date],
                        'order'   => ['Campaigns.id' => 'desc'],
                        'contain' => ['Users','Campaigncategories'=>['Categories'],'Deals','Organisations','Perks','Invests'=>['Users']]
                        ])
                        ->matching('Users', function(\Cake\ORM\Query $q) use($camp_status) {
                            return $q->where(['Users.camp_status' => $camp_status]);
                        })
                        ->toArray();
        }else{
            $ongoingcampaigns = $this->Campaigns->find('all',[
                        'conditions' => ['Campaigns.user_id' => $this->Auth->user('id') , 'Campaigns.status' => '1','Campaigns.live <=' => $date ,'Campaigns.end_date >=' => $date],
                        'order'   => ['Campaigns.id' => 'desc'],
                        'contain' => ['Users','Campaigncategories'=>['Categories'],'Deals','Organisations','Perks','Invests'=>['Users']]
                        ])
                        ->matching('Users', function(\Cake\ORM\Query $q) use($camp_status) {
                            return $q->where(['Users.camp_status' => $camp_status]);
                        })
                        ->matching('Campaigncategories', function(\Cake\ORM\Query $q) use($slugs) {
                                return $q->where(['Campaigncategories.cat_id' => $slugs]);
                        })
                        ->toArray();
        }
            // print_r($campaigns);
            // exit;
        $this->set(compact('ongoingcampaigns','categories'));
        $this->set('_serialize', ['upcomcampaigns']);


    }

    public function invest($slug = null)
    {
        $date = date('Y-m-d');
        $this->loadModel('Campaigns');
        $this->loadModel('Categories');
        $categories = $this->Categories->find('all', 
        ['conditions' => ['Categories.status' => '1']])->all()->toArray();
        $slugs = base64_decode($slug);
        $camp_status = 1;
        if(empty($slugs))
        {

        $campaigns = $this->Campaigns->find('all',[
                     'conditions' => ['Campaigns.status' => '1','Campaigns.live <=' => $date ,'Campaigns.end_date >=' => $date],
                     'order'   => ['Campaigns.id' => 'desc'],
                     'contain' => ['Users','Campaigncategories'=>['Categories'],'Deals','Organisations','Perks']
                     ])
                     ->matching('Users', function(\Cake\ORM\Query $q) use($camp_status) {
                        return $q->where(['Users.camp_status' => $camp_status]);
                    })->limit(9)->toArray();
        }else{
            $campaigns = $this->Campaigns->find('all',[
                        'conditions' => ['Campaigns.status' => '1'],
                        'order'   => ['Campaigns.id' => 'desc'],
                        'contain' => ['Users','Campaigncategories'=>['Categories'],'Deals','Organisations','Perks']
                        ])
                        ->matching('Users', function(\Cake\ORM\Query $q) use($camp_status) {
                            return $q->where(['Users.camp_status' => $camp_status]);
                        })
                        ->matching('Campaigncategories', function(\Cake\ORM\Query $q) use($slugs) {
                                return $q->where(['Campaigncategories.cat_id' => $slugs]);
                        })->limit(9)->toArray();
        }
            //   print_r($campaigns);
            //   exit;
        $this->set(compact('campaigns','categories'));
        $this->set('_serialize', ['campaigns']);

    }

    /**
     * Edit method
     *
     * @param string|null $id Product id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($idd = null)
    {
        $this->loadModel('Organisations');
        $organisations = $this->Organisations->find('all', 
        ['conditions' => ['Organisations.status' => '1']])->all()->toArray();

        $this->loadModel('Categories');
        $categories = $this->Categories->find('all', 
        ['conditions' => ['Categories.status' => '1']])->all()->toArray();

        $this->loadModel('Perks');
        $perks = $this->Perks->find('all', 
        ['conditions' => ['Perks.status' => '1']])->all()->toArray();

        $this->loadModel('Deals');
        $deals = $this->Deals->find('all', 
        ['conditions' => ['Deals.status' => '1']])->all()->toArray();
        
        $id = base64_decode($idd);
        $campaign = $this->Campaigns->get($id, [
            'contain' => ['Campaigncategories'=>['Categories'],'Deals','Organisations','Perks']
        ]);


        if ($this->request->is(['patch', 'post', 'put'])) { 
            
            $post = $this->request->data;
            if($this->request->data['image']['name'] != ''){ 

                $image = $this->request->data['image'];
                $name = time().$image['name'];
                $tmp_name = $image['tmp_name'];
                $upload_path = WWW_ROOT.'images/campaign/'.$name;
                move_uploaded_file($tmp_name, $upload_path);
                $post['image'] = $name;

            }else{
                unset($this->request->data['image']);
                $post = $this->request->data;
            }

            if($this->request->data['ppt_thumbnail']['name'] != ''){ 

                $ppt_thumbnail = $this->request->data['ppt_thumbnail'];
                $name = time().$ppt_thumbnail['name'];
                $tmp_name = $ppt_thumbnail['tmp_name'];
                $upload_path = WWW_ROOT.'images/campaign/'.$name;
                move_uploaded_file($tmp_name, $upload_path);
                $post['ppt_thumbnail'] = $name;

            }else{
                unset($this->request->data['ppt_thumbnail']);
                $post = $this->request->data;
            }

            $this->request->data['user_id'] = $this->Auth->user('id');
            $this->request->data['slug'] =$this->slugify($this->request->data['name']);

            $d = strtotime("+".$this->request->data['duration']." months",strtotime($this->request->data['live']));
            $end_date = date("Y-m-d",$d); 
            $post['end_date']    = $end_date;

            $campaign = $this->Campaigns->patchEntity($campaign, $post);

            if ($this->Campaigns->save($campaign)) {
                $this->loadModel('Campaigncategories');
                $this->Campaigncategories->deleteAll(['camp_id' => $id]);
                $campcat = $this->request->data['cat_id'];
                $post1 = array();
                for ($i = 0; $i < count($campcat); $i++) {
                    $post1['cat_id'] = $campcat[$i];
                    $post1['camp_id'] = $campaign->id;
                    $campcate = $this->Campaigncategories->newEntity();
                    $campcate = $this->Campaigncategories->patchEntity($campcate, $post1);
                    $this->Campaigncategories->save($campcate);
                }       
                $this->Flash->success(__('The campaign data has been updated.'));
                return $this->redirect(['controller' => 'users', 'action' => 'myaccount']);
            }
            $this->Flash->error(__('The campaign data could not be saved. Please, try again.'));
        }    
        $this->set(compact('campaign','organisations','categories','perks','deals'));
        $this->set('_serialize', ['campaign','organisations','categories','perks','deals']);
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
        $product = $this->Products->get($id);
        if ($this->Products->delete($product)) {
            $this->Flash->success(__('The product has been deleted.'));
        } else {
            $this->Flash->error(__('The product could not be deleted. Please, try again.'));
        }

        return $this->redirect(['controller'=>'users','action' => 'myproduct']);
    }


     
    
} 
