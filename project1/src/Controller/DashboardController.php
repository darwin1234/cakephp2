<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Core\Configure;
use Cake\Http\Exception\ForbiddenException;
use Cake\Http\Exception\NotFoundException;
use Cake\View\Exception\MissingTemplateException;
use Cake\ORM\TableRegistry;

/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 *
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class DashboardController extends AppController
{

  public $helper  = array('Js');
  public $components = array(
          'RequestHandler'
      );

  public function initialized(){
    If (!$this->request->is('ajax')) {
      $this->loadComponent('Security');
      $this->loadComponent('Csrf');
    }
  }

  public function index(){

      $session =  $this->request->session();
      $role =   $session->read('role');

      $this->set('userRole', $role);

    //$this->set(compact('test'));
  }


  public function post(){
    $postArr = [];
    $counter = 0;
    $posts = TableRegistry::getTableLocator()->get('posts');
    $query = $posts->find();
    foreach ($query as $row) {
        $postArr[$counter]['userid'] = $row->userid;
        $postArr[$counter]['body'] = $row->body;
        $postArr[$counter]['id'] =  $row->id;
        $counter++;
    }
    echo json_encode($postArr);
    die();
  }

}
