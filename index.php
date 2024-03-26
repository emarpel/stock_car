<?php
if (!isset($_GET['action'])) {
  $action = "login";
} else {
  $action = $_GET['action'];
}

include 'inc/scriptTop.php';
include 'inc/db_connect.php';

$resetSuccess = $_GET['resetSuccess'];
$error = $_GET['error'];

if ($action == "login") {
?>

  <body class="hold-transition login-page" style="margin: 0; padding: 0; background-image: url('./img/wolf1.jpg'); background-size: cover; background-position: center; background-repeat: no-repeat;">
    <div class="login-box translucent" id="divTranslucent">
      <div id="resetSuccess" class="alert alert-success alert-dismissible" style="display: none;">
        <h6><i class="icon fas fa-check"></i> Password Resetado com Sucesso</h6>
        Senha Padrão (stockcar123)
      </div>
      <div id="error" class="alert alert-danger alert-dismissible" style="display: none;">
        <h6><i class="icon fas fa-exclamation-triangle"></i> Usuário e/ou Senha Inválidos</h6>
        Verifique Suas Credenciais
      </div>
      <div id="alertValidateEmpty" class="alert alert-warning alert-dismissible" style="display: none;">
        <h6><i class="icon fas fa-exclamation-triangle"></i> Todos os Campos São Obrigatórios</h6>
      </div>
      <div class="card">
        <div class="card-body login-card-body">
          <p class="login-box-msg" style="font-size: 30px; font-weight: bold;">BUDAWEB SYSTEMS</p>
          <p class="login-box-msg">Acessar o Sistema</p>
          <form action="inc/validate.php" method="post" id="formValidate">
            <div class="input-group mb-3">
              <input type="text" name="userLogin" class="form-control" placeholder="Usuário">
              <div class="input-group-append">
                <div class="input-group-text">
                  <span class="fas fa-user"></span>
                </div>
              </div>
            </div>
            <div class="input-group mb-3">
              <input type="password" name="userPassword" class="form-control" placeholder="Senha">
              <div class="input-group-append">
                <div class="input-group-text">
                  <span class="fas fa-lock"></span>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-12">
                <button class="btn btn-primary btn-block" onclick="verifyInputEmpty();">Entrar</button>
              </div>
            </div>
          </form>
          <p class="mb-1">
            <a href="reset-password.php">Resetar Senha</a>
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
    const div = document.getElementById('divTranslucent');
    
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

    function verifyInputEmpty() {
      var formValidate = $('#formValidate').serializeArray();
      event.preventDefault();
      var allFieldsFilled = true;

      for (var i = 0; i < formValidate.length; i++) {
          if (formValidate[i].value.trim() === '') {
              allFieldsFilled = false;
              break;
          }
      }

      if (allFieldsFilled) {
        $('#formValidate').submit();
      } else {
        $('#alertValidateEmpty').css('display', 'block');
        setTimeout(function() {
          $('#alertValidateEmpty').css('display', 'none');
        }, 5000);
      }
    }

    $(document).ready(function() {
      var resetSuccess = '<?php echo $resetSuccess; ?>'
      if (resetSuccess == "success") {
        $('#resetSuccess').css('display', 'block');
      }
    });

    $(document).ready(function() {
      var error = '<?php echo $error; ?>'
      if (error == "error") {
        $('#error').css('display', 'block');
      }
    });

    setTimeout(function() {
      $('#resetSuccess').css('display', 'none');
    }, 5000);

    setTimeout(function() {
      $('#error').css('display', 'none');
    }, 5000);
  </script>

<?php } ?>