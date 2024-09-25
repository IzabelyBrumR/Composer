<?php

namespace Model;

class TarefasModel
{


    protected $id;
    protected $nome;
    protected $descricao;
    protected $prazo;
    protected $projeto_id;
    protected $status_id;

    public    $total;

    public function __construct() {}
    
    /**
     * Get the value of id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     */
    public function setId($id): self
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of nome
     */
    public function getNome()
    {
        return $this->nome;
    }

    /**
     * Set the value of nome
     */
    public function setNome($nome): self
    {
        $this->nome = $nome;

        return $this;
    }

    /**
     * Get the value of descricao
     */
    public function getDescricao()
    {
        return $this->descricao;
    }

    /**
     * Set the value of descricao
     */
    public function setDescricao($descricao): self
    {
        $this->descricao = $descricao;

        return $this;
    }

    /**
     * Get the value of prazo
     */
    public function getPrazo()
    {
        return $this->prazo;
    }

    /**
     * Set the value of prazo
     */
    public function setPrazo($prazo): self
    {
        $this->prazo = $prazo;

        return $this;
    }

    /**
     * Get the value of projeto_id
     */
    public function getProjetoId()
    {
        return $this->projeto_id;
    }

    /**
     * Set the value of projeto_id
     */
    public function setProjetoId($projeto_id): self
    {
        $this->projeto_id = $projeto_id;

        return $this;
    }

    /**
     * Get the value of status_id
     */
    public function getStatusId()
    {
        return $this->status_id;
    }

    /**
     * Set the value of status_id
     */
    public function setStatusId($status_id): self
    {
        $this->status_id = $status_id;

        return $this;
    }

    /**
     * Get the value of total
     */
    public function getTotal()
    {
        return $this->total;
    }

    /**
     * Set the value of total
     */
    public function setTotal($total): self
    {
        $this->total = $total;

        return $this;
    }

    public function loadByIdTarefas($id)
    {

        $db = new ConexaoMysql;
        $db->conectar();

        $sql = 'SELECT * FROM tarefas WHERE id=' . $id;

        $resultList = $db->consultar($sql);

        if ($db->total > 0) {
            foreach ($resultList as $key => $value) {
                $this->id = $value['id'];
                $this->nome = $value['nome'];
                $this->descricao = $value['descricao'];
                $this->prazo = $value['prazo'];
                $this->projeto_id = $value['projeto_id'];
                $this->status_id = $value['status_id'];
            }
        }
        $db->desconectar();

        //Retorna o total de registros que vem da consulta $sql no banco de dados.
        $this->total = $db->total;

        return $this;
    }

    public function loadAllTarefas()
    {

        $db = new ConexaoMysql;
        $db->conectar();

        $sql = 'SELECT * FROM tarefas';

        $resultList = $db->consultar($sql);

        $db->desconectar();

        //Retorna o total de registros que vem da consulta $sql no banco de dados.
        $this->total = $db->total;

        return $resultList;
    }

    public function delete($id)
    {

        $db = new ConexaoMysql;
        $db->conectar();

        $sql = 'DELETE FROM tarefas WHERE id=' . $id;

        $db->executar($sql);

       $db->desconectar();

        //Retorna o total de registros que vem da consulta $sql no banco de dados.
        $this->total = $db->total;

        return $this->total;
    }

    public function saveTarefas()
    {

        $db = new ConexaoMysql;
        $db->conectar();

        if ($this->getId() == 0) {
            //Inserir
            $sql = 'INSERT INTO tarefas 
                        VALUES(0,"'.$this->nome.'","'.$this->descricao.'",
                            "'.$this->prazo.'","'.$this->projeto_id.'",
                            '.$this->status_id.')';
        } else {
            //Atualizar
            $sql = 'UPDATE tarefas SET nome="'.$this->nome.'",
             descricao="'.$this->descricao.'", prazo="'.$this->prazo.'", projeto_id='.$this->projeto_id.', status_id='.$this->status_id.' WHERE id='.$this->id.';';
        }

        $db->executar($sql);
        $db->desconectar();
        //Retorna o total de registros que vem da consulta $sql no banco de dados.
        $this->total = $db->total;
        return $this->total;
    }

}
