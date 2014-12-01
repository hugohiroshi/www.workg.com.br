<?php
App::uses('AppController', 'Controller');
App::uses('CakeEmail', 'Network/Email');

class TrabalheConoscoController extends AppController{
    
    
    public function index(){
  
        
//        if ($this->request->is('post')) {
//            
//            /* Caminho que sera enviado o Arquivo */
//            $filename = APP."webroot".DS."img".DS."curriculo".DS.$this->request->data['curriculo']['name'];                                
//
//            /* move o arquivo para a pasta do caminho da variavel filename */
//            if (move_uploaded_file($this->request->data['curriculo']['tmp_name'],$filename)) {
//                /* save message to session */
//                $this->Session->setFlash('File uploaded successfuly. You can view it <a href="/app/webroot/img/curriculo/'.$this->request->data['curriculo']['name'].'">here</a>.');
//                /* redirect */
//                $this->redirect(array('action' => 'index'));
//            } else {
//                /* save message to session */
//                $this->Session->setFlash('There was a problem uploading file. Please try again.');
//           }
//        }
//        $this->render('index');
//            
            
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
            }else {
            
                /* Caminho que sera enviado o Arquivo */
               $filename = APP."webroot".DS."img".DS."curriculo".DS.$this->request->data['curriculo']['name'];                                
               
               
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
                           "\n Mensagem: ".$this->request->data['mensagem']."\n Curr&iacute;culo: <a href=".APP.'webroot'.DS.'img'.DS.'curriculo'.DS.$this->request->data['curriculo']['name'].">Visualizar Currículo</a>");              
                   $this->Session->setFlash('<p class="msg_enviada">Seu cadastro foi enviado com sucesso!</p> ');
               }
               $this->redirect(array('action' => 'index'));
            } 
        }
    }
   
         
}
