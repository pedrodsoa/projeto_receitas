<?php
class ReceitaModel {
    private $conexao;

    public function __construct($conexao) {
        $this->conexao = $conexao;
    }

    public function salvarNoBanco($nome, $ingredientes, $modoPreparo, $nomeArquivo) {
        $sql = "INSERT INTO Receita (nome, ingredientes, modo_preparo, foto) VALUES (?, ?, ?, ?)";
        
        $stmt = $this->conexao->prepare($sql);

        $stmt->bind_param("ssss", $nome, $ingredientes, $modoPreparo, $nomeArquivo);

        $stmt->execute();

        $stmt->close();

        return [
            'nome' => $nome,
            'ingredientes' => $ingredientes,
            'modoPreparo' => $modoPreparo,
            'nomeArquivo' => $nomeArquivo,
        ];
    }
}
?>

<?php
class ReceitaView {
    public function exibirDadosRecebidos($dados) {
        echo "<h2>Dados Recebidos:</h2>";
        echo "<p><strong>Nome da Receita:</strong> {$dados['nome']}</p>";
        echo "<p><strong>Ingredientes:</strong> {$dados['ingredientes']}</p>";
        echo "<p><strong>Modo de Preparo:</strong> {$dados['modoPreparo']}</p>";
        echo "<p><strong>Foto da Receita:</strong> {$dados['nomeArquivo']}</p>";
    }
}
?>

<?php
class ReceitaController {
    private $model;
    private $view;

    public function __construct($model, $view) {
        $this->model = $model;
        $this->view = $view;
    }

    public function processarFormulario() {
        session_start();

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $nome = $_POST["nome"];
            $ingredientes = $_POST["ingredientes"];
            $modoPreparo = $_POST["modoPreparo"];

            $nomeArquivo = $_FILES["fotoReceita"]["name"];
            $caminhoTemporario = $_FILES["fotoReceita"]["tmp_name"];
            $caminhoDestino = "caminho/onde/salvar/" . $nomeArquivo;

            move_uploaded_file($caminhoTemporario, $caminhoDestino);

            $dadosReceita = $this->model->salvarNoBanco($nome, $ingredientes, $modoPreparo, $nomeArquivo);

            $_SESSION['receita'] = $dadosReceita;

            $this->view->exibirDadosRecebidos($dadosReceita);
        } else {
            header("Location: cadastro-receitas.html");
            exit();
        }
    }
}
?>

<?php
require 'ReceitaModel.php';
require 'ReceitaView.php';
require 'ReceitaController.php';

$model = new ReceitaModel();
$view = new ReceitaView();
$controller = new ReceitaController($model, $view);

$controller->processarFormulario();
?>
