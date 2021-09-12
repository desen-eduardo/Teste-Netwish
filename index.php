<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teste Netwish</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" integrity="sha512-5A8nwdMOWrSz20fDsjczgUidUBR8liPYU+WymTZP1lmY9G6Oc7HlZv156XqnsgNUzTyMefFTcsFH/tnJE/+xBg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="assets/css/style.css" />
</head>
<body>
    <div class="container">
        <div class="card mt-3">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <button type="button" class="btn btn-info" id="novoRegistro" data-toggle="modal" data-target="#registro">
                        <i class="fa fa-plus"></i> 
                    Registro</button>
                    <img src="assets/images/logo.jpeg" class="logo" alt="logo">    
                </div>
            
                <div class="row mt-5">
                    <div class="col-md-12">
                        <table class="table table-hover table-bordered table-responsive" width="100%" id="tabelaCorrespondencia">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th>Data e hora da solicitação da correspondência</th>
                                    <th>Data de Envio</th>
                                    <th>Nome da empresa</th>
                                    <th>A/C</th>
                                    <th>CEP</th>
                                    <th>Código de Rastreio</th>
                                    <th>Enviado por</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                        <!-- end table-->
                    </div>
                </div>

                <div class="modal fade" id="registro" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="modalLabelTitle" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="modalLabelTitle">Cadastro</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="nomeEmpresa">Nome da Empresa</label>
                                        <input type="text" name="nomeEmpresa" id="nomeEmpresa" class="form-control" placeholder="Nome da Empresa">
                                        <input type="hidden" id="idCorrespondencia" name="idCorrespondencia">
                                    </div>
                                </div>
                                
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="acDestinatario">A/C do destinatárioa</label>
                                        <input type="text" name="acDestinatario" id="acDestinatario" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="cep">Cep</label>
                                        <input type="text" name="cep" id="cep" class="form-control" placeholder="00000-000">
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="logradouro">Logradouro</label>
                                        <input type="text" name="logradouro" id="logradouro" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-7">
                                    <div class="form-group">
                                        <label for="cidade">Cidade</label>
                                        <input type="text" name="cidade" id="cidade" class="form-control">
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="numero">Número</label>
                                        <input type="text" name="numero" id="numero" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="estado">Estado</label>
                                        <input type="text" name="estado" id="estado" class="form-control" maxlength="2" placeholder="UF">
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="complemento">Complemento</label>
                                        <textarea name="complemento" id="complemento" cols="3" rows="3" class="form-control"></textarea>
                                    </div>
                                </div>

                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label for="pessoaResponsavel">Pessoa Responsavel Pelo Enviou</label>
                                        <input type="text" name="pessoaResponsavel" id="pessoaResponsavel" class="form-control" placeholder="Nome do Responsável">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <label for="tipo">Tipo</label>
                                    <select name="tipo" id="tipo" class="form-control">
                                        <option value="" selected disabled>Escolher uma das Opções</option>
                                        <option value="carta comum">Carta Comum</option>
                                        <option value="carta registrada">Carta Registrada</option>
                                        <option value="pac">Pac</option>
                                        <option value="sedex">Sedex</option>
                                    </select>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="ar">AR</label>
                                        <textarea name="ar" id="ar" cols="3" rows="3" class="form-control"></textarea>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="dataEnvio">Data de Envio</label>
                                        <input type="date" name="dataEnvio" id="dataEnvio" class="form-control">
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="codigoRastreio">Codigo de Rastreio</label>
                                        <input type="text" name="codigoRastreio" id="codigoRastreio" class="form-control" maxlength="13" placeholder="QR283929345BR">
                                    </div>
                                </div>

                                <div class="col-md-5">
                                    <div class="form-group">
                                        <label for="usuario">Usuário</label>
                                        <input type="text" name="usuario" id="usuario" class="form-control" placeholder="Nome do Usuário">
                                    </div>
                                </div>

                          </div>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                          <button type="button" class="btn btn-success" id="salvar">Salvar</button>
                        </div>
                      </div>
                    </div>
                  </div>
                <!-- modal-->
            </div>    
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.5/dist/sweetalert2.all.min.js"></script>
    <script src="assets/js/maskInput.js"></script>
    <script src="assets/js/script.js"></script>
</body>
</html>