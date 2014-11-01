<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

$cakeDescription = __d('cake_dev', 'CakePHP: the rapid development php framework');
$cakeVersion = __d('cake_dev', 'CakePHP %s', Configure::version())
?>
<!DOCTYPE html>
<html>
    <head>
    	<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
        <?php echo $this->Html->charset(); ?>
        <title>Omaha Science Fair</title>
        <?php
            echo $this->Html->meta('icon');
            echo $this->Html->css('bootstrap');
            echo $this->Html->script('jquery');
            echo $this->fetch('meta');
            echo $this->fetch('css');
            echo $this->fetch('script');
        ?>
        <style> 
        	.icon-spread{
        	   padding-left:10px; padding-right:10px
        	}
        	.icon-spread:hover {
        	   color:lightblue
        	}
        	div.menu h3 {
        	   display: inline-block;
        	}
        	div.menu a {
        	   display: inline-block;
        	   float: right;
        	   vertical-align: bottom;
        	   color: #FFFFFF;
        	}
        	div.menu {
        	   height: 60px;
        	}
        	div.menu img {
        	   vertical-align: top;
        	}
        	ul.menuItems {
        	    list-style-type: none !important;
        	    margin: 0;
                padding: 0;
                display: inline-block;
                float: right;
                width: 40%;
                height: 100%;
                margin-right: 14px;
        	}
        	ul.menuItems li {
                display: inline;
                width: 30px;
                height: 100%;
            }
            .header a:hover {
                text-decoration: none;
            }
            ul.menuItems li a {
                float: right;
                width: 6em;
                color: white;
                padding: 0.2em 0.6em;
                border-right: 1px solid white;
                text-align: center;
                height: 100%;
                font-weight: bold;
                padding-top: 20px;
            }
        </style>
    </head>
    <body>
        <div class="row menu" style="background-color:#38AA99;">
            <img src="<?php echo $this->webroot; ?>img/science.png" height="60px;" width="60px;"/ >
            <h3 class="header" style="color:#FFFFFF;">
                <?php echo $this->Html->link('Omaha Metro Area Science and Engineering Fair','/'); ?>
            </h3>
            <ul class="menuItems">
                <li><?php echo $this->Html->link('Logout','/users/logout'); ?></li>
                <li><?php echo $this->Html->link('Events','/events/'); ?></li>
                <li><?php echo $this->Html->link('Schools','/schools/'); ?></li>
                <li><?php echo $this->Html->link('Awards','/awards/'); ?></li>
                <li><?php echo $this->Html->link('Projects','/projects/'); ?></li>
                <li><?php echo $this->Html->link('Statuses','/statuses/'); ?></li>
                <li><?php echo $this->Html->link('Users','/users/'); ?></li>
                <li><?php echo $this->Html->link('Schools','/schools/'); ?></li>
                <li><?php echo $this->Html->link('Forms','/forms/'); ?></li>
            </ul>
        </div>
        <div class="container">
            <div class="row">
                <div>
                    <?php echo $this->Session->flash(); ?>
                    <?php echo $this->fetch('content'); ?>
                </div>
            </div>
            <div class="row" style="margin-top:20px;">
                <div class="col-md-5 col-md-offset-3" style="text-align:center;">
                	<a href="https://www.facebook.com/msefomaha"><i class="icon-spread fa fa-facebook fa-2x on fa-square-o"></i></a>
                	<a href="https://twitter.com/MSEFOmaha"><i class="icon-spread fa fa-twitter fa-2x on fa-square-o"></i></a>
                    <p>
                        Created as a University of Nebraska Capstone Project
                    </p>
                    
                </div>
            </div>
        </div>
    </body>
</html>
