<!-- O script abaixo faz funcionar o placeholder nos inputs do formulario no navegador IE -->
<script type="text/javascript">
    $(document).ready(function() {
        function add() {if($(this).val() == ''){$(this).val($(this).attr('placeholder')).addClass('placeholder');}}
        function remove() {if($(this).val() == $(this).attr('placeholder')){$(this).val('').removeClass('placeholder');}}
            if (!('placeholder' in $('<input>')[0])) { // Create a dummy element for feature detection
                $('input[placeholder], textarea[placeholder]').blur(add).focus(remove).each(add); // Select the elements that have a placeholder attribute
                $('form').submit(function(){$(this).find('input[placeholder], textarea[placeholder]').each(remove);}); // Remove the placeholder text before the form is submitted
            }
    });
</script>  


<div class="main-container">
    <div class="form_contato col-md-12">
        <h2>Contato</h2>
        <div class="sobre_contato col-md-12">
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, 
                sed do eiusmod tempor incididunt ut labore et dolore magna 
                aliqua. </p>            
        </div> 
        <div class="conteudo_contato col-md-5">
            <fieldset>
                <div class="conteudo-formulario">
                    <form id="frm_contato" action="<?php echo $this->webroot; ?>Contatos/index" method="post">
                        <label>Nome:</label><br />
                        <input type="text" name="nome" id="contato_nome" /><br />
                        <label>Telefone:</label><br />
                        <input placeholder="(00)" class="campo_ddd" type="text" name="ddd" id="contato_tel_ddd" onkeypress="return numeros(this);" maxlength="2" />
                        <input placeholder="0000-0000" class="campo_telefone" type="text" name="telefone" id="contato_telefone" onkeydown="mascaraTelefone(this);" /><br />
                        <label>E-mail:</label><br />
                        <input type="text" name="email" id="contato_email"  /><br />
                        <label>Mensagem:</label><br />
                        <textarea class="campo_mensagem" name="mensagem" id="contato_mensagem"></textarea><br />
                        <input class="btn_enviar" type="button" name="enviar" value="Enviar" onclick="return onFormSubmit();" /><br />
                    </form>    
                </div>  
            </fieldset>   
        </div>    
    </div>    
</div>

<script type="text/javascript">    
     function onFormSubmit() {
        
        if (!validateForm()) {
            return false;
        } else {
            var formulario = document.getElementById("frm_contato");
            formulario.submit();
        }
    }
    
    // faz a validação dos campos do contato
    function validateForm() {
        var nome        = document.getElementById("contato_nome").value;                
        var ddd         = document.getElementById("contato_tel_ddd").value;
        var telefone    = document.getElementById("contato_telefone").value;
        var email       = document.getElementById("contato_email").value;
        var mensagem     = document.getElementById("contato_mensagem").value;
        
        if (nome === "") {
            alert('O campo Nome é obrigatório.');
            document.getElementById("contato_nome").focus();
            return false;
        }
        if (ddd === "") {
            alert('O campo DDD é obrigatório.');
            document.getElementById("contato_tel_ddd").focus();
            return false;
        }
        if (telefone === "") {
            alert('O campo Telefone é obrigatório.');
            document.getElementById("contato_telefone").focus();
            return false;
        }
               
        if (email === "") {
            alert('O campo E-mail é obrigatório.');
            document.getElementById("contato_email").focus();
            return false;
        }
        if (!IsEmail(email)) {
            alert('O E-mail informado é inválido.');
            document.getElementById("contato_email").focus();
            return false;
        }
         if (mensagem === "") {
            alert('O campo Mensagem é obrigatório.');
            document.getElementById("contato_empresa").focus();
            return false;
        }
       
        
        return true;
    }
    
    // Verifica se o e-mail é um e-mail valido
    function IsEmail(email){
	var filtro = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
	if(filtro.test(email)) {
            return true;
	} else {
            return false;
	}
    }
   
    function mascaraTelefone( campo ) {
        
        function trata( valor,  isOnBlur ) {
            
            valor = valor.replace(/\D/g,"");                      
            //valor = valor.replace(/^(\d{2})(\d)/g,"($1)$2");       
            
            if( isOnBlur ) {
               
                valor = valor.replace(/(\d)(\d{4})$/,"$1-$2");  
            } else {

                valor = valor.replace(/(\d)(\d{3})$/,"$1-$2");
            }
            return valor;
         }
         
         campo.onkeypress = function (evt) {
            
            var code = (window.event)? window.event.keyCode : evt.which;   
            var valor = this.value;
            
            if(code > 57 || (code < 48 && code != 8 ))  {
                return false;
            } else {
                this.value = trata(valor, false);
            }
         }
         
         campo.onblur = function() {
            
            var valor = this.value;
            if( valor.length < 9 ) {
                this.value = "";
            }else {      
                this.value = trata( this.value, true );
            }
         }
         
         campo.maxLength = 10;
    }
    
    function numeros(evt) {
        var code = (window.event)? window.event.keyCode : evt.which;   
        var valor = this.value;

        if(code > 57 || (code < 48 && code != 8 ))  {
            return false;
        } else {
            this.value = trata(valor, false);
        }
    }
    
</script>