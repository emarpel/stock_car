<?php if ($action == "start") { ?>
  <br>
  <section class="content">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Definições do Sistema</h3>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-12">
        <div class="card card-primary card-outline card-outline-tabs">
          <div class="card-header p-0 border-bottom-0">
            <ul class="nav nav-tabs" id="custom-tabs-three-tab" role="tablist">
              <li class="nav-item">
                <a class="nav-link active" id="custom-tabs-three-home-tab" data-toggle="pill" href="#custom-tabs-three-home" role="tab" aria-controls="custom-tabs-three-home" aria-selected="true">Gerais</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="custom-tabs-three-profile-tab" data-toggle="pill" href="#custom-tabs-three-profile" role="tab" aria-controls="custom-tabs-three-profile" aria-selected="false">Sistema</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="custom-tabs-three-messages-tab" data-toggle="pill" href="#custom-tabs-three-messages" role="tab" aria-controls="custom-tabs-three-messages" aria-selected="false">Senhas e Permissões</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="custom-tabs-audit-tab" data-toggle="pill" href="#custom-tabs-audit" role="tab" aria-controls="custom-tabs-audit" aria-selected="false" onclick="getAudit();">Change Log</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="custom-tabs-three-settings-tab" data-toggle="pill" href="#custom-tabs-three-settings" role="tab" aria-controls="custom-tabs-three-settings" aria-selected="false">Avançado</a>
              </li>
            </ul>
          </div>
          <div class="card-body">
            <div class="tab-content" id="custom-tabs-three-tabContent">
              <div class="tab-pane fade show active" id="custom-tabs-three-home" role="tabpanel" aria-labelledby="custom-tabs-three-home-tab">
                Gerais
              </div>
              <div class="tab-pane fade" id="custom-tabs-three-profile" role="tabpanel" aria-labelledby="custom-tabs-three-profile-tab">
                Sistema
              </div>
              <div class="tab-pane fade" id="custom-tabs-three-messages" role="tabpanel" aria-labelledby="custom-tabs-three-messages-tab">
                Senhas e Permissões
              </div>
              <div class="tab-pane fade" id="custom-tabs-audit" role="tabpanel" aria-labelledby="custom-tabs-audit-tab">
                <div class="card-body">
                  <div class="row">
                    <div class="col-12">
                      <div class="card">
                        <!-- /.card-header -->
                        <div class="card-body p-0">
                          <table class="table table-condensed" id="tableAudit">
                            <thead>
                              <tr>
                                <th style="width: 20%; text-align: center;">Usuário</th>
                                <th style="width: 10%; text-align: left;">Data</th>
                                <th style="width: 10%; text-align: center;">Hora</th>
                                <th style="width: 20%; text-align: center;">Página</th>
                                <th style="width: 10%; text-align: center;">Ação</th>
                                <th style="width: 30%; text-align: center;">Descrição</th>
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
              <div class="tab-pane fade" id="custom-tabs-three-settings" role="tabpanel" aria-labelledby="custom-tabs-three-settings-tab">
                Avançado
              </div>
            </div>
          </div>
          <!-- /.card -->
        </div>
      </div>
    </div>
    <!-- /.row -->
  </section>

  <?php
    include 'scriptAudit.php';
  ?>
<?php } ?>