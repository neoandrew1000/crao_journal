<?php 
	defined( '_JEXEC' ) or die( 'Restricted access' );
	$doc = JFactory::getDocument();
	$this->addScript( 'templates/' . $this->template . '/js/animation.js', 'text/javascript');
	$this->addScript( 'templates/' . $this->template . '/js/buttons.js', 'text/javascript');
	$this->addScript( 'templates/' . $this->template . '/js/cards.js', 'text/javascript');
	$this->addScript( 'templates/' . $this->template . '/js/character_counter.js', 'text/javascript');
	$this->addScript( 'templates/' . $this->template . '/js/collapsible.js', 'text/javascript');
	$this->addScript( 'templates/' . $this->template . '/js/dropdown.js', 'text/javascript');
	$this->addScript( 'templates/' . $this->template . '/js/forms.js', 'text/javascript');
	$this->addScript( 'templates/' . $this->template . '/js/global.js', 'text/javascript');
	$this->addScript( 'templates/' . $this->template . '/js/hammer.min.js', 'text/javascript');
	$this->addScript( 'templates/' . $this->template . '/js/jquery.easing.1.3.js', 'text/javascript');
	$this->addScript( 'templates/' . $this->template . '/js/jquery.hammer.js', 'text/javascript');
	$this->addScript( 'templates/' . $this->template . '/js/leanModal.js', 'text/javascript');
	$this->addScript( 'templates/' . $this->template . '/js/materialbox.js', 'text/javascript');
	$this->addScript( 'templates/' . $this->template . '/js/parallax.js', 'text/javascript');
	$this->addScript( 'templates/' . $this->template . '/js/pushpin.js', 'text/javascript');
	$this->addScript( 'templates/' . $this->template . '/js/scrollFire.js', 'text/javascript');
	$this->addScript( 'templates/' . $this->template . '/js/scrollspy.js', 'text/javascript');
	$this->addScript( 'templates/' . $this->template . '/js/sideNav.js', 'text/javascript');
	$this->addScript( 'templates/' . $this->template . '/js/slider.js', 'text/javascript');
	$this->addScript( 'templates/' . $this->template . '/js/tabs.js', 'text/javascript');
	$this->addScript( 'templates/' . $this->template . '/js/toasts.js', 'text/javascript');
	$this->addScript( 'templates/' . $this->template . '/js/tooltip.js', 'text/javascript');
	$this->addScript( 'templates/' . $this->template . '/js/transitions.js', 'text/javascript');
	$this->addScript( 'templates/' . $this->template . '/js/velocity.min.js', 'text/javascript');
	$this->addScript( 'templates/' . $this->template . '/js/waves.js', 'text/javascript');
	$this->addStyleSheet( 'templates/' . $this->template . '/css/style.css' );
	$this->addStyleSheet( 'templates/' . $this->template . '/css/screen.css' );
	$this->addStyleSheet( 'templates/' . $this->template . '/css/print.css' );
	$this->addStyleSheet( 'templates/' . $this->template . '/css/materialize.css' );
	$this->addStyleSheet( 'templates/' . $this->template . '/css/ie.css' );
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" 
   xml:lang="<?php echo $this->language; ?>" lang="<?php echo $this->language; ?>" >
	<head>
		<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
		<jdoc:include type="head" />

		<!--WORK! WORK! WORK!-->

		<script type="text/javascript">
			$(document).ready(function(){
    			$('.collapsible').collapsible({
     				accordion : false // A setting that changes the collapsible behavior to expandable instead of the default accordion style
    			});
  			});
		</script>

		<!--WORK! WORK! WORK!-->

	</head>
	<body>
		<!--HEADER-->
		<div id="header" class="row">
			<div id="logotype" class="col s12 m6 l3 left valign-wrapper">
				<img class="valign" src="<?php echo $this->baseurl; ?>/templates/<?php echo $this->template; ?>/images/logo.gif">
				<jdoc:include type="modules" name="logotype" /> 
			</div><!--logotype.col-->
			<div id="login"  class="col s12 m6 l3 right">

			<!--WORK! WORK! WORK!-->
				<ul class="collapsible" data-collapsible="accordion">
    				<li>
      					<div class="collapsible-header"><i class="material-icons">filter_drama</i><?php echo JText::_('COM_CONTENT_LOGIN_BUTTON'); ?></div>
      					<div class="collapsible-body"><jdoc:include type="modules" name="login" /></div>
    				</li>
    			</ul>
			<!--WORK! WORK! WORK!-->

			</div><!--login.col-->		
		</div><!--header.row-->
		<!--END OF HEADER-->
		<!--MAIN-->
		<div id="main" class="row">
		<div id="aside" class="col s12 m4 l3 left">	
			<div id="menu">
				<jdoc:include type="modules" name="menu" /> 
			</div><!--menu-->	
			<div id="search">
				<jdoc:include type="modules" name="search" /> 
			</div><!--search-->		
		</div><!--aside.col-->
		<div id="content" class="col s12 m8 l9 right">
			<div id="breadcrumbs">
				<jdoc:include type="modules" name="breadcrumbs" /> 
			</div><!--breadcrumbs-->	
			<div id="article">
				<jdoc:include type="modules" name="content" />
				<jdoc:include type="component" />
			</div><!--article-->
		</div><!--content.col-->
		</div><!--main.row-->
		<!--END OF MAIN-->
		<!--FOOTER-->
		<div id="footer" class="row">
			<jdoc:include type="modules" name="footer" /> 	
			<jdoc:include type="modules" name="debug" /> 		
		</div><!--footer.row-->
		<!--END OF FOOTER-->
	</body>
</html>