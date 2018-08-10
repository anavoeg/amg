<?php
require '_includes/header.php';
?>

<div class="content">
    <div class="contact-form">
        <div class="contact-header">
            <h3>Lorem ipsum dolor sit amet.</h3>
            <p>
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Repellendus vel dicta, praesentium doloremque ea illum, iusto saepe.
            </p>
        </div>
        <form>
            <div class="input-field">
                <input type="text" id="name">
                <label for="name">Nome</label>
            </div>
            <div class="input-field">
                <input type="email" id="email" class="validate">
                <label for="email">Email</label>
            </div>
            <div class="input-field">
                <textarea type="email" id="textarea" class="amg-message"></textarea>
                <br><label for="textarea">Mensagem</label>
            </div>
        </form>
        <button class="btn contact-btn">Enviar mensagem</button>
    </div>
</div>
</div>

<?php
require '_includes/footer.php';
?>
