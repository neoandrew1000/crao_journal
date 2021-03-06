<?php 
	defined( '_JEXEC' ) or die( 'Restricted access' );
	$doc = JFactory::getDocument();
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
		<jdoc:include type="head" />
	</head>
	<body>
		<!--HEADER-->
		<div id="header" class="row">
			<div id="logotype">
			</div><!--logotype.col-->
			<div id="login">
			</div><!--login.col-->		
		</div><!--header.row-->
		<!--END OF HEADER-->
		<!--MAIN-->
		<div id="main" class="row">
		<div id="aside">	
			<div id="menu">
			</div><!--menu-->	
			<div id="search">
			</div><!--search-->		
		</div><!--aside.col-->
		<div id="content">
			<div class="breadcrumbs">
			</div><!--breadcrumbs-->	
			<div id="article">
			</div><!--article-->
		</div><!--content.col-->
		</div><!--main.row-->
		<!--END OF MAIN-->
		<!--FOOTER-->
		<div id="footer" class="row">			
		</div><!--footer.row-->
		<!--END OF FOOTER-->
	</body>
</html>