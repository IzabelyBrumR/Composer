<?php

namespace Model;

class ProjetosModel
{


    protected $id;
    protected $nome;
    protected $descricao;
    protected $data_inicio;
    protected $data_fim;
    protected $usuario_id;
    protected $status_id;

    public $total;


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
     * Get the value of data_inicio
     */
    public function getDataInicio()
    {
        return $this->data_inicio;
    }

    /**
     * Set the value of data_inicio
     */
    public function setDataInicio($data_inicio): self
    {
        $this->data_inicio = $data_inicio;

        return $this;
    }

    /**
     * Get the value of data_fim
     */
    public function getDataFim()
    {
        return $this->data_fim;
    }

    /**
     * Set the value of data_fim
     */
    public function setDataFim($data_fim): self
    {
        $this->data_fim = $data_fim;

        return $this;
    }

    /**
     * Get the value of usuario_id
     */
    public function getUsuarioId()
    {
        return $this->usuario_id;
    }

    /**
     * Set the value of usuario_id
     */
    public function setUsuarioId($usuario_id): self
    {
        $this->usuario_id = $usuario_id;

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

    public function loadByIdProjects($id)
    {

        $db = new ConexaoMysql;
        $db->conectar();

        $sql = 'SELECT * FROM projetos WHERE id=' . $id;

        $resultList = $db->consultar($sql);

        if ($db->total > 0) {
            foreach ($resultList as $key => $value) {
                $this->id = $value['id'];
                $this->nome = $value['nome'];
                $this->descricao = $value['descricao'];
                $this->data_inicio = $value['data_inicio'];
                $this->data_fim = $value['data_fim'];
                $this->usuario_id = $value['usuario_id'];
                $this->status_id = $value['status_id'];
            }
        }
        $db->desconectar();

        //Retorna o total de registros que vem da consulta $sql no banco de dados.
        $this->total = $db->total;

        return $this;
    }

    public function loadAllProjects()
    {

        $db = new ConexaoMysql;
        $db->conectar();

        $sql = 'SELECT * FROM projetos';

        $resultList = $db->consultar($sql);

        $db->desconectar();

        //Retorna o total de registros que vem da consulta $sql no banco de dados.
        $this->total = $db->total;

        return $resultList;
    }

    public function saveProjects()
    {

        $db = new ConexaoMysql;
        $db->conectar();

        if ($this->getId() == 0) {
            //Inserir
            $sql = 'INSERT INTO projetos 
                        VALUES(0,"'.$this->nome.'","'.$this->descricao.'",
                            "'.$this->data_inicio.'","'.$this->data_fim.'",
                            '.$this->usuario_id.','.$this->status_id.')';
        } else {
            //Atualizar
            $sql = 'UPDATE projetos SET nome="'.$this->nome.'",
             descricao="'.$this->descricao.'", data_inicio="'.$this->data_inicio.'", usuario_id='.$this->usuario_id.', status_id='.$this->status_id.' WHERE id='.$this->id.';';
        }

        $db->executar($sql);
        $db->desconectar();
        //Retorna o total de registros que vem da consulta $sql no banco de dados.
        $this->total = $db->total;
        return $this->total;
    }


    public function delete($id)
    {

        $db = new ConexaoMysql;
        $db->conectar();

        $sql = 'DELETE FROM projetos WHERE id=' . $id;

        $db->executar($sql);

       $db->desconectar();

        //Retorna o total de registros que vem da consulta $sql no banco de dados.
        $this->total = $db->total;

        return $this->total;
    }


    
}
