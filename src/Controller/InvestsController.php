<?php
namespace App\Controller;      

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



        $this->Auth->allow(['add','changestatus']);          

        $this->authcontent();    
    }
    
    
        public function orderhistory()
    {  
    		 $this->loadModel('Reviews');
         $uid = $this->Auth->user('id');
         if (empty($uid)) {      
            $this->redirect('/');
        }  
        
        $this->paginate = [
    	'contain' => ['Users','Products','Reviews'] ,'conditions'=>['Orders.uid'=>$this->Auth->user('id')],
    	'order'   => ['Orders.id' => 'desc'] 

        ];

        $yourorders = $this->paginate($this->Orders)->toArray();   
        //$review = $this->Reviews->find->all();
        $review = $this->Reviews->find('all', [
                    'conditions' => ['Reviews.user_id' => $this->Auth->user('id')]
                ])->all()->toArray();

       	// print_r($review) ;
        $this->set(compact('yourorders','review'));
        $this->set('_serialize', ['yourorders']); 
   
    }

 


    
        public function view($id = null)    
    {
        $order = $this->Orders->get($id, [
            'contain' => ['OrderItems'=>['Users','Products'],'Users']            
        ]);
 
        $this->set('order', $order); 
        $this->set('_serialize', ['order']);    
    }

    
      public function changestatus() {
        $a = $_POST['id'];
        if ($a == 0) {
            exit;
        }
        $d = explode('-', $a); 
        $user_id = $d[0];
        $order_id = $d[1];
        $order_status = $d[2];
        $data = $this->Orders->find('all', array('conditions' => array('Orders.id' => $order_id)));
        $data = $data->first();
        if($data){
            $this->Orders->updateAll(array('order_status' => $order_status), array('Orders.id' => $order_id));  
            
            $new_data = $this->Orders->find('all', array('conditions' => array('Orders.id' => $order_id)));
            
            $new_data = $new_data->first();      
//
//                $Email = new CakeEmail();
//                $Email->from('no-reply@rajdeep.crystalbiltech.com')
//                        ->to($new_data['Order']['email'])
//                        ->subject('Status Changed')
//                        ->template('orderstatus')
//                        ->emailFormat('html')
//                        ->viewVars(array('shop' => $new_data))
//                        ->send();
//      
         
        }


        exit;  
    }



   public function payment(){
        
        if(!$this->Auth->user('id')){
            $this->redirect('/');
        }
        
        
        /*********** Save Order  *********/
        
        $post = array();
        
        $post['user_id']        =   $this->Auth->user('id');
        $post['camp_id']        =   $this->request->data['camp_id'];
        $post['payment_mode']   =   $this->request->data['payment_mode'];
        $post['amount']         =   $this->request->data['amount'];
        $invests = $this->Invests->newEntity();
        $invests = $this->Invests->patchEntity($invests, $post);
        $invest = $this->Invests->save($invests);

        $price = $this->request->data['amount'];
        
        
        /*********** Save Order (END)  *********/

       // $returnUrl = Router::url('/', true);  
       // $ipnNotificationUrl = Router::url('/', true)."orders/ipn";

        //<input type=\"hidden\" name=\"return\" value=\"$returnUrl\">
        //<input type=\"hidden\" name=\"notify_url\" value=\"$ipnNotificationUrl\"> 
        
        if($invest){
            
            $invest_id = base64_encode($invest->id);
            $email = $this->Auth->user('email');
            echo ".<form name=\"_xclick\" action=\"https://www.sandbox.paypal.com/cgi-bin/webscr\" method=\"post\">
            <input type=\"hidden\" name=\"cmd\" value=\"_xclick\">
            <input type=\"hidden\" name=\"email\" value=\"$email\">
            <input type=\"hidden\" name=\"business\" value=\"rupak1-facilitator@avainfotech.com\">
            <input type=\"hidden\" name=\"currency_code\" value=\"USD\">
            <input type=\"hidden\" name=\"custom\" value=\"$invest->id\">
            <input type=\"hidden\" name=\"amount\" value=\"$price\">
            <input type=\"hidden\" name=\"return\" value=\"https://gurpreet.gangtask.com/crowdfunding/invests/success/$invest_id\">
            <input type=\"hidden\" name=\"notify_url\" value=\"https://gurpreet.gangtask.com/rentapp/invests/ipn\">
            </form>";
            echo "<script>document._xclick.submit();</script>";
        }        
        
    } 


    public function ipn() {  
        $fc = fopen('ipn_data.txt', 'wb');
        ob_start();
        print_r($_POST);
        $req = 'cmd=' . urlencode('_notify-validate');
        foreach ($_POST as $key => $value) {
            $value = urlencode(stripslashes($value));
            $req .= "&$key=$value";
        }
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'https://www.sandbox.paypal.com/cgi-bin/webscr');
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $req);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 1);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Host: www.developer.paypal.com'));
        $res = curl_exec($ch);
        curl_close($ch);
        if (strcmp($res, "VERIFIED") == 0) {
            $custom_field = $_POST['custom'];
            $payer_email = $_POST['payer_email'];
            $trn_id = $_POST['txn_id'];
            $pay = $_POST['mc_gross'];
            $this->loadModel('Orders');
            $this->Orders->query("UPDATE `orders` SET `order_status` = 1, `payment_status` = '$res',`transaction_id`='$trn_id' WHERE `id` ='$custom_field';");
            $this->set('smtp_errors', "none");
        } else if (strcmp($res, "INVALID") == 0) {
            
        } 
        $xt = ob_get_clean(); 
        fwrite($fc, $xt);
        fclose($fc);
        exit;
         
    }


public function success($invest_id = null){
        
        if(!$invest_id){
            $this->redirect('/');
        }
        $invest = $this->Invests->get(base64_decode($invest_id), [
            'contain' => ['Users','Campaigns'=>['Users']]
        ])->toArray();

        //print_r($invest);

        if(isset($_REQUEST['tx'])){ 
            $this->Invests->updateAll(array(
                'transaction_id' =>  $_REQUEST['tx'],
                'payment_status'        =>  $_REQUEST['st'],
            ),array(
                'Invests.id'             =>  $_REQUEST['cm']
            )); 

            $email = new Email('default');     
            $send = $email->from(['kuldeepjha@avainfotech.com' => 'Crowd Funding'])      
                   ->emailFormat('html')
                   ->template('investconfirmation')
                   ->cc('kuldeepjha@avainfotech.com') //admin email
                   ->cc($invest['campaign']['user']['email'])  // campaign user
                   ->to($invest['user']['email'])  // payment user
                   ->subject('New Investment')    
                   ->viewVars(array('invest' => $invest))          
                   ->send();    
            
            $response = 'success';
            
        }else{
            $response = 'error';
        }
        
        $this->set('invest', $invest);
        $this->set('_serialize', ['invest']);
        
        $this->set('response', $response);
        $this->set('_serialize', ['response']);
    }
    



   
}
