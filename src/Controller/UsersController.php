<?php
namespace App\Controller;  

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\Routing\Router;
use Cake\Mailer\Email;
use Cake\Mailchimp\Mailchimp;
use Cake\Auth\DefaultPasswordHasher;

/**

 * Users Controller

 *

 * @property \App\Model\Table\UsersTable $Users

 *

 * @method \App\Model\Entity\User[] paginate($object = null, array $settings = [])

 */
class UsersController extends AppController {

    public function beforeFilter(Event $event) {

        parent::beforeFilter($event);



        $this->Auth->allow(['add', 'login', 'forgot', 'reset', 'contact',
            'newsletter','capchaverify' ,'gplogin','linkedinlogin', 'signup','fblogin','referearn',
            'invitecode','paymenthistory','emailverify','home']);  

        $this->authcontent();   
    } 

 
    /**

     * View method

     *

     * @param string|null $id User id.

     * @return \Cake\Http\Response|void

     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.

     */
    public function view($id = null) {

        $user = $this->Users->get($id, [

            'contain' => []
        ]);



        $this->set('user', $user);

        $this->set('_serialize', ['user']);
    }


    public function home()
    {
        $date = date('Y-m-d');
        $this->loadModel('Frontbanners');
        $this->loadModel('Categories');
        $this->loadModel('Campaigns');
        $this->loadModel('Users');
        $this->loadModel('Invests');

		$camp_status = 1;
		$users = $this->Users->find('all',[
			'conditions' => ['Users.role' => 'user','Users.status' => 1]
        ])->all()->toArray();
        
        $invest = $this->Invests->find('all',[])->toArray();

        $allcampaigns = $this->Campaigns->find('all',[
            'conditions' => ['Campaigns.status' => '1'],
            'order'   => ['Campaigns.id' => 'desc'],
            'contain' => ['Users','Campaigncategories'=>['Categories'],'Deals','Organisations','Perks']
            ])->toArray();

        $campaigns = $this->Campaigns->find('all',[
            'conditions' => ['Campaigns.status' => '1','Campaigns.live <=' => $date ,'Campaigns.end_date >=' => $date],
            'order'   => ['Campaigns.id' => 'desc'],
            'contain' => ['Users','Campaigncategories'=>['Categories'],'Deals','Organisations','Perks']
            ])
            ->matching('Users', function(\Cake\ORM\Query $q) use($camp_status) {
                return $q->where(['Users.camp_status' => $camp_status]);
            })
            ->limit(6)->toArray();

        $ongoingcampaigns = $this->Campaigns->find('all',[
            'conditions' => ['Campaigns.user_id' => $this->Auth->user('id') , 'Campaigns.status' => '1','Campaigns.live <=' => $date ,'Campaigns.end_date >=' => $date],
            'order'   => ['Campaigns.id' => 'desc'],
            'contain' => ['Users','Campaigncategories'=>['Categories'],'Deals','Organisations','Perks','Invests'=>['Users']]
            ])
            ->matching('Users', function(\Cake\ORM\Query $q) use($camp_status) {
                return $q->where(['Users.camp_status' => $camp_status]);
            })
            ->toArray();    


        $frontbanner = $this->Frontbanners->find('all', [
            'conditions' => ['Frontbanners.status' => '1'],
            'limit' => 4,
        ]);
        $frontbanners = $frontbanner->all()->toArray();

        $categories = $this->Categories->find('all', [
            'order' => ['Categories.id' => 'desc'],
            'limit' => 10,
        ]);
        $categories = $categories->all()->toArray();
        
        $this->set(compact('frontbanners','categories','campaigns','ongoingcampaigns','users','invest','allcampaigns' ));
        $this->set('_serialize', ['frontbanners','categories','campaigns','ongoingcampaigns','users','invest','allcampaigns']);
        
    }



    public function disable() {
        $response = array();
        $user = $this->Users->get($this->request->data['id']); 
        $post['camp_status'] = 0;
        $user = $this->Users->patchEntity($user, $post);
       if ($this->Users->save($user)) {
            $response['isSucess'] = "true";
       } else {  
            $response['isSucess'] = "false";
       }
        echo json_encode($response) ;
        exit;

   }



