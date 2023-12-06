<?php 

    class Usuario{

        public int $id_us;
        public string $email;
        public string $senha;
        public string $nome;

        public function cadastrar($id_us, $email, $senha, $nome)
        {

            $this->nome = $nome;
            $this->id_us = $id_us;
            $this->email = $email;
            $this->senha = $senha;
        }

    }

?>