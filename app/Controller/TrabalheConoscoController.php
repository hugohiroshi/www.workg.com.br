<?php
App::uses('AppController', 'Controller');
App::uses('CakeEmail', 'Network/Email');

class TrabalheConoscoController extends AppController{
    
//    public $name = 'TrabalheConosco';
//    public $uses = array();
    
    public function index(){
        
       echo pr($this->request->data);
        
        
        
        if ($this->request->is('post')) {
           die();
                $filename = APP."webroot".DS."img".DS."curriculo".DS.$this->request->data['TrabalheConosco']['curriculo']['name']; 
                /* copy uploaded file */
                if (move_uploaded_file($this->request->data['TrabalheConosco']['curriculo']['tmp_name'],$filename)) {
                    /* save message to session */
                    $this->Session->setFlash('File uploaded successfuly. You can view it <a href="/app/webroot/img/curriculo/'.$this->request->data['TrabalheConosco']['curriculo']['name'].'">here</a>.');
                    /* redirect */
                    $this->redirect(array('action' => 'index'));
                } else {
                    /* save message to session */
                    $this->Session->setFlash('There was a problem uploading file. Please try again.');
               }
            }
            $this->render('index');
        if ($this->request->is('post')) {  
            
            
    
             
                                          
            $Email = new CakeEmail('smtp');          
            $Email->template('default');
            $Email->emailFormat('html');
            $Email->from(array('jessica.silva@pequenasempresas.net' => 'WorkGroup'));
            $Email->to('jessica.silva@pequenasempresas.net');
            $Email->subject('Trabalhe Conosco WorkGroup');
            $Email->send(" Nome: ".$this->request->data['nome']."\n E-mail: ".$this->request->data['email']."\n Telefone: (".$this->request->data['ddd'].") ".$this->request->data['telefone'].
                    "\n Cidade: ".$this->request->data['cidade']."\n Estado: ".$this->request->data['estado'].
                    "\n Mensagem: ".$this->request->data['mensagem']."\n Curr&iacute;culo: ".$this->request->data['curriculo']);              
            $this->Session->setFlash('<p class="msg_enviada">Seu cadastro foi enviado com sucesso!</p> ');
                     
            $this->redirect(array('action' => 'index'));
        } 
    }
    

         
}
