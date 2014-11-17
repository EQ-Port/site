<?php /* @var $this Controller */ ?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="ru" />

	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css" />

    <link rel="shortcut icon" href="<?php echo Yii::app()->request->baseUrl; ?>/icons/home.png" />

	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>
<body>
            <header>
                <div class="wrapper">
                    <div class="logo"><?php echo CHtml::encode(Yii::app()->name); ?></div>
                    <div class="user">
                        <div class="profile">   
                            <img src="images/users/b4c1bd0f111cd49b0164741b917f7589.jpg">
                            <div class="more">
                                <ul>
                                    <li><a href="#">Профиль</a></li>
                                    <li><a href="#">Настройки</a></li>
                                    <li><a href="#">Выйти</a></li>
                                </ul>
                            </div>
                        </div> 
                           <audio controls>
                            <source src="http://dl.zaycev.net/75549/3085770/nickelback_-_get_em_up_(zaycev.net).mp3" type="audio/mpeg">
                          </audio>                       
                    </div>
                </div>
            </header>
            <nav>
                <div class="wrapper">
                   <form class="search">
                        <input type="search" placeholder="поиск" autocomplete="off"/>
                    </form>
                    <?php $this->widget('zii.widgets.CMenu',array(
						'items'=>array(
							array('label'=>'Home', 'url'=>array('/site/index')),
							array('label'=>'About', 'url'=>array('/site/page', 'view'=>'about')),
							array('label'=>'Contact', 'url'=>array('/site/contact')),
							array('label'=>'Login', 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest),
							array('label'=>'Logout ('.Yii::app()->user->name.')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest)
						),
                        'htmlOptions' => array(
                            'class' => 'menu',
                        ),
					)); ?>
                </div>
            </nav>
            <div class="wrapper">
                <aside class="leftbar">
                    <div class="navigation">
        		<h3>Навигация</h3>
                    </div>
                    <div class="face">
        		<h3>Наши лица</h3>
                    </div>
                </aside>
                <div class="content">
                		<?php if(isset($this->breadcrumbs)):?>
							<?php $this->widget('zii.widgets.CBreadcrumbs', array(
								'links'=>$this->breadcrumbs,
							)); ?><!-- breadcrumbs -->
						<?php endif?>

						<?php echo $content; ?>
                </div>
            </div>
            <div class="clearfix"></div>
            <footer>
                <div class="wrapper">
                    <small id="copyright">© Радио EQUILIBRIUM 2009 - 2011</small>
                    		Copyright &copy; <?php echo date('Y'); ?> by My Company.<br/>
							All Rights Reserved.<br/>
							<?php echo Yii::powered(); ?>

                </div>
            </footer>
        <div id="overlay"></div>
        <div id="modal_window">
        	<div id="modal_close">X</div>
        	<div id="modal_content"></div>
        </div>
<?= CHtml::scriptFile('/assets/compiled/' . DesignHelper::o()->getJsHeaderFile()) ?>

<?= CHtml::scriptFile('/assets/compiled/' . DesignHelper::o()->getJsFooterFile()) ?>
<? Yii::app()->getClientScript()->registerCssFile('/assets/compiled/' . DesignHelper::o()->getCssFile()); ?>
	</body>
</html>
