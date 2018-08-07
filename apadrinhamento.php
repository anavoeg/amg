<?php

   require '_config/config.php';
   require '_includes/header.php';
   require '_get_set/get_apadrinhamento.php';
   require '_get_set/set_apadrinhamento.php';
   
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
            <input type="text" id="nome" name="nome">
            <label class="active" for="nome" >Nome</label>
         </div>
         <div class="input-field">
            <input type="email" id="email" name="email">
            <label class="active" for="email">Email</label>
         </div>
         <div class="input-field">
            <input type="text" id="cpf" name="cpf">
            <label class="active" for="cpf">CPF</label>
         </div>
         <div class=" amg-option">
            <!-- campos de tipo radio e checkbox a tag label deve permancer abaixo da tag input-->
            <p>
               <label>
               <input id="true" class="with-gap" name="rel_status" type="radio" value="1" checked />
               <span for="true">Casado</span>
               </label>
            </p>
            <p>
               <label>
               <input id="false" class="with-gap" name="rel_status" type="radio" value="0" />
               <span for="false">Solteiro</span>
               </label>
            </p>
         </div>
         <div class="input-field">
            <input type="text" id="data_nascimento" name="data_nascimento">
            <label class="active" for="data_nascimento">Data de Nascimento</label>
         </div>
         <div class=" amg-option">
            <!-- campos de tipo radio e checkbox a tag label deve permancer abaixo da tag input-->
            <p>
               <label>
               <input id="true" class="with-gap" name="genero" type="radio" value="1" checked />
               <span for="true">Feminino</span>
               </label>
            </p>
            <p>
               <label>
               <input id="false" class="with-gap" name="genero" type="radio" value="0" />
               <span for="false">Masculino</span>
               </label>
            </p>
         </div>
         <div class="input-field">
            <input type="text" id="renda" name="renda">
            <label class="active" for="renda">Renda</label>
         </div>
      </fieldset>
      <fieldset class="amg-adressinfo-field">
         <div class="input-field">
            <input type="text" id="cep" name="cep">
            <label class="active" for="cep">CEP</label>
         </div>
         <div class="input-field">
            <input type="text" id="estado" name="estado">
            <label class="active" for="estado">Estado</label>
         </div>
         <div class="input-field">
            <input type="text" id="cidade" name="cidade">
            <label class="active" for="cidade">Cidade</label>
         </div>
         <div class="input-field">
            <input type="text" id="bairro" name="bairro">
            <label class="active" for="bairro">Bairro</label>
         </div>
         <div class="input-field">
            <input type="text" id="logradouro" name="logradouro">
            <label class="active" for="logradouro">Logradouro</label>
         </div>
		 <div class="input-field">
            <input type="text" id="numero" name="numero">
            <label class="active" for="numero">Número</label>
         </div>
         <div class="input-field">
            <input type="text" id="complemento" name="complemento">
            <label class="active" for="complemento">Complemento</label>
         </div>
      </fieldset>
      <fieldset class="amg-apmtoinfo-field">
         <div class="input-field">
            <!-- campos de tipo radio e checkbox a tag label deve permancer abaixo da tag input-->
            <select name="estado_crianca" required>
               <option>Selecione</option>
               <option value="28">Qualquer Estado</option>
               <option value="1">Option 1</option>
               <option value="2">Option 2</option>
               <option value="3">Option 3</option>
            </select>
            <label>Estado</label>
         </div>
         <div class=" amg-option">
            <!-- campos de tipo radio e checkbox a tag label deve permancer abaixo da tag input-->
            <p>
               <label>
               <input id="true" class="with-gap" name="genero_crianca" type="radio" value="1" />
               <span for="true">Feminino</span>
               </label>
            </p>
            <p>
               <label>
               <input id="false" class="with-gap" name="genero_crianca" type="radio" value="0" />
               <span for="false">Masculino</span>
               </label>
            </p>
         </div>
         <div class="input-field" style="margin-top: 5em;">
            <!-- campos de tipo radio e checkbox a tag label deve permancer abaixo da tag input-->
            <select name="idade" required>
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
						<input type="checkbox" name="termos"/>
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