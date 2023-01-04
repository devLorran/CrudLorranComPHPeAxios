<?php 
    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Expose-Headers: Content-Length, X-JSON");
    header("Access-Control-Allow-Methods: GET, POST, PATCH, PUT, DELETE, OPTIONS");
    header("Access-Control-Allow-Headers: *");
    include('includes/header.php');
?>
<div class="container">
    <div class="row mt-4">
        <div class="col-md-6 mx-auto">
            <div class="card bg-light">
                <div class="car-body">
                    <h3 class="card-title p-2 text-center">Usuário</h3>
                    <hr>
                    <div id="message"></div>
                    <div class="p-2">
                        <div class="form-group">
                            <label for="nome">Nome</label>
                            <input type="text" name="nome" id="nome" class="form-control" placeholder="Digite seu nome">
                            <input type="hidden" name="id" id="id">
                        </div>
                        <div class="form-group">
                            <label for="email">E-mail</label>
                            <input type="email" name="email" id="email" class="form-control" placeholder="Digite seu E-mail">
                        </div>
                        <div class="form-group">
                            <label for="senha">Senha</label>
                            <input type="password" name="senha" id="senha" class="form-control" placeholder="Crie uma senha">
                        </div>
                        <div class="form-group">
                            <button class="btn btn-danger" id="addBtn">Enviar</button>
                            <button class="btn btn-warning" style="display:none" id="updateBtn">Alterar</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row mt-4">
        <div class="col-md-6 mx-auto">
            <div class="card">
                <div class="card-body bg-light">
                    <div id="results"></div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php 
    include('includes/footer.php');
?>