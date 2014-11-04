<?php
/**
 * Default layout page
 * CakePHP Version:  CakePHP 2.5.5
 */

$Description = __d('cake_dev', 'WorkGroup | Sistemas para Oficinas e Autopeças');

?>
<!DOCTYPE html>
<html>
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php echo $Description ?>:
		<?php echo $this->fetch('title'); ?>
	</title>

	<?php
		echo $this->Html->meta('icon');
		echo $this->Html->meta('description', 'O software para gestão de oficinas autopeças e frotas Workmotor, Workmotor, Workmotor é um programa completo para controle e gerenciamento de manutenção de veículos frotas autopeças e oficinas');
		echo $this->Html->meta('keywords', 'software gestão oficinas autopeças frotas programa controle gerenciamento manutenção de veículos frotas autopecas programa oficina mecânica');
		echo $this->Html->meta(array('name' => 'language', 'content' => 'Portuguese'));
		echo $this->Html->meta(array('name' => 'Robots', 'content' => 'All'));
		echo $this->Html->meta(array('name' => 'Revisit', 'content' => '7 days'));
		echo $this->Html->meta(array('name' => 'Author', 'content' => 'WorkGroup'));
		echo $this->Html->meta(array('name' => 'google-site-verification', 'content' => 'bAGhvWxU55dhKndhZVMSqLXS_D5fsdMGM3K6d6OgWNQ'));
		
		echo $this->Html->css('cake.generic');	// estilo de normalizacao de browsers

		
		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>
</head>
<body>
	<div id="container">
		<div id="header">
			<h1><?php echo $this->Html->link($Description, 'http://cakephp.org'); ?></h1>
		</div>
		<div id="content">

			<?php echo $this->Session->flash(); ?>

			<?php echo $this->fetch('content'); ?>
		</div>
		<div id="footer">
			<?php echo $this->Html->link(
					$this->Html->image('cake.power.gif', array('alt' => $Description, 'border' => '0')),
					'http://www.cakephp.org/',
					array('target' => '_blank', 'escape' => false, 'id' => 'cake-powered')
				);
			?>
			<p>
			</p>
		</div>
	</div>
	<?php echo $this->element('sql_dump'); ?>
</body>
</html>