    /**

     * Add method

     *

     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.

     */
    public function add() {

        if ($this->Auth->user()) {

            return $this->redirect('/');
        }

        $user = $this->Users->newEntity();


        if ($this->request->is('post')) {

            $this->request->data['username'] = $this->request->data['email'];

            $post = $this->request->getData();   

            $post['status'] = '0';
            $post['role'] = 'user';  

            $user = $this->Users->patchEntity($user, $post);

            $new_user = $this->Users->save($user);

            if ($new_user) {

                if (isset($user)) { 
                    $burl = Router::fullbaseUrl();
                    $hash = md5(time() . rand(1000000, 999999));
                    $url = Router::url(['controller' => 'users', 'action' => 'emailverify'. '/' . $user->id . '/' . $hash]);
                    $this->Users->updateAll(array('tokenhash' => $hash), array('id' => $user->id));
                    $refer_link =  $burl . $url ; 
                     $email = new Email('default');   

                 $send = $email->from(['kuldeepjha@avainfotech.com' => 'Crowd Funding']) 
                        ->emailFormat('html')
                        ->template('invite')
                        ->to($user->email)
                        ->subject('Welcome to Crowd Funding')
                        ->viewVars(array('link' => $refer_link)) 
                        ->viewVars(array('user' => $user))    
                        ->send();   

                        
                        $this->Flash->success(__('Registration done successfully. We have sent a verification mail to your registered email address, Please verify your account. Please be patient, as it may take some time to reach your inbox.'));   
                    
                }
                
                
                

//                if (!filter_var($this->request->data['email'], FILTER_VALIDATE_EMAIL) === false) {
//
//                    $this->Auth->config('authenticate', [
//
//                        'Form' => ['fields' => ['username' => 'email', 'password' => 'password']]
//                    ]);
//                    $this->Auth->constructAuthenticate();
//                    $this->request->data['email'] = $this->request->data['email'];
//
//                }
//
//                $user = $this->Auth->identify();
//
//                if ($user) {
//                    $this->Auth->setUser($user);
//                  
//                  $this->Flash->success(__('You have been registered successfully.'));   
//                    return $this->redirect($this->Auth->redirectUrl());   
//                }
//    
            } else {

                $this->Flash->error(__('The user could not be saved. Please, try again.'));
            }
        }



        $this->set(compact('user'));

        $this->set('_serialize', ['user']);
    }
    
        public function emailverify ($user_id = null,$token = null){ 

           if(!empty($user_id)){

             $useractive = $this->Users->find('all',['conditions'=>['Users.id'=>$user_id]]);
             
             $useractive = $useractive->first();
             if($useractive['status']==1){
               return $this->redirect(['controller' => 'users', 'action' => 'login']);      
             }
             
             if($useractive['tokenhash'] ==  $token){  
             $this->Users->updateAll(array('tokenhash' =>' ','status'=>1), array('id' => $user_id));    
             $this->Flash->success(__('Your account has been activated, go for login.'));  
              return $this->redirect(['controller' => 'users', 'action' => 'login']);      
             }else{ 
             $this->Flash->error(__('Token has been expired. Please, try again.'));        
             } 
               
           }
        }
        
        public function signup() {

        $response = array();

        $user = $this->Users->newEntity();

        if ($this->request->is('post')) {

            if ($this->request->data['name'] == '' || $this->request->data['email'] == '' || $this->request->data['password1'] == '' || $this->request->data['password'] == '') {
                $response['isSucess'] = "false";
                $response['msg'] = "<div class='alert alert-danger'><strong>Please fill all the fields</strong></div>";
            } else if ($this->request->data['password1'] != $this->request->data['password']) {
                $response['isSucess'] = "false";
                $response['msg'] = "<div class='alert alert-danger'><strong>Password and confirm password does not match.</strong></div>";
            } else {

                $user_check = $this->Users->find('all', ['conditions' => ['Users.email' => $this->request->data['email']]]);
                $user_check = $user_check->first();
                if (!empty($user_check)) {
                    $response['isSucess'] = "false";
                    $response['msg'] = "<div class='alert alert-danger'><strong>Email address already exists. Please try with another Email Address..</strong></div>";
                } else {

                    $post = $this->request->data;

                    $post['status'] = '1';
                    $post['role'] = 'user';
                    $post['name'] = $post['name'];
                    $post['username'] = $post['email'];

                    $user = $this->Users->patchEntity($user, $post);
                    $new_user = $this->Users->save($user);
                      
                     // generate refferal code
                        $user_referral_code =  substr($post['email'],0,3).rtrim(strtr(base64_encode($new_user->id), '+/', '-_'), '=');  
                        $this->Users->updateAll(['refer_code' =>  $user_referral_code], ['id' => $new_user->id]);
                    if ($new_user) {
                        $ms = 'A new user has been registered recently with email address <strong>' . $post['email'] . '</strong>';

                        $ms .= '<br>';

                        $ms .= '<table border="0"><tr><th scope="row" align="left">Name</th><td>' . $post['name'] . '</td></tr><tr><th scope="row" align="left">Email</th><td>' . $post['email'] . '</td></tr></table>';

                         $email = new Email('default');
                         $email->from(['kuldeepjha@avainfotech.com' => 'Crowd Funding'])  
                         	->emailFormat('html')
                         	->template('default', 'default')
                         	->to($new_user->email)
                         	->subject('New User Registration')
                         	->send($ms);
                        $currentuser = $this->Users->find('all', ['conditions' => ['Users.id' => $new_user->id]]);
                        $currentuser = $currentuser->first();
                        $this->Auth->setUser($currentuser);     
                        $response['isSucess'] = "true";
                        $response['msg'] = "<div class='alert alert-success'><strong>Registered Successfully.</strong></div>";
                    }
                }
            }
        }

        echo json_encode($response);
        exit;
    }  

