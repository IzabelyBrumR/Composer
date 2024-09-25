<?php
use Controller\TarefasController;
require_once 'vendor/autoload.php';
require_once './shared/header.php';

$tarefas = new TarefasController;

if ($_REQUEST) {

    if(isset($_REQUEST['id'])){
        $id = $_REQUEST['id'];
        
        $objetoTarefas = $tarefas->loadByIdTarefas($id);

        if($_REQUEST['cod']=='excluir'){
            $tarefas->delete($id);
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
    <h1 class="mb-4">Cadastro de Nova Tarefa</h1>
    <form action="<?php $tarefas->saveTarefas(); ?>" method="POST">
    <input type="hidden" name="id" value="<?php echo(empty($objetoTarefas)? '0': $objetoTarefas->getId());?>">
        <div class="mb-3">
            <label for="nomeTarefa" class="form-label">Nome da Tarefa</label>
            <input type="text" class="form-control" id="nomeTarefa" name="nome" value="<?php echo(empty($objetoTarefas)? '': $objetoTarefas->getNome());?>" required>
        </div>
        <div class="mb-3">
            <label for="descricaoTarefa" class="form-label">Descrição</label>
            <textarea class="form-control" id="descricaoTarefa" name="descricao" rows="3" value="<?php echo(empty($objetoTarefas)? '': $objetoTarefas->getDescricao());?>"required></textarea>
        </div>
        <div class="mb-3">
            <label for="projetoTarefa" class="form-label">Projeto</label>
            <select class="form-select" id="projetoTarefa" name="projeto_id" required>
                <option value="" selected>Escolha um projeto...</option>
                 <!-- TODO: Adicione os projetos dinamicamente  - Contempla funcionalidade extra de cadastrar e editar tarefa (Não apagar TODO.) -->
                <option value="1">Projeto 1</option>
                <option value="2">Projeto 2</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="statusTarefa" class="form-label">Status</label>
            <select class="form-select" id="status_id" name="status_id" required>
                 <!-- TODO: Adicione os status dinamicamente - Contempla funcionalidade extra de cadastrar e editar tarefa (Não apagar TODO.) -->
                <option value="1" selected>Pendente</option>
                <option value="2">Em Andamento</option>
                <option value="3">Concluído</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="prazoTarefa" class="form-label">Prazo</label>
            <input type="date" class="form-control" id="prazoTarefa" name="prazo" value="<?php echo(empty($objetoTarefas)? '': $objetoTarefas->getPrazo());?>" required>
        </div>
        <input type="submit" class="btn btn-primary" value="Salvar">
        <a href="listarTarefas.php" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
<?php
require_once './shared/footer.php';
?>