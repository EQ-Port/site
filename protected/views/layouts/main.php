<?php /* @var $this Controller */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />

	<!-- blueprint CSS framework -->
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/screen.css" media="screen, projection" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/print.css" media="print" />
	<!--[if lt IE 8]>
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie.css" media="screen, projection" />
	<![endif]-->

	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css" />

	<link rel="stylesheet/less" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/style.less" />
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/css/less.min.js" type="text/javascript"></script>
    <link rel="shortcut icon" href="<?php echo Yii::app()->request->baseUrl; ?>/icons/home.png" />

	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>
<body>
            <header>
                <div class="wrapper">
                    <div class="logo"><?php echo CHtml::encode(Yii::app()->name); ?></div>
                    <span>EQUILIBRIUM</span> <span>Радио</span> 
                </div>
            </header>
            <nav>
                <div class="wrapper">
                   <form class="search">
                        <input type="search" placeholder="поиск" autocomplete="off"/>
                    </form>
                    <!-- <ul class="menu">
                        <li><a href="/">Главная</a></li>
                        <li><a href="#">Инфо-сервисы</a></li>
                        <li><a href="#">Форум</a></li>
                        <li><a href="#">Блоги ведущих</a></li>
                    </ul> -->
                    <?php $this->widget('zii.widgets.CMenu',array(
						'items'=>array(
							array('label'=>'Home', 'url'=>array('/site/index')),
							array('label'=>'About', 'url'=>array('/site/page', 'view'=>'about')),
							array('label'=>'Contact', 'url'=>array('/site/contact')),
							array('label'=>'Login', 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest),
							array('label'=>'Logout ('.Yii::app()->user->name.')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest)
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
                <aside class="rightbar">
                    <div class="user_panel">
                    	<h3>Авторизация</h3>
                    </div>
                    <div class="pr_right">
        		<h3>Реклама</h3>
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
