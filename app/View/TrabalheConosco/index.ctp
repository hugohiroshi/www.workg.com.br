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
                    <form action="" method="post">
                        <label>Nome:</label><br />
                        <input type="text" name="nome" /><br />
                        <label>E-mail:</label><br />
                        <input type="text" name="email" /><br />
                        <label>Repetir E-mail:</label><br />
                        <input type="text" name="repetir_email" /><br />
                        <label>Telefone:</label><br />
                        <input class="campo_ddd" placeholder="(00)" type="text" name="ddd" /><input class="campo_telefone" placeholder="0000-0000" type="text" name="telefone" /><br />
                        <label>Cidade: </label><label class="label_estado">Estado:</label><br />
                        <input class="campo_cidade" type="text" name="cidade" /><input class="campo_estado" type="text" name="estado" /><br />
                        <label>Mensagem</label><br />
                        <textarea class="campo_mensagem" name="mensagem"></textarea><br />
                        <label>Anexar Currírulo:</label><br />
                        <input class="anexar_curriculo" type="file" name="cirriculo" /><br />                        
                        <input class="btn_enviar" type="button" name="enviar" value="Enviar" onclick="return onFormSubmit();" /><br />
                    </form>    
                </div>    
            </fieldset>   
        </div>    
    </div>    
</div>

<!-- 
   Codigo de teste

<div class="input-group">
    <span class="btn btn-primary btn-file">
        Browse <input type="file" multiple="">
    </span>                           
</div>-->