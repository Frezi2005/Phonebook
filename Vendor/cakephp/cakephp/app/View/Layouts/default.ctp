<?php
$this->loadHelper('Html');
$cakeDescription = 'CakePHP: the rapid development php framework';
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <?php

        echo $this->Html->css('layout');
        echo $this->Html->script('libraries/jquery-3.4.1-uncompressed.js');
        echo $this->Html->script('main');
        echo $this->Html->css('libraries/bootstrap.min.css');
        echo $this->Html->script('libraries/bootstrap.min.js');
        echo $this->Html->script('libraries/bootstrap.bundle.min.js');
        echo $this->Html->script('https://kit.fontawesome.com/c98a31cca4.js');
        echo $this->Html->script('https://cdn.jsdelivr.net/npm/sweetalert2@9');
        echo $this->Html->meta(array('name' => 'viewport', 'content' => "width=device-width, initial-scale=0.41, maximum-scale=1"));

        echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');

    ?>
    
</head>
<body>
    <div class="menu">
        <i class="fas fa-times close-menu"></i>
        <a href="home">Home</a>
        <a href="about">About</a>
        <a href="contact">Contact</a>
    </div>
    <nav>
        <div class="col-xl-10 col-lg-10 col-md-10 col-sm-10 mx-auto">
            <span class="logo my-auto"><?=$this->Html->image('logo.png', array('alt' => 'CakePHP'));?></span>
            <ul>
                <li><a href="home">Home</a></li>
                <li><a href="about">About</a></li>
                <li><a href="contact">Contact</a></li>
            </ul>  
            <i class="fas fa-bars hamburger-menu"></i>
        </div>
    </nav>
    
    <?php echo $this->fetch('content'); ?>

    <footer>
        <div class="col-xl-10 mx-auto">
            <span id="footer-text" class="mx-auto">Kamil Waniczek <?= date("Y"); ?> &copy; All rights reserved.</span>
        </div>        
    </footer>
</body>
</html>