<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 */

$cakeDescription = 'Project1';
?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?= $cakeDescription ?>:
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>

    <?= $this->Html->css('base.css') ?>
    <?= $this->Html->css('style.css') ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
</head>
<body>
    <nav class="top-bar expanded" data-topbar role="navigation">
        <ul class="title-area large-3 medium-4 columns">
            <li class="name">
                <!--<h1><a href=""><?= $this->fetch('title') ?></a></h1>-->
                <h1><?= $this->html->link(__('Dashboard') ,['controller' => 'Dashboard', 'action' => 'index']); ?></h1>
            </li>
        </ul>
        <div class="top-bar-section">
              <ul class="right">
                <?php
                  $session =  $this->request->session();
                  $menu  = "";
                  if(!empty($session)){
                    $menu .= "<li><a href='#'>My Account</a></li>";
                    $menu .= "<li>".$this->html->link('Logout', ['controller'=> 'Users', 'action' => 'logout'])."</li>";
                  }else{
                    $menu .= "<li><a href='#'>Members</a></li>";
                    $menu .= "<li><a href=''/project1/users/logout'>Products</a></li>";
                  }
                  echo $menu;
                  ?>
            </ul>
        </div>
    </nav>
    <?= $this->Flash->render() ?>
    <div class="container clearfix">
        <?= $this->fetch('content') ?>
    </div>
    <footer>
    </footer>
      <?= $this->Html->script('ds.js') ?>
</body>
</html>
