<?php

class Application {
  private $listaGerentes = [];
  private $listaOperadores = [];
  private $listaFuncoes = [1 => 'Técnico Eletricista', 2=> 'Técnico Mecânico'];
  private $appName = "PHP Corporate Manager";

  public function __construct() {}

  public function getAppName() {
    return $this->appName;
  }

  public function render() {
    $page = <<<EOT
    <!DOCTYPE html>
    <html lang="pt-BR">
    
      <head>
        <title>{$this->getAppName()}</title>
        <meta  http-equiv="Content-Type" content="text/html" charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="css/php-corp.css" rel="stylesheet">
        <script src="js/php-corp.js" type="text/javascript"></script>
      </head>
    
      <body>
    
        <div class="app-container">
          <h1>{$this->getAppName()}</h1>
    
          <div class="notebook">
            <button class="aba aberta" onclick="abreAba(event, 'aba1')">Lista de Operadores</button>
            <button class="aba" onclick="abreAba(event, 'aba2')">Lista de Gerentes</button>
            <button class="aba" onclick="abreAba(event, 'aba3')">Cadastrar Operador</button>
            <button class="aba" onclick="abreAba(event, 'aba4')">Cadastrar Gerente</button>
          </div>
    
          <div id="aba1" class="conteudo"  style="display: block">
            <h2>Lista de Operadores</h2>
            <div class="lista">
              <div class="cabecalho-lista">
                <p>
                  <span>Matrícula</span>
                  <span>Nome</span>
                  <span>CPF</span>
                  <span>Salário</span>
                  <span>Função</span>
                </p>
              </div>
              <div id="listaOperadores"></div>
            </div>
          </div>
    
          <div id="aba2" class="conteudo">
            <h2>Lista de Gerentes</h2>
            <div class="lista">
              <div class="cabecalho-lista">
                <p>
                  <span>Matrícula</span>
                  <span>Nome</span>
                  <span>CPF</span>
                  <span>Departamento</span>
                  <span>Salário</span>
                </p>
              </div>
              <!-- Faça a lista de gerentes aqui -->
              <div id="listaGerentes"></div>
            </div>
          </div>
    
          <div id="aba3" class="conteudo">
            <h2>Cadastro de Operadores</h2>
            <div>
              <form action="app/controllers/OperadorController.php" method="POST">
                <div>
                  <input type="hidden" name="create" value=1/>
                  <label for="opMatr">Matrícula:</label>
                  <input type="text" id="opMatr" name="opMatr" readonly value=""></input>
                  <label for="opNome">Nome:</label>
                  <input type="text" id="opNome" name="opNome" style="width: 20rem"></input>
                </div>
                <div>
                  <label for="opCPF">CPF:</label>
                  <input type="text" id="opCPF" name="opCPF"></input>
                  <label for="opSlr">Salário:</label>
                  <input type="text" id="opSlr" name="opSlr"></input>
                  <label for="opFnd">Função:</label>
                  <select id="opFnc" name="opFnc">
                  </select>
                </div>
                <div>
                  <button type="submit" value="Salvar">Salvar</button>
                </div>
              </form>
            </div>
          </div>
    
          <div id="aba4" class="conteudo">
            <!-- Faça o cadastro de Gerentes aqui -->
            <h2>Cadastro de Gerentes</h2>
          </div>
    
        </div>
    
      </body>
    
    </html>
EOT;
    echo $page;
  }
}

/*
  public function addGerente(Gerente $grt) {
    array_push($this->listaGerentes, $grt);
  }

  public function addOperador(Operador $opr) {
    array_push($this->listaOperadores, $opr);
  }

  public function getListaGerentes() {
    return $this->listaGerentes;
  }

  public function getListaOperadores() {
    return $this->listaOperadores;
  }

  public function mostraTelaConsulta(string $categoria) {
    switch ($categoria) {
      case 'operadores':
        $operadores = $this->getListaOperadores();
        foreach($operadores as $op) {
          echo "<div class=\"item-lista\">";
          echo "<p>";
          echo "<span>" . $op->getMatricula() . "</span>\n";
          echo "<span>" . $op->getNome() . "</span>\n";
          echo "<span>" . formataCPF($op->getCPF()) . "</span>\n";
          echo "<span>" . "R$ ". number_format($op->getSalario(), 2) . "</span>\n";
          echo "<span>" . imprimeFuncao($op->getCodFuncao(), $this->listaFuncoes) . "</span>\n";
          echo "</p>";
          echo "</div>";
        }
        break;
      case 'gerentes':
        break;
      default:
        echo "<div><p>Opção inválida</p></div>";
        break;
    }
  }

  public function carregaListas() {
    $arquivo = file_get_contents(__DIR__.'/funcionarios.json');
    if($arquivo) {
      $fncs = json_decode($arquivo);
      foreach( $fncs->operadores as $op) {
        $novo = new Operador($op->matricula, $op->nome, $op->CPF, $op->salario, $op->funcao);
        $this->addOperador($novo);
      }

      foreach( $fncs->gerentes as $gr) {
        // Faça o carregamento dos Gerentes aqui

      }
    }
  }

  public function salvaListas() {
    $funcs = ["operadores" => [], "gerentes" => []];
    //funcs["operadores"] = $this->listaOperadores;
    foreach($this->listaOperadores as $op) {
      array_push($funcs['operadores'], $op);
    }
    foreach($this->listaGerentes as $gr) {
      array_push($funcs['gerentes'], $gr);
    }
    $json = json_encode($funcs, JSON_PRETTY_PRINT);
    $fp = fopen(__DIR__.'/funcionarios.json', 'w');
    fwrite($fp, $json);
    fclose($fp);
  }
}
*/