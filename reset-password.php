<?php
include 'inc/scriptTop.php';
include 'inc/db_connect.php';
?>

<body class="hold-transition login-page" style="margin: 0; padding: 0; background-image: url('./img/wolf2.jpg'); background-size: cover; background-position: center; background-repeat: no-repeat;">
  <div class="login-box translucent" id="divTranslucentReset">
    <div id="alertEmpty" class="alert alert-warning alert-dismissible" style="display: none;">
      <h6><i class="icon fas fa-exclamation-triangle"></i> Todos os Campos São Obrigatórios</h6>
    </div>
    <div id="invalidMail" class="alert alert-warning alert-dismissible" style="display: none;">
      <h6><i class="icon fas fa-exclamation-triangle"></i> O Email Informado é Inválido</h6>
    </div>
    <div id="verifyUser" class="alert alert-warning alert-dismissible" style="display: none;">
      <h6><i class="icon fas fa-exclamation-triangle"></i> Usuário Não Localizado</h6>
      Verifique Suas Credenciais
    </div>
    <div class="card">
      <div class="card-body login-card-body">
        <p class="login-box-msg" style="font-size: 30px; font-weight: bold;">BUDAWEB SYSTEMS</p>
        <p class="login-box-msg">Resetar Senha</p>
        <form id="formReset" action="reset-password.php" method="post">
          <div class="input-group mb-3">
            <input type="text" id="cpf" name="cpf" class="form-control" placeholder="CPF" required>
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-asterisk"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <input type="email" id="email" name="email" class="form-control" placeholder="Email" required>
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-envelope"></span>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-12">
              <input type="button" class="btn btn-primary btn-block" value="Resetar" onclick="resetPassword();">
            </div>
          </div>
        </form>
        <p class="mb-1">
          <a href="index.php">Acessar Sistema</a>
        </p>
      </div>
    </div>
  </div>
</body>

<style>
  .translucent {
    opacity: 0.5;
    transition: opacity 0.3s;
  }

  .translucent.active {
    opacity: 1;
  }
</style>

<script>
  const div = document.getElementById('divTranslucentReset');
    
  div.addEventListener('click', function (event) {
    if (!div.classList.contains('active')) {
      div.classList.add('active');
    }
    event.stopPropagation();
  });

  document.addEventListener('click', function (event) {
    if (!div.contains(event.target)) {
      div.classList.remove('active');
    }
  });

  $(document).ready(function() {
      $('#cpf').mask('000.000.000-00');
  });

  function resetPassword() {
    const emailInput = document.getElementById("email");
    const email = emailInput.value.trim();
    const emailRegex = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;

    var formData = $('#formReset').serializeArray();
    event.preventDefault();
    var allFieldsFilled = true;

    for (var i = 0; i < formData.length; i++) {
        if (formData[i].value.trim() === '') {
            allFieldsFilled = false;
            break;
        }
    }

    if (allFieldsFilled) {
      if (emailRegex.test(email)) {
        $.ajax({
            url: "api/resetPassword.php",
            type: "POST",
            data: formData,
            dataType: "json"
        }).done(function(resposta) {
          if(resposta == 1) {
            window.location.href = "index.php?resetSuccess=success";
          } else if(resposta == 0) {
            $('#verifyUser').css('display', 'block');
            setTimeout(function() {
              $('#verifyUser').css('display', 'none');
            }, 5000);
            $("#formReset")[0].reset();
          }
        }).fail(function(jqXHR, textStatus) {
          //console.log("Request failed: " + textStatus);
        }).always(function(data) {
          //console.log(data);
        });
      } else {
        $('#invalidMail').css('display', 'block');
        setTimeout(function() {
          $('#invalidMail').css('display', 'none');
        }, 5000);
      }
    } else {
      $('#alertEmpty').css('display', 'block');
      setTimeout(function() {
        $('#alertEmpty').css('display', 'none');
      }, 5000);
    }
  }
</script>