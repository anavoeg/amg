<?php 
    require '_includes/header.php';
?>

    <div class="content">
      Lorem ipsum dolor sit amet, consectetur adipisicing elit. Repellendus vel dicta, praesentium doloremque ea illum, iusto saepe.
      <form>
        <div class="input-field">
          <input type="text" id="name">
          <label class="active" for="name">Nome</label>
        </div>
        <div class="input-field">
          <input type="email" id="email" class="validate">
          <label class="active" for="email">Email</label>
        </div>
        <div class="input-field">
          <textarea type="email" id="textarea" class="materialize-textarea"></textarea>
          <label class="active" for="textarea">Mensagem:</label>
        </div>
      </form>
      <button class="btn waves-effect blue lighten-3">Enviar</button>
    </div>
  </div>

<?php 
    require '_includes/footer.php';
?>