    public function myaccount(){
      $uid =  $this->Auth->user('id');
      if($uid){
        $userdata  = $this->Users->find('all',array('conditions'=>array('Users.id'=>$uid)));
        $userdata  = $userdata->first();
      }else {
       return $this->redirect(['controller' => 'stores', 'action' => 'index']);    
      }
         $this->set(compact('userdata'));
        $this->set('_serialize', ['userdata']);
      
    }

    

    public function mycampaign($slug = null){    
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
        $upcomcampaigns = $this->Campaigns->find('all',[
                     'conditions' => ['Campaigns.user_id' => $this->Auth->user('id') , 'Campaigns.status' => '1','Campaigns.live >' => $date],
                     'order'   => ['Campaigns.id' => 'desc'],
                     'contain' => ['Users','Campaigncategories'=>['Categories'],'Deals','Organisations','Perks','Invests'=>['Users']]
                     ])
                     ->matching('Users', function(\Cake\ORM\Query $q) use($camp_status) {
                        return $q->where(['Users.camp_status' => $camp_status]);
                    })
                     ->toArray();

        $pastcampaigns = $this->Campaigns->find('all',[
                    'conditions' => ['Campaigns.user_id' => $this->Auth->user('id') , 'Campaigns.status' => '1','Campaigns.end_date <=' => $date],
                    'order'   => ['Campaigns.id' => 'desc'],
                    'contain' => ['Users','Campaigncategories'=>['Categories'],'Deals','Organisations','Perks','Invests'=>['Users']]
                    ])
                    ->matching('Users', function(\Cake\ORM\Query $q) use($camp_status) {
                        return $q->where(['Users.camp_status' => $camp_status]);
                    })
                    ->toArray();

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
            $upcomcampaigns = $this->Campaigns->find('all',[
                        'conditions' => ['Campaigns.user_id' => $this->Auth->user('id') , 'Campaigns.status' => '1','Campaigns.live >=' => $date],
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

            $pastcampaigns = $this->Campaigns->find('all',[
                        'conditions' => ['Campaigns.user_id' => $this->Auth->user('id') , 'Campaigns.status' => '1','Campaigns.end_date <=' => $date],
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
        $this->set(compact('upcomcampaigns','pastcampaigns','ongoingcampaigns','categories'));
        $this->set('_serialize', ['upcomcampaigns']);

       
      }

      public function paymentdetails(){

      }

      public function document(){

        $id = $this->Auth->user('id');
        if($id){
            $user = $this->Users->get($id, [
            'contain' => []
        ]);
 
         if ($this->request->is(['patch', 'post', 'put'])) {
  
             $post = $this->request->data;
 
                 if ($this->request->data['document']['name'] != '') {
 
                     if ($user->document != '') {
                         unlink(WWW_ROOT . 'images/users/documents/' . $user->document);
                     }
 
                     $document = $this->request->data['document'];
                     $name = time() . $document['name'];
                     $tmp_name = $document['tmp_name'];
                     $upload_path = WWW_ROOT . 'images/users/documents/' . $name;
                     
                     move_uploaded_file($tmp_name, $upload_path);
                     $post['document'] = $name;
                 } else {
                     unset($this->request->data['document']);
                     $post = $this->request->data;
                 }
 
             $user = $this->Users->patchEntity($user, $post);
 
             if ($this->Users->save($user)) {
 
                 $this->Flash->success(__('Your documents and links has been updated successfully.'));
                 return $this->redirect(['controller' => 'users', 'action' => 'myaccount']);  
 
             } else {
 
                 $this->Flash->error(__('The documents and links could not be saved. Please, Try Again.'));
             }
         }
 
            
        }else{
            $this->Flash->error(__('Please login to the website in order to have access to the request.'));  
           return $this->redirect(['controller' => 'users', 'action' => 'home']);    
        } 
 
         $this->set(compact('user'));
 
         $this->set('_serialize', ['user']);

    }
    
     

    /**

     * Edit method

     *

     * @param string|null $id User id.

     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.

     * @throws \Cake\Network\Exception\NotFoundException When record not found.

     */
    public function edit() {
        
        $id = $this->Auth->user('id');
       if($id){
          
              $user = $this->Users->get($id, [

            'contain' => []
        ]);

        if ($this->request->is(['patch', 'post', 'put'])) {
 
            $post = $this->request->data;

                if ($this->request->data['image']['name'] != '') {

                    if ($user->image != '') {
                        unlink(WWW_ROOT . 'images/users/' . $user->image);
                    }

                    $image = $this->request->data['image'];
                    $name = time() . $image['name'];
                    $tmp_name = $image['tmp_name'];
                    $upload_path = WWW_ROOT . 'images/users/' . $name;
                    move_uploaded_file($tmp_name, $upload_path);

                    $post['image'] = $name;
                } else {
                    unset($this->request->data['image']);
                    $post = $this->request->data;
                }

            $user = $this->Users->patchEntity($user, $post);

            if ($this->Users->save($user)) {

                $this->Flash->success(__('Your profile has been updated successfully.'));
                return $this->redirect(['controller' => 'users', 'action' => 'myaccount']);  

            } else {

                $this->Flash->error(__('The user could not be saved. Please, Try Again.'));
            }
        }

           
       }else{
           $this->Flash->error(__('Please login to the website in order to have access to the request.'));  
          return $this->redirect(['controller' => 'users', 'action' => 'home']);    
       } 

        $this->set(compact('user'));

        $this->set('_serialize', ['user']);
    }

    /**

     * Delete method

     *

     * @param string|null $id User id.

     * @return \Cake\Http\Response|null Redirects to index.

     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.

     */
    public function delete($id = null) {

        $this->request->allowMethod(['post', 'delete']);

        $user = $this->Users->get($id);

        if ($this->Users->delete($user)) {

            $this->Flash->success(__('The User Has Been Deleted.'));
        } else {

            $this->Flash->error(__('The User Could Not Be Deleted. Please, Try Again.'));
        }



        return $this->redirect(['action' => 'index']);
    }
    
    
    
    
    
    
    public function login() {

    if(empty($this->Auth->user('id'))){
        
        
        if ($this->request->is('post')) {  

             $oldsession = $this->request->session()->id();    
  
            $this->request->session()->delete('user_id');    

            if ($this->request->data['username'] == '') {
                $this->Flash->error(__('Please enter your Email Address!'));
            
            } else if ($this->request->data['password'] == '') { 
                $this->Flash->error(__('Please enter your Password!'));
             
            } else {

                if (!filter_var($this->request->data['username'], FILTER_VALIDATE_EMAIL) === false) {

                    $this->Auth->config('authenticate', [

                        'Form' => ['fields' => ['username' => 'email', 'password' => 'password']]
                    ]);

                    $this->Auth->constructAuthenticate();

                    $this->request->data['email'] = $this->request->data['username'];

                    unset($this->request->data['username']);
                }

                $user = $this->Auth->identify();
                if ($user) {         
                    if ($user['status'] == 0) {   
                        $this->Auth->logout();
                       $this->Flash->error(__('You are not active Yet!'));
                      
                    } else {
                        $this->Auth->setUser($user);  
                        $updatenewsession = $this->request->session()->id();
                        if ($this->Auth->user('role') == 'admin') {
                            //$this->Auth->logout();
                            $this->Flash->success(__('Your Role Is Admin'));
                            return $this->redirect(['prefix' => 'admin','controller' => 'dashboard', 'action' => 'index']);  
                          
                        } else {
                             
                            $this->Flash->success(__('Logged In Successfully')); 
                            return $this->redirect(['controller' => 'users', 'action' => 'myaccount']);  
                        }
                    }
                } else {
                    $this->Flash->error(__('Invalid email address & Password'));

                }
            }

        } 
        }else{
           return $this->redirect(['controller' => 'users', 'action' => 'login']);  
        }
        $this->set(compact('response'));

        $this->set('_serialize', ['response']);
    }

    public function logout() {  
         $this->request->session()->delete('sociallogin');  
        if ($this->Auth->logout()) {

            return $this->redirect('/');
        }
    }

    public function forgot() {
        if ($this->Auth->user('id')) {  
            $this->redirect('/');
        }


        if ($this->request->is('post')) {

            $email = $this->request->data['email'];



            $user = $this->Users->find('all', ['conditions' => ['Users.email' => $email]]);

            $user = $user->first();

            $burl = Router::fullbaseUrl();

            if (empty($user)) {

                $this->Flash->error(__('Enter regsitered email address to reset you password'));
            } else {

                if ($user->email) {

                    $hash = md5(time() . rand(1000000, 999999));

                    $url = Router::url(['controller' => 'users', 'action' => 'reset' . '/' . $hash]);



                    $this->Users->updateAll(array('tokenhash' => $hash), array('id' => $user->id));
                    
                    $refer_link =  $burl . $url ; 
                     $email = new Email('default');

                 $send = $email->from(['kuldeepjha@avainfotech.com' => 'Crowd Funding']) 
                        ->emailFormat('html')
                        ->template('forgot')
                        ->to($user->email)
                        ->subject('Reset Your Password')
                        ->viewVars(array('link' => $refer_link)) 
                        ->viewVars(array('user' => $user))  
                        ->send();  

                    $this->Flash->success(__('Check your email to reset your Password'));
                } else {

                    $this->Flash->error(__('Email Is Invalid'));
                }
            }
        }
    }

    public function reset($token) {

        $query = $this->Users->find('all', ['conditions' => ['Users.tokenhash' => $token]]);
        $data = $query->first();
        if ($data) {
            if ($this->request->is(['patch', 'post', 'put'])) {
                if ($this->request->data['password1'] != $this->request->data['password']) {
                    $this->Flash->success(__('New password & confirm password does not match!'));
                    return;
                    //$this->redirect(['action' => 'reset/' . $token]);
                }
                $this->request->data['tokenhash'] = md5(time() . rand(1000000, 999999));
                $user = $this->Users->get($data->id, [
                    'contain' => []
                ]);
                $user = $this->Users->patchEntity($user, $this->request->getData());  

                if ($this->Users->save($user)) {
                    $this->Flash->success(__('Your password has been changed'));
                    return;
                    //$this->redirect(['action' => 'reset/' . $token]);
                } else {
                    $this->Flash->success(__('Invalid Password, try again'));
                    return;
                    //$this->redirect(['action' => 'reset/' . $token]);
                }
            }
        } else {
            $this->Flash->success(__('Invalid Token, Try Again'));
            return;
        }
        $this->set(compact('response'));
        $this->set('_serialize', ['response']);
    }

    public function changepassword() {
        $id = $this->Auth->user('id');

        $user = $this->Users->get($id, [
            'contain' => []
        ]);

        if ($this->request->is(['patch', 'post', 'put'])) {
            if (isset($this->request->data['password1'])) {
                if ($this->request->data['password'] != $this->request->data['password1']) {
                    $this->Flash->error(__('New and confirm password does not match'));
                    return;
                }
            }
            if ((new DefaultPasswordHasher)->check($this->request->data['opassword'], $user['password'])) {
                $user = $this->Users->patchEntity($user, $this->request->data);
                if ($this->Users->save($user)) {
                    $this->Flash->success(__('Password Changed Successfully'));

                    if (isset($_GET['route'])) {
                        return $this->redirect(['action' => 'edit', $id]);
                    } else {
                        return $this->redirect(['action' => 'changepassword']);
                    }
                } else {
                    $this->Flash->error(__('Invalid Password, Try again'));
                    if (isset($_GET['route'])) {
                        return $this->redirect(['action' => 'edit', $id]);
                    } else {
                        return $this->redirect(['action' => 'changepassword']);
                    }
                }
            } else {
                $this->Flash->error(__('Old Password did not match'));
                if (isset($_GET['route'])) {
                    return $this->redirect(['action' => 'edit', $id]);
                } else {
                    return $this->redirect(['action' => 'changepassword']);
                } 
            }
        }
    }

    public function referearn() {
       $id = $this->Auth->user('id');
       
       if($this->request->is('post')){
           $email1 = $this->request->data['email'];
           $refer_link = $this->request->data['refer_link'];

            if(!empty($email1)){ 

                 $email = new Email('default');

                 $send = $email->from(['kuldeepjha@avainfotech.com' => 'Crowd Funding']) 
                        ->emailFormat('html')
                        ->template('invite')
                        ->to($email1)
                        ->subject('Registration Invite Code!')
                        ->viewVars(array('link' => $refer_link)) 
                        ->viewVars(array('email' => $email1))  
                        ->send();
                  if($send){
                      $this->Flash->success(__('Successfully Sent!'));
                  }else{
                   $this->Flash->error(__('Try Again!')); 
                  } 
            }
           
        }
       $query = $this->Users->find('all', ['conditions' => ['Users.id' => $id]]);
       $user = $query->first();
       
        $this->set('user',$user); 
        $this->set('_serialize', ['user']);

      
    }
    
    public function invitecode($invitecode = null) {    

       
    }
 
    public function contact() {  


        $this->loadModel('Contacts');

        $contact = $this->Contacts->newEntity();
        if ($this->request->is('post')) {
            $contact = $this->Contacts->patchEntity($contact, $this->request->getData());
            if ($this->Contacts->save($contact)) {

                $ms = '<table width="200" border="1"><tr><th scope="row">Name</th><td>' . $this->request->data['name'] . '</td></tr><tr><th scope="row">Email</th><td>' . $this->request->data['email'] . '</td></tr><tr><th scope="row">Subject</th><td>' . $this->request->data['subject'] . '</td></tr><th scope="row">Message</th><td>' . $this->request->data['message'] . '</td></tr></table>';


                $email = new Email('default');

                $email->from(['kuldeepjha@avainfotech.com' => 'Crowd Funding'])
                        ->emailFormat('html')
                        ->template('default', 'default')
                        ->to('kuldeepjha@avainfotech.com')
                        ->subject('Contact Us Enquiry')
                        ->send($ms);


                $this->Flash->success(__('Your Enquiry has been sent successfully.'));
            } else {
                $this->Flash->error(__('The contact could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('contact'));
        $this->set('_serialize', ['contact']);
    }
    
     public function investhistory() {
         $this->loadModel('Invests');
         $uid = $this->Auth->user('id');
         if (empty($uid)) {      
            $this->redirect('/');
        }
       
      $invest = $this->Invests->find('all',[
          'conditions'=>['Invests.user_id'=>$uid],
          'contain' => ['Campaigns'] ]);  
          
      $investhistory = $invest->all(); 
    //   print_r($investhistory);
    //   exit;
        $this->set(compact('investhistory'));
        $this->set('_serialize', ['investhistory']);  
        
     }    
   /***********Newsletter*****************/

    public function newsletter() {
        // include(ROOT.'/Mailchimp/Mailchimp.php'); 
         require ROOT.'/vendor/jhut89/mailchimp3php/src/mailchimpRoot.php';
        //ashu $api_key = "35833bae8881ce0ecced3fc3daa81482-us14";    
        //ashu $list_id = "1a2fe1e7c5";
        $list_id = "15aa663281";  

      $post_params = ['email_address'=>$_POST['email'], 'status'=>'subscribed'];

       $subscriber =  $mailchimp->lists($list_id)->members()->POST($post_params);  

       // $subscriber = $Mailchimp_Lists->subscribe($list_id, array('email' => htmlentities($_POST['email'])));
        if (!empty($subscriber->id)) {  
            echo "success";
        } else {
            echo "fail";
        }
        exit;
    }


  //////////// Fb login /////////////////

  public function fblogin() {
    $response = array();
    //print_r($this->request->data); exit;
    if (isset($this->request->data['action']) && $this->request->data['action'] == "fblogin") {
        $results = $this->Users->find('all', ['conditions' => ['Users.email' => $this->request->data['myid']['email']]]);
        $results = $results->first();
        if (!empty($results)) {
            if ($results->fb_id != '') {
                $this->Auth->setUser($results);
                $response['isSuccess'] = 'true';
                $response['msg'] = 'Logged in successfully';
            } else {
                $response['isSuccess'] = 'false';
                $response['msg'] = 'Please Logged in using your credentials.';
            }
        } else {
            $post = array();
            $post['fb_id'] = $this->request->data['myid']['id'];
            $post['name'] = $this->request->data['myid']['first_name'];
            $post['last_name'] = $this->request->data['myid']['last_name'];
            $post['email'] = $this->request->data['myid']['email'];
            $post['password'] = 'zxswedcxswz';
            $post['status'] = '1';
            $post['role'] = 'user';
            $user = $this->Users->newEntity();
            $user = $this->Users->patchEntity($user, $post);
            $new_user = $this->Users->save($user);
            if ($new_user) {
                $this->request->data['username'] = $this->request->data['myid']['email'];
                $this->request->data['password'] = 'zxswedcxswz';
                if (!filter_var($this->request->data['username'], FILTER_VALIDATE_EMAIL) === false) {
                    $this->Auth->config('authenticate', [
                        'Form' => ['fields' => ['username' => 'email', 'password' => 'password']]
                    ]);
                    $this->Auth->constructAuthenticate();
                    $this->request->data['email'] = $this->request->data['username'];
                    unset($this->request->data['username']);
                }
                $user2 = $this->Auth->identify();
                if ($user2) {
                    $this->Auth->setUser($user2);
                    $response['isSuccess'] = 'true';
                    $response['msg'] = 'success_login';
                } else {
                    $response['isSuccess'] = 'false';
                    $response['msg'] = 'Error in Signing in. Please Try Again.';
                }
            }
        }
    }
    //$response['msg'] = $this->getLanguage($response['msg']);
    echo json_encode($response);
    exit;
}

 //////////// Linked in  login /////////////////
public function linkedinlogin() {
    $response = array();
   // print_r($this->request->data['myid']['emailAddress']); 
    if (isset($this->request->data['action']) && $this->request->data['action'] == "linkedinlogin") {
        $results = $this->Users->find('all', ['conditions' => ['Users.email' => $this->request->data['myid']['emailAddress']]]);
        $results = $results->first();
        if (!empty($results)) {
            if ($results->linked_id != '') {
                $this->Auth->setUser($results);
                $response['isSuccess'] = 'true';
                $response['msg'] = 'Logged in successfully';
            } else {
                $response['isSuccess'] = 'false';
                $response['msg'] = 'Please Logged in using your credentials.';
            }
        } else {
            $post = array();
            $post['linked_id'] = $this->request->data['myid']['id'];
            $post['name'] = $this->request->data['myid']['firstName'];
            $post['last_name'] = $this->request->data['myid']['lastName'];
            $post['email'] = $this->request->data['myid']['emailAddress'];
            $post['password'] = 'zxswedcxswz';
            $post['status'] = '1';
            $post['role'] = 'user';
            $post['username'] = $this->request->data['myid']['emailAddress'];
            $user = $this->Users->newEntity();
            $user = $this->Users->patchEntity($user, $post);
            $new_user = $this->Users->save($user);
            if ($new_user) {
                $this->request->data['username'] = $this->request->data['myid']['emailAddress'];
                $this->request->data['password'] = 'zxswedcxswz';
                if (!filter_var($this->request->data['username'], FILTER_VALIDATE_EMAIL) === false) {
                    $this->Auth->config('authenticate', [
                        'Form' => ['fields' => ['username' => 'email', 'password' => 'password']]
                    ]);
                    $this->Auth->constructAuthenticate();
                    $this->request->data['email'] = $this->request->data['username'];
                    unset($this->request->data['username']);
                }
                $user2 = $this->Auth->identify();
                if ($user2) {
                    $this->Auth->setUser($user2);
                    $response['isSuccess'] = 'true';
                    $response['msg'] = 'success_login';
                    print_r($response);
                } else {
                    $response['isSuccess'] = 'false';
                    $response['msg'] = 'Error in Signing in. Please Try Again.';
                    print_r($response);
                }
            }
        }
    }
    //$response['msg'] = $this->getLanguage($response['msg']);
    echo json_encode($response);
    exit;
}


}
