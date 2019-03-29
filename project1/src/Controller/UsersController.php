<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\ORM\TableRegistry;
/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 *
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class UsersController extends AppController
{
	
	public function initialize(){
		parent::initialize();
		$this->loadModel('Feeds');
		$this->loadModel('Images');
		echo "test1231223";
	}
	

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
		
        $users = $this->paginate($this->Users);

        $this->set(compact('users'));
    }
	
	

    /**
     * View method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => []
        ]);

        $this->set('user', $user);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $this->set(compact('user'));
    }

    /**
     * Edit method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $this->set(compact('user'));
    }

    /**
     * Delete method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $user = $this->Users->get($id);
        if ($this->Users->delete($user)) {
            $this->Flash->success(__('The user has been deleted.'));
        } else {
            $this->Flash->error(__('The user could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function login(){
        $session =  $this->request->session();
        if($this->request->is('post')){
          $user = $this->Auth->identify();
          if($user){
              $this->Auth->setUser($user);
              $session->write('role',$user['usertype']);
			  $session->write('userid',$user['id']);
              return $this->redirect(['controller'=>'Dashboard']);
          }

          $this->Flash->error('Incorrect Login');
        }
		/* if ($this->request->is('post') || $this->request->query('provider')) {
            $user = $this->Auth->identify();
            if ($user) {
                $this->Auth->setUser($user);
                return $this->redirect($this->Auth->redirectUrl());
            }
            $this->Flash->error(__('Invalid username or password, try again'));
        }*/
    }

    public function logout()
    {
      $this->Flash->success('You are now logged out.');
      return $this->redirect($this->Auth->logout());
    }

    public function register(){
      $user = $this->Users->newEntity();
      if ($this->request->is('post')) {
          $user = $this->Users->patchEntity($user, $this->request->getData());
          if ($this->Users->save($user)) {
              $this->Flash->success(__('The user has been saved.'));

              return $this->redirect(['action' => 'index']);
          }
          $this->Flash->error(__('The user could not be saved. Please, try again.'));
      }
      $this->set(compact('user'));

    }

    public function forgotpassword(){

    }

    /*public function beforeFilter(Event $event) {
      parent::beforeFilter($event);
      $this->Auth->allow(['action' => 'register','forgotpassword']);
    }*/
	
	public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);
 
        $this->Auth->allow();
 
    }
	
	public function newpost(){
		
		if($this->request->is('post')){
			$newFeeds = $this->Feeds->newEntity();
			$feeds =  $this->request->getData('Feeds');
			$newFeeds->text = $feeds;
			if($this->Feeds->save($newFeeds))
			{
				echo "Successfully Added!";
				
			}else{
				echo "Server Error!";
			}
			die();
		}
	}
	
	public function JsonResult(){
		header('Content-Type: application/json');
		$Feeds = $this->Feeds->find()->order(['id' => 'DESC']);
		
		echo json_encode($Feeds);
		
		die();
		
	}
	
	public function uploadImage(){
		$image = $this->Images->newEntity();
		$session = $this->request->session();
		if($this->request->is('POST')){
			
			
			list($type, $data) = explode(';', $_POST['imageFile']);
			list(, $data) = explode(',', $data);
			$file_data = base64_decode($data);

			// Get file mime type
			$finfo = finfo_open();
			$file_mime_type = finfo_buffer($finfo, $file_data, FILEINFO_MIME_TYPE);

			// File extension from mime type
			if($file_mime_type == 'image/jpeg' || $file_mime_type == 'image/jpg')
				$file_type = 'jpeg';
			else if($file_mime_type == 'image/png')
				$file_type = 'png';
			else if($file_mime_type == 'image/gif')
				$file_type = 'gif';
			else 
				$file_type = 'other';

			// Validate type of file
			if(in_array($file_type, [ 'jpeg', 'png', 'gif' ])) {
				// Set a unique name to the file and save
				$file_name = uniqid() . '.' . $file_type;
				$image->imagename = $file_name;
				$image->userid = $session->read('userid'); 
				if($this->Images->save($image)){
					file_put_contents('./files/'.$file_name,  $file_data);
					echo "Success!";
				}
				//file_put_contents('./files/'.$file_name,  $file_data);
			}
			else {
				
				echo 'Error : Only JPEG, PNG & GIF allowed';
			}
			
		}

		
		die();
	}
}
