<?php
namespace App\Controller\Admin;     

use App\Controller\AppController;
use Cake\Event\Event;

use Cake\Core\Configure;

use Cake\Error\Debugger;  

/**
 * Frontbanners Controller
 *
 * @property \App\Model\Table\FrontbannersTable $Frontbanners
 *
 * @method \App\Model\Entity\Category[] paginate($object = null, array $settings = [])
 */
class FrontbannersController extends AppController
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
        $frontbanners = $this->Frontbanners->find('all', [
			'order' => ['Frontbanners.id' => 'desc']
		]);

		$frontbanners = $frontbanners->all()->toArray();


        $this->set(compact('frontbanners'));
        $this->set('_serialize', ['frontbanners']);
    }

    /**
     * View method
     *
     * @param string|null $id Category id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $post = $this->request->data; 
        $frontbanners = $this->Frontbanners->newEntity(); 
        if ($this->request->is('post')) {

            $frontbanners = $this->Frontbanners->newEntity();
            

            if(!empty($this->request->data['image'])) {
                
                $uniquename = time().uniqid(rand()).'.png';
                $upload_path = WWW_ROOT . 'images/website/' . $uniquename;
                $userimage = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $this->request->data['image']));
                $success = file_put_contents($upload_path, $userimage);
                $post['image']= $uniquename;
                $frontbanners = $this->Frontbanners->newEntity();                    
                $frontbanners = $this->Frontbanners->patchEntity($frontbanners,$post);            
                $this->Frontbanners->save($frontbanners);

                $this->Flash->success(__('Banner image has been added.'));  
                  return $this->redirect(['action' => 'index']);
                }

            

            // if(isset($this->request->data['image'])){
           
            //     for($i=0; $i<count($this->request->data['image']);$i++){
            //         $fileName = $this->request->data['image'][$i]['name'];
            //         $fileName = date('His') . $fileName;
            //         $uploadPath = WWW_ROOT.'images/website/'.$fileName; 
            //         $actual_file[] = $fileName;
            //         move_uploaded_file($this->request->data['image'][$i]['tmp_name'], $uploadPath);
            //         $post['image'] = $fileName;
            //         $frontbanners = $this->Frontbanners->newEntity();                    
            //         $frontbanners = $this->Frontbanners->patchEntity($frontbanners,$post);            
            //         $this->Frontbanners->save($frontbanners);
            //     } 
            //      $this->Flash->success(__('Banner image has been added.'));  
            //      return $this->redirect(['action' => 'index']);
            // }   
    }
        $this->set(compact('frontbanners'));
        $this->set('_serialize', ['frontbanners']);
    }


    public function desable($id = null) {
        $front = $this->Frontbanners->find('all', ['conditions' => ['Frontbanners.status' => '1']])->toArray();

        if(count($front)  <= 2)
        {
            $this->Flash->error(__('Minimum 2 banners need to be activated'));
        }else{
            $frontbanner = $this->Frontbanners->get($id);
            $post['status'] = 0;
            $frontbanner = $this->Frontbanners->patchEntity($frontbanner, $post);
                if ($this->Frontbanners->save($frontbanner)) {

                    $this->Flash->success(__('Deactivated successfully.'));

                } else {  

                    $this->Flash->error(__('Unable to Deactivated.'));

                }

        }
        
       return $this->redirect(['action' => 'index']);
   }

    public function enable($id = null) {

        $front = $this->Frontbanners->find('all', ['conditions' => ['Frontbanners.status' => '1']])->toArray();
        //echo count($front);
        //exit;

        if(count($front)  >= 4)
        {
            $this->Flash->error(__('You have reached the maximum limit i.e 4.'));
        }
        else{
            $frontbanner = $this->Frontbanners->get($id);
            $post['status'] = 1;
            $frontbanner = $this->Frontbanners->patchEntity($frontbanner, $post);
            if ($this->Frontbanners->save($frontbanner)) {
    
                $this->Flash->success(__('Activated successfully.'));
    
            } else {
    
                $this->Flash->error(__('Unable to activate.'));
    
            }
        }
        return $this->redirect(['action' => 'index']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Category id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */

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
        $frontbanners = $this->Frontbanners->get($id);

        if ($this->Frontbanners->delete($frontbanners)) {
            $this->Flash->success(__('The banner image has been deleted.'));
        } else {
            $this->Flash->error(__('The banner image could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }  
}
