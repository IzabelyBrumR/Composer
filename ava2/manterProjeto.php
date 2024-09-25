<?php
use Controller\ProjetosController;
require_once 'vendor/autoload.php';
require_once './shared/header.php';

$projetos = new ProjetosController;

if ($_REQUEST) {

    if(isset($_REQUEST['id'])){
        $id = $_REQUEST['id'];
        
        $objetoProjetos = $projetos->loadByIdProjects($id);

        if($_REQUEST['cod']=='excluir'){
            $projetos->delete($id);
        }

    }

    if ($_REQUEST['cod'] == 'success') {
        echo '<divclass="alert alert-primary alert-dismissible fade show" role="alert">
                    <button
                        type="button"
                        class="btn-close"
                        data-bs-dismiss="alert"
                        aria-label="Close"
                    ></button>
                    <strong>Registro inserido com sucesso.</strong> Alert Content
                </div>';
    }else if($_REQUEST['cod']=='error'){

        echo '<divclass="alert alert-danger alert-dismissible fade show" role="alert">
                    <button
                        type="button"
                        class="btn-close"
                        data-bs-dismiss="alert"
                        aria-label="Close"
                    ></button>
                    <strong>Ocorreu um erro.</strong> Alert Content
                </div>';

    }
}
?>

<div class="container my-4">
        <h1 class="mb-4">Cadastro de Novo Projeto</h1>
        <form method="post" action="<?php $projetos->saveProjects(); ?>">
            <input type="hidden" name="id" value="<?php echo(empty($objetoProjetos)? '0': $objetoProjetos->getId());?>">
            <div class="mb-3">
                <label for="nomeProjeto" class="form-label">Nome do Projeto</label>
                <input type="text" class="form-control" id="nomeProjeto" name="nome" value="<?php echo(empty($objetoProjetos)? '': $objetoProjetos->getNome());?>" placeholder="Insira o nome do produto" required>
            </div>
            <div class="mb-3">
                <label for="descricaoProjeto" class="form-label">Descrição</label>
                <textarea class="form-control" id="descricao" name="descricao" rows="3" value="<?php echo(empty($objetoProjetos)? '': $objetoProjetos->getDescricao());?>" placeholder="Insira a descrição do produto"required></textarea>
            </div>
            <div class="mb-3">
                <label for="statusProjeto" class="form-label">Status</label>
                <select class="form-select" id="status_id" name="status_id" required>
                    <!-- TODO: Adicione os status dinamicamente - Contempla funcionalidade de cadastrar e editar projeto (Não apagar TODO.) -->
                    <option value="1" selected>Em Andamento</option>
                    <option value="2">Concluído</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="dataInicio" class="form-label">Data de Início</label>
                <input type="date" class="form-control" id="data_inicio" name="data_inicio" value="<?php echo(empty($objetoProjetos)? '': $objetoProjetos->getDataInicio());?>" placeholder="Insira a data de inicio" required>
            </div>
            <div class="mb-3">
                <label for="dataFim" class="form-label">Data de Término</label>
                <input type="date" class="form-control" id="data_fim" name="data_fim" value="<?php echo(empty($objetoProjetos)? '': $objetoProjetos->getDataFim());?>" placeholder="Insira a data de fim" required>
            </div>
            <input type="submit" class="btn btn-primary" value="Salvar">
            <a href="listarProjetos.php" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>

<?php
require_once './shared/footer.php';
?>