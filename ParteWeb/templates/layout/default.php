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
 * @var \App\View\AppView $this
 */

$cakeDescription = 'CakePHP: the rapid development php framework';
?>
<!DOCTYPE html>
<html>

<head>
  <?= $this->Html->charset() ?>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@docsearch/css@3">
  <link rel="canonical" href="https://getbootstrap.com/docs/5.3/examples/navbars/">
  <link href="../assets/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <title>
    <?= $cakeDescription ?>:
    <?= $this->fetch('title') ?>
  </title>
  <?= $this->Html->meta('icon') ?>

  <?= $this->Html->css(['normalize.min', 'milligram.min', 'fonts', 'cake']) ?>
  <?= $this->Html->css(['normalize.min', 'milligram.min', 'fonts', 'cake', 'custom']) ?>


  <?= $this->fetch('meta') ?>
  <?= $this->fetch('css') ?>
  <?= $this->fetch('script') ?>

</head>

<body>
  <nav class="navbar navbar-expand-lg bg-body-tertiary">
    
    <div class="container-fluid">
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div>
          <a href="index.php" class="d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none">
          
          </a>
        </div>
      <div class="collapse navbar-collapse" id="navbarScroll">
        
        <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;">

        
          <li class="nav-item">
            <a class="nav-link active font-weight-bold" aria-current="page"><?= $this->Html->link(__('Recomendaciones'), ['controller' => 'tips', 'action' => 'index'], ['class' => 'dropdown-item']) ?></a>
          </li>
          <li class="nav-item">
            <a class="nav-link active font-weight-bold" aria-current="page"><?= $this->Html->link(__('Puntos de reciclaje'), ['controller' => 'recycling_centers', 'action' => 'index'], ['class' => 'dropdown-item']) ?></a>
          </li>
        </ul>
        <div>
          <a class="nav-link active font-italic" aria-current="page"><?= $this->Html->link(__('E-Recycle'), ['controller' => 'users', 'action' => 'index'], ['class' => 'dropdown-item']) ?></a>
        </div>
        <div>
          <a href="index.php" class="d-flex align-items-center mb-2 p-3 mb-lg-0 text-white text-decoration-none">
            <img src="https://i.postimg.cc/9fCgWvV5/logo1.png" class="bi me-2" width="70" height="70" ></a>

        </div>
        
      </div>
    </div>
  </nav>



  <main class="main">
    <div class="container">
      <?= $this->Flash->render() ?>
      <?= $this->fetch('content') ?>
    </div>
  </main>
  <footer>
  </footer>
</body>

</html>