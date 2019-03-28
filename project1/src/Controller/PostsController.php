<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;

class PostsController extends AppController
{
	public function initialize(){
		parent::initialize();
		$this->loadModel('posts');
	}
	public function index(){
		
		$post = "";
		if($this->request->is('post')){
			$post = new $this->posts->newEntity($this->request->data);
			$filename =  $this->request->data['image']['name'];
			$post->body = "test";
			
			if($this->posts->save($post)){
				echo "Added!";
			}
		}
			
	}
	
	
}