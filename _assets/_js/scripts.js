$(function () {


  var hamburgerButton = document.querySelector('.hamburger');
  var mobileNav = document.querySelector('.mobile');

  function openMobile() {
    mobileNav.classList.add('open');
  }

  function closeMobile() {
    mobileNav.classList.remove('open');
  }

  hamburgerButton.addEventListener('click', openMobile);
  mobileNav.addEventListener('click', closeMobile);

  $('#formulario_contato').validate({ // iniciando o plugin validate do jquery para validar os campos do formulario de contato
    rules: {
      nome: {
        required: true,
        minlength: 3
      },
      email: {
        required: true,
        email: true,
      },
      assunto: {
        required: true
      },
      mensagem: {
        required: true
      }
    },
    messages: {
      nome: {
        required: "Por favor, informe seu nome",
        minlength: "O nome deve ter pelo menos 3 caracteres"
      },
      email: {
        required: "É necessário informar um email",
        email: "Informe um email válido.",
      },
      assunto: {
        required: "O assunto não pode ficar em branco.",
      },
      mensagem: {
        required: "A mensagem não pode ficar em branco"
      }
    }

  });

  $('#formulario_apadrinhamento').validate({ // iniciando o plugin validate do jquery para validar os campos do formulário de apadrinhamento.
    rules: {
      nome: {
        required: true,
        minlength: 3
      },
      email: {
        required: true,
        email: true,
      },
      cpf: {
        required: true
      },
      rel_status: {
        required: true
      },
      renda: {
        required: true
      },
      data_nascimento: {
        required: true
      },
      genero: {
        required: true
      },
      cep: {
        required: true
      },
      estado: {
        required: true
      },
      cidade: {
        required: true
      },
      bairro: {
        required: true
      },
      logradouro: {
        required: true
      },
      numero: {
        required: true
      },
      estado_crianca: {
        required: true
      },
      genero_crianca: {
        required: true
      },
      idade: {
        required: true
      },

    },
    messages: {
      nome: {
        required: "Por favor, informe seu nome.",
        minlength: "O nome deve ter pelo menos 3 caracteres."
      },
      email: {
        required: "É necessário informar um email.",
        email: "Informe um email válido.",
      },
      cpf: {
        required: "O CPF não pode ficar em branco.",
      },
      rel_status: {
        required: "O estado Civíl não pode ficar em branco."
      },
      data_nascimento: {
        required: "A data de nascimento não pode ficar em branco."
      },
      renda: {
        required: "Você deve inserir sua renda."
      },
      genero: {
        required: "O gênero não pode ficar em branco."
      },
      cep: {
        required: "O Estado Civíl não pode ficar em branco."
      },
      estado: {
        required: "O Estado não pode ficar em branco."
      },
      cidade: {
        required: "A cidade não pode ficar em branco."
      },
      bairro: {
        required: "O bairro não pode ficar em branco."
      },
      logradouro: {
        required: "O logradouro não pode ficar em branco."
      },
      numero: {
        required: "O número não pode ficar em branco."
      },
      estado_crianca: {
        required: "O estado onde tem interesse que apadrinhar uma criança não pode ficar em branco."
      },
      genero_crianca: {
        required: "O gênero da criança não pode ficar em branco."
      },
      idade: {
        required: "Defina a faixa etária da criança ao qual você deseja apadrinhar."
      }
    }

  });

  //Máscaras
  $('#cep').mask('00000-000');
  $('#cpf').mask('000.000.000-00', {
    reverse: true
  });
  $('#data_nascimento').mask('00/00/0000');
  $('#renda').mask('000.000.000.000.000,00', {
    reverse: true
  });

  //Consulta de cep
	$("#cep").focusout(function(){
	  $.ajax({
		url: 'http://api.postmon.com.br/v1/cep/' + $(this).val(),
		type: 'get',
		dataType: 'json',
		beforeSend: function () {
		  $('#estado').val('');
		  $('#cidade').val('');
		  $('#bairro').val('');
		  $('#logradouro').val('');
		},
		success: function (data) {
		  $('#cep-feedback').css('display', 'none');
		  $('#estado').val(data.estado);
		  $('#cidade').val(data.cidade);
		  $('#bairro').val(data.bairro);
		  $('#logradouro').val(data.logradouro);

		},
		error: function () {
		  $('#cep-feedback').removeClass('alert-success');
		  $('#cep-feedback').addClass('alert-danger');
		  $('#cep-feedback').css('display', 'block');
		  $('#cep-feedback').text('CEP não encontrado');
		}
	  });
	});

});