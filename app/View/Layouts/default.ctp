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
		
		echo $this->Html->css('bootstrap');	// estilo de normalizacao de browsers
                echo $this->Html->css('carousel');
                echo $this->Html->css('workg-style');
                
                echo $this->Html->script('jquery');
                echo $this->Html->script('bootstrap');
                echo $this->Html->script('jquery.innerfade');
                echo $this->Html->script('bootstrap-filestyle');
            
                
		
		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>
        <!-- HTML5 Respond.js faz o IE8 suporta elementos media query em html5 -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
          <![endif]-->
    
</head>
<body>
    
    <!-- COMEÇA MENU -->
    <div class="navbar-wrapper">
        <div class="header-container">
            
            <div class="main-container">
                
                <nav class="navbar navbar-inverse navbar-static-top" role="navigation">
                    <div class="container">
                      <div class="navbar-header">
                            <!-- BOTÃO DO MENU RESPONSIVO -->
                            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>                
                            <!-- TERMINA BOTÃO DO MENU RESPONSIVO -->
                            <a class="navbar-brand" href="/"><img src="../img/logo_workgroup.png" alt="logo-workgroup"/> </a>                
                        </div>
                        <div id="navbar" class="navbar-collapse collapse">                
                            <ul class="nav navbar-nav">
                                <li class="active"><a href="/">Home</a></li>
                                <li><a href="produtosServicos">Produtos e Serviços</a></li>
                                <li><a href="contatos">Contato</a></li>
                                <li><a href="#contact">Sobre</a></li>
                                <li><a href="#contact">Parceiros</a></li>
                                <li><a href="trabalheConosco">Trabalhe Conosco</a></li>                
                                <!-- MENU DROPDOWN
                                    <li class="dropdown">
                                       <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">Dropdown <span class="caret"></span></a>
                                       <ul class="dropdown-menu" role="menu">                    
                                         <li><a href="#">Another action</a></li>
                                         <li><a href="#">Something else here</a></li>
                                         <li class="divider"></li>
                                         <li class="dropdown-header">Nav header</li>
                                         <li><a href="#">Separated link</a></li>
                                         <li><a href="#">One more separated link</a></li>
                                       </ul>
                                     </li> -->
                            </ul>                      
                        </div>
                    </div>
                </nav>
                
            </div>

        

        </div>
    </div>
    <!-- TERMINA MENU -->
    
    
    
    
    
    <div id="container">
            <div id="header">
                    
            </div>
            <div id="content">

                    <?php echo $this->Session->flash(); ?>

                    <?php echo $this->fetch('content'); ?>
            </div>
            <div id="footer">
              
            </div>
    </div>
    <?php echo $this->element('sql_dump'); ?>


    <div id="footer2" class="col-md-12">            
        <div class="content-footer main-container">                                 
            <div class="col-md-6">
                <h2>Gostaria de receber nossas Newsletter ?</h2>
                <form action="" method="post">
                    <input class="campo-email" type="text" name="email" placeholder="E-mail" />
                    <input class="botao-cadastro" type="button" name="cadastro" value="Cadastre-se" />
                </form>
            </div>
            <div class="endereco col-md-3">                 
                <p>Endereço</p>
                <p>Rua Salim Ferez, 251 <br />
                Campinas / SP</p>
            </div>  
            <div class="contato col-md-3">
                <p>Contato</p>
                <p>Telefone: 55(19)9999-9999<br />
                   E-mail: email@email.com</p>
            </div>                        
        </div> 
    </div>   
    <div id="footer3" class="col-md-12">
        <div class="content-footer main-container">
            <div class="copyright col-md-12">
                <p>©copyright</p>
            </div>
        </div>
    </div>
</body>
</html>
