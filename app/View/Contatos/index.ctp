<div class="main-container">
    <div class="form_contato">
        <h2>Contato</h2>
        <form action="ContatosController.php" method="post">
            <label>Nome:</label><br />
            <input type="text" name="nome" /><br />
            <label>Telefone:</label><br />
            <input class="campo_ddd" type="text" name="ddd" />
            <input class="campo_telefone" type="text" name="telefone" /><br />
            <label>E-mail:</label><br />
            <input type="text" name="email" /><br />
            <label>Mensagem:</label><br />
            <textarea class="campo_mensagem"></textarea><br />
            <input class="btn_contato" type="submit" name="enviar" value="Enviar" /><br />
        </form>    
    </div>    
</div>    