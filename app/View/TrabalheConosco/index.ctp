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
    <div class="trabalhe_conosco">
        <div class="conteudo_pagina col-md-12">
            <h2>Trabalhe Conosco</h2>
            <div class="texto_trabalhe_conosco col-md-12">
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit,
                    sed do eiusmod tempor incididunt ut labore et dolore magna
                    aliqua. Ut enim ad minim veniam, quis nostrud exercitation 
                    ullamco laboris nisi ut aliquip ex ea commodo consequat. 
                    Duis aute irure dolor in reprehenderit in voluptate velit 
                    esse cillum dolore eu fugiat nulla pariatur. Excepteur sint
                    occaecat cupidatat non proident, sunt in culpa qui officia 
                    deserunt mollit anim id est laborum.</p>
            </div>             
        </div>
        
        <div class="form_trabalhe_conosco col-md-5">
            <fieldset>
                <div class="alinhar_conteudo">
                    <form action="<?php echo $this->webroot; ?>TrabalheConosco/index" method="post" enctype="application/x-www-form-urlencoded" id="frm_trabalhe_conosco">
                        <label>Nome:</label><br />
                        <input type="text" name="nome" id="nome" /><br />
                        <label>E-mail:</label><br />
                        <input type="text" name="email" id="email" /><br />
                        <label>Repetir E-mail:</label><br />
                        <input type="text" name="repetir_email" id="repetir_email" /><br />
                        <label>Telefone:</label><br />
                        <input class="campo_ddd" placeholder="(00)" type="text" name="ddd" id="ddd" onkeypress="return numeros(this);" maxlength="2" /><input class="campo_telefone" placeholder="0000-0000" type="text" name="telefone" id="telefone" onkeydown="mascaraTelefone(this);"  /><br />
                        <label>Cidade: </label><label class="label_estado">Estado:</label><br />
                        <input class="campo_cidade" type="text" name="cidade" id="cidade" /><input class="campo_estado" type="text" name="estado" id="estado" /><br />
                        <label>Mensagem</label><br />
                        <textarea class="campo_mensagem" name="mensagem" id="mensagem"></textarea><br />
                        <label>Anexar Currírulo:</label><br />                        
                        <div class="input-group">
                            <span class="input-group-btn">
                                <span class="btn btn-primary btn-file">
                                    Currículo <input type="file" name="curriculo" id="curriculo" multiple />
                                </span>
                            </span>
                            <input type="text" class="form-control" readonly  />
                        </div>
                        <input class="btn_enviar" type="button" name="enviar" value="Enviar"  onclick="return onFormSubmit();"  /><br />
                    </form>    
                </div>    
            </fieldset>   
        </div>    
    </div>    
</div>

<script type="text/javascript">
    //Codigo para funcionar o input file 
    
    $(document).on('change', '.btn-file :file', function() {
        var input = $(this),
            numFiles = input.get(0).files ? input.get(0).files.length : 1,
            label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
        input.trigger('fileselect', [numFiles, label]);
    });

    $(document).ready( function() {
        $('.btn-file :file').on('fileselect', function(event, numFiles, label) {
        
            var input = $(this).parents('.input-group').find(':text'),
                log = numFiles > 1 ? numFiles + ' files selected' : label;
        
            if( input.length ) {
                input.val(log);
            } else {
                if( log ) alert(log);
            }        
        });
    });
    
</script>

<script type="text/javascript">    
    function onFormSubmit() {
        
        if (!validateForm()) {
            return false;
        } else {
            var formulario = document.getElementById("frm_trabalhe_conosco");
            formulario.submit();
        }
    }
    
    // faz a validação dos campos do contato
    function validateForm() {
        var nome        = document.getElementById("nome").value;                
        var email         = document.getElementById("email").value;
        var repetir_email    = document.getElementById("repetir_email").value;
        var ddd    = document.getElementById("ddd").value;
        var telefone    = document.getElementById("telefone").value;
        var cidade       = document.getElementById("cidade").value;
        var estado    = document.getElementById("estado").value;
        var mensagem     = document.getElementById("mensagem").value;
        var curriculo = document.getElementById("curriculo").value;
        
        if (nome === "") {
            alert('O campo Nome é obrigatório.');
            document.getElementById("nome").focus();
            return false;
        }
        
        if (email === "") {
            alert('O campo E-mail é obrigatório.');
            document.getElementById("email").focus();
            return false;
        }
        
        if (!IsEmail(email)) {
            alert('O E-mail informado é inválido.');
            document.getElementById("email").focus();
            return false;
        }
        
        if (repetir_email === "") {
            alert('O campo Repetir E-mail é obrigatório.');
            document.getElementById("repetir_email").focus();
            return false;
        }
        
        if (!IsEmail(repetir_email)) {
            alert('O E-mail informado é inválido.');
            document.getElementById("repetir_email").focus();
            return false;
        }
        
        if (repetir_email != email) {
            alert('O E-mail informado no campo Repetir E-mail é inválido.');
            document.getElementById("repetir_email").focus();
            return false;
        }
        
        if (ddd === "") {
            alert('O campo DDD é obrigatório.');
            document.getElementById("ddd").focus();
            return false;
        }
        
        if (telefone === "") {
            alert('O campo Telefone é obrigatório.');
            document.getElementById("telefone").focus();
            return false;
        }
        
        if (cidade === "") {
            alert('O campo Cidade é obrigatório.');
            document.getElementById("cidade").focus();
            return false;
        }
        
        if (estado === "") {
            alert('O campo Estado é obrigatório.');
            document.getElementById("estado").focus();
            return false;
        }
                               
        if (mensagem === "") {
            alert('O campo Mensagem é obrigatório.');
            document.getElementById("mensagem").focus();
            return false;
        }
        
        if (curriculo === "") {
            alert('O campo Currículo é obrigatório.');
            document.getElementById("curriculo").focus();
            return false;
        }        
        
        if (!validoFormato(document.getElementById("curriculo").value)) {
            alert('Arquivo inválido, por favor enviar arquivo em formato PDF');
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
    
    
function validoFormato(arquivo){
    var extensoes, ext, valido;
        
    extensoes = new Array('.pdf');
     
    ext = arquivo.substring(arquivo.lastIndexOf(".")).toLowerCase();
    
    valido = false;
     
    for(var i = 0; i <= extensoes.length; i++){
        if(extensoes[i] === ext){
            valido = true;
        }
    }
      
    if(valido){
        return true;
    }
    return false;
}
        
    

</script>

