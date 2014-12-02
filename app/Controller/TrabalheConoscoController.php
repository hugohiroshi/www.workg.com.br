<?php
App::uses('AppController', 'Controller');
App::uses('CakeEmail', 'Network/Email');

class TrabalheConoscoController extends AppController{
    
    
    public function index(){
                 
        if ($this->request->is('post')) {           
            
            if($this->request->data['nome'] == ""){
                echo '<p class="msg_enviada">O campo Nome é obrigatório</p>';
                return false;
            }
            
            else if($this->request->data['email'] == ""){
                echo '<p class="msg_enviada">O campo E-mail é obrigatório</p>';
                return false;
            }
            
            else if($this->request->data['repetir_email'] == ""){
                echo '<p class="msg_enviada">O campo Repetir E-mail é obrigatório</p>';
                return false;
            }
            
            else if($this->request->data['ddd'] == ""){
                echo '<p class="msg_enviada">O campo DDD é obrigatório</p>';
                return false;
            }
            
            else if($this->request->data['telefone'] == ""){
                echo '<p class="msg_enviada">O campo Telefone é obrigatório</p>';
                return false;
            }
            
            else if($this->request->data['cidade'] == ""){
                echo '<p class="msg_enviada">O campo Cidade é obrigatório</p>';
                return false;
            }
            
            else if($this->request->data['estado'] == ""){
                echo '<p class="msg_enviada">O campo Estado é obrigatório</p>';
                return false;
            }
            
            else if($this->request->data['mensagem'] == ""){
                echo '<p class="msg_enviada">O campo Mensagem é obrigatório</p>';
                return false;
            }
            
            else if($this->request->data['curriculo'] == ""){
                echo '<p class="msg_enviada">O campo Curriculo é obrigatório</p>';
                return false;
            }
            //validar tipo da extensão do arquivo
            else if($this->request->data['curriculo']['type'] != 'application/pdf'){
                echo '<p class="msg_enviada">Arquivo inválido, por favor enviar arquivo em formato PDF</p>';
                return false;
            }
            //validar tamanho maximo do arquivo enviado no caso esse pode ser ate 2mb
            else if($this->request->data['curriculo']['size'] > '2097152'){
                echo '<p class="msg_enviada">Arquivo inválido, por favor enviar arquivo com tamanho máximo de 2MB</p>';
                return false;
            }
            
            else {
               //codigo para mudar nome do arquivo curriculo 
                if(isset($this->request->data['curriculo'])) {
                    $nomeArquivo = $this->request->date['curriculo']['name'];
                    $novoNomeArquivo = md5($nomeArquivo.date("dmyHis"));
                    $tamanho = $this->request->data['curriculo']['size'];
                }
                
                $nome = $this->request->data['nome'];
                $mudarNome = str_replace(" ", "", $nome);
                $novoArquivo = $novoNomeArquivo.'-'.$mudarNome.'.pdf';
                
                /* Caminho que sera enviado o Arquivo */
                $filename = APP."webroot".DS."img".DS."curriculo".DS.$novoArquivo;                                
               
               
                /* move o arquivo para a pasta do caminho da variavel filename */
                if (move_uploaded_file($this->request->data['curriculo']['tmp_name'],$filename)) {

                    $Email = new CakeEmail('smtp');          
                    $Email->template('default');
                    $Email->emailFormat('html');
                    $Email->from(array('jessica.silva@pequenasempresas.net' => 'WorkGroup'));
                    $Email->to('jessica.silva@pequenasempresas.net');
                    $Email->subject('Trabalhe Conosco WorkGroup');
                    $Email->send(" Nome: ".$this->request->data['nome']."\n E-mail: ".$this->request->data['email']."\n Telefone: (".$this->request->data['ddd'].") ".$this->request->data['telefone'].
                            "\n Cidade: ".$this->request->data['cidade']."\n Estado: ".$this->request->data['estado'].
                            "\n Mensagem: ".$this->request->data['mensagem']."\n Curr&iacute;culo: <a href=".'/app/webroot/img/curriculo/'.$novoArquivo.">Visualizar Currículo</a>");              
                    $this->Session->setFlash('<p class="msg_enviada">Seu cadastro foi enviado com sucesso!</p> ');
                }
                $this->redirect(array('action' => 'index'));
            } 
        }
    }
   
         
}
