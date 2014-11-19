<?php

App::uses('AppController', 'Controller');


class ContatosController extends AppController{
    public function index() {
        
        if ($this->request->is('post')) {
            // executa aqui quando for post          
            App::uses('CakeEmail', 'Network/Email');            
            $Email = new CakeEmail('smtp');
            $Email->from(array('jessica.silva@pequenasempresas.net' => 'WorkGroup'));
            $Email->to('jessica.silva@pequenasempresas.net');
            $Email->subject('Contato WorkGroup');
            $Email->send(" Nome: ".$this->request->data['nome']."\n Telefone: (".$this->request->data['ddd'].") ".$this->request->data['telefone'].
                    "\n E-mail: ".$this->request->data['email']."\n Mensagem:".$this->request->data['mensagem']);  
            
            $this->Session->setFlash('<p class="msg_enviada">Sua mensagem foi enviada com sucesso!</p> ');
            $this->redirect(array('action' => 'index'));

        } else {
            // quando for get
           // echo 'get';
        }
    }
}
