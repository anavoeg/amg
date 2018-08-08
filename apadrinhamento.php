<?php
   require '_config/config.php';
   require '_includes/header.php';
   require '_get_set/get_apadrinhamento.php';
   require '_get_set/set_apadrinhamento.php';
   
   //Consultar os estados para preencher SELECT
   $sql = $pdo->query("SELECT id_estado,nome FROM estados ORDER BY id DESC;");
   
   unset($pdo);//destruindo variavel de conexão para fechar a conexão.
   
?>
<div class="content">
   <h2>Lorem ipsum dolor sit amet.</h2>
   <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
   <?php if(isset($sucesso)):?>
   <blockquote>
      Sua solicitação de apadrinhamento foi enviada com sucesso, aguarde e entraremos em contato através do seu e-mail.
   </blockquote>
   <?php endif; ?>
   <?php if(isset($falha)):?>
   <blockquote>
      Não foi possível enviar sua solicitação de apadrinhamento, verifique se seus dados estão corretos e tente novamente mas tarde.
   </blockquote>
   <?php endif; ?>
   <form id="formulario_apadrinhamento" method="POST" class="amg-apdmt-form">
      <fieldset class="amg-personalinfo-field">
         <div class="input-field">
            <input required type="text" id="nome" name="nome" placeholder="Nome">
         </div>
         <div class="input-field">
            <input required type="email" id="email" name="email" placeholder="Email">
         </div>
         <div class="input-field">
            <input required type="text" id="cpf" name="cpf" placeholder="CPF">
         </div>
         <div class=" amg-option">
            <!-- campos de tipo radio e checkbox a tag label deve permancer abaixo da tag input-->
            <p>
               <label>
               <input required id="true" class="with-gap" name="rel_status" type="radio" value="1" checked />
               <span for="true">Casado</span>
               </label>
            </p>
            <p>
               <label>
               <input required id="false" class="with-gap" name="rel_status" type="radio" value="0" />
               <span for="false">Solteiro</span>
               </label>
            </p>
         </div>
         <div class="input-field">
            <input required type="text" id="data_nascimento" name="data_nascimento" placeholder="Data de nascimento">
         </div>
         <div class=" amg-option">
            <!-- campos de tipo radio e checkbox a tag label deve permancer abaixo da tag input-->
            <p>
               <label>
               <input required id="true" class="with-gap" name="genero" type="radio" value="1" checked />
               <span for="true">Feminino</span>
               </label>
            </p>
            <p>
               <label>
               <input required id="false" class="with-gap" name="genero" type="radio" value="0" />
               <span for="false">Masculino</span>
               </label>
            </p>
         </div>
         <div class="input-field">
            <input required type="text" id="renda" name="renda" placeholder="Renda">
         </div>
      </fieldset>
      <fieldset class="amg-adressinfo-field">
         <div class="input-field">
            <input required type="text" id="cep" name="cep" placeholder="CEP">
         </div>
		 <div id="cep-feedback" class="alert text-center"></div>
         <div class="input-field">
            <input required type="text" id="estado" name="estado" placeholder="Estado">
         </div>
         <div class="input-field">
            <input required type="text" id="cidade" name="cidade" placeholder="Cidade">
         </div>
         <div class="input-field">
            <input required type="text" id="bairro" name="bairro" placeholder="Bairro">
         </div>
         <div class="input-field">
            <input required type="text" id="logradouro" name="logradouro" placeholder="Logradouro">
         </div>
         <div class="input-field">
            <input required type="text" id="numero" name="numero" placeholder="Número">
         </div>
         <div class="input-field">
            <input required type="text" id="complemento" name="complemento" placeholder="Complemento">
         </div>
      </fieldset>
      <fieldset class="amg-apmtoinfo-field">
         <div class="input-field">
            <!-- campos de tipo radio e checkbox a tag label deve permancer abaixo da tag input-->
            <select name="estado_crianca" >
			   <?php foreach ($sql as $row): ?>
				<option <?php if($row["id_estado"]==28){echo "selected";} ?> value="<?php echo $row["id_estado"]?>"><?php echo $row['nome']?></option>
			   <?php endforeach; ?>
            </select>
            <label>Estado</label>
         </div>
         <div class=" amg-option">
            <!-- campos de tipo radio e checkbox a tag label deve permancer abaixo da tag input-->
            <p>
               <label>
               <input required id="true" class="with-gap" name="genero_crianca" type="radio" value="1" />
               <span for="true">Feminino</span>
               </label>
            </p>
            <p>
               <label>
               <input required id="false" class="with-gap" name="genero_crianca" type="radio" value="0" />
               <span for="false">Masculino</span>
               </label>
            </p>
         </div>
         <div class="input-field" style="margin-top: 5em;">
            <!-- campos de tipo radio e checkbox a tag label deve permancer abaixo da tag input-->
            <select name="idade" >
               <option>Selecione</option>
               <option value="Qualquer Idade">Qualquer Idade</option>
               <option value="5 - 7 Anos de idade">5 - 7 Anos de idade</option>
               <option value="2">Option 2</option>
               <option value="3">Option 3</option>
            </select>
            <label>Faixa Etária</label>
         </div>
      </fieldset>
      <span class="amg-registerinfo-field">
         por favor, antes de clicar em "enviar solicitação de apadrinhamento" você deve aceitar o termos e condições do projeto "apadrinhe uma criança".
         <p>
            <label>
            <input required type="checkbox" name="termos"/>
            <span class="amg-terms">termos e condições.</span>
            </label>
         </p>
      </span>
      <button class="btn waves-effect waves-light amg-btn-send" type="submit" name="action">Enviar solicitação de apadrinhamento
      <i class="material-icons right">send</i>
      </button>
   </form>
</div>
</div>
<?php
   require '_includes/footer.php';
?>