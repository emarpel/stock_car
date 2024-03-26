<?php if ($action == "start") { ?>
    <br>
    <section class="content">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Usuários Cadastrados</h3>
                        <button class="badge bg-success" style="float: right; font-size: 1em; border: none;" data-toggle="modal" data-target="#modalNewUser">Novo Usuário</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div id="accordion">
                            <!-- we are adding the .class so bootstrap.js collapse plugin detects it -->
                            <div class="card card-success">
                                <div class="card-header">
                                    <h4 class="card-title">
                                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
                                            Usuários Ativos
                                        </a>
                                    </h4>
                                </div>
                                <div id="collapseOne" class="panel-collapse collapse show">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="card">
                                                    <!-- /.card-header -->
                                                    <div class="card-body p-0">
                                                        <table class="table table-condensed" id="tableUsersActive">
                                                            <thead>
                                                                <tr>
                                                                    <th style="width: 5%; text-align: center;">Código</th>
                                                                    <th style="width: 30%; text-align: left;">Nome</th>
                                                                    <th style="width: 15%; text-align: center;">Celular</th>
                                                                    <th style="width: 25%; text-align: center;">Email</th>
                                                                    <th style="width: 10%; text-align: center;">Permissão</th>
                                                                    <th style="width: 15%; text-align: center;">Ações</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                    <!-- /.card-body -->
                                                </div>
                                                <!-- /.card -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card card-danger">
                                <div class="card-header">
                                    <h4 class="card-title">
                                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
                                            Usuários Inativos
                                        </a>
                                    </h4>
                                </div>
                                <div id="collapseTwo" class="panel-collapse collapse">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="card">
                                                    <!-- /.card-header -->
                                                    <div class="card-body p-0">
                                                        <table class="table table-condensed" id="tableUsersInactive">
                                                            <thead>
                                                                <tr>
                                                                    <th style="width: 5%; text-align: center;">Código</th>
                                                                    <th style="width: 30%; text-align: left;">Nome</th>
                                                                    <th style="width: 15%; text-align: center;">Celular</th>
                                                                    <th style="width: 25%; text-align: center;">Email</th>
                                                                    <th style="width: 10%; text-align: center;">Permissão</th>
                                                                    <th style="width: 15%; text-align: center;">Ações</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                    <!-- /.card-body -->
                                                </div>
                                                <!-- /.card -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
        </div>
    </section>
    <?php
    include 'modalUsers.php';
    include 'scriptUsers.php';
    ?>
    <script>
        $(document).ready(function() {
            getUsersActive();
            getUsersInactive();
        });
    </script>
<?php } ?>