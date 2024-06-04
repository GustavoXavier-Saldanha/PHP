<?php
// 1) Crie uma função que retorne formatado um número de telefone recebido por argumento. O
// formato deve estar acordo com os exemplos fornecidos abaixo:
//
// Dígitos - Exemplo de Entrada - Exemplo de Saída
// 8 - 30044000 3004 4000
// 10 - 2225271727 - (22) 2527-1727
// 11 - 22987654321 - (22) 9-8765-4321
// 11, mas começa com 0800 ou 0300 - 08007024000 - 0800 702 4000
//
// Se o número recebido pela função contiver algum caractere não numérico, a função deve
// retornar o próprio número recebido. O mesmo comportamento deve ocorrer caso a
// quantidade de dígitos do número não corresponder aos exemplificados na tabela acima.


// 2) Crie uma função que receba, via passagem por referência, um array de números de
// telefone não formatados e formate cada telefone desse array com a função construída
// anteriormente.
function formatPhoneNumbers($number)
{
    $nLen = strlen($number);
    if ($nLen == 8) {
        return substr($number, 0, 4) . " " . substr($number, 4);
    } else if ($nLen == 10) {
        return "(" . substr($number, 0, 2) . ") " . substr($number, 2, 4) . "-" . substr($number, 6);
    } else if ($nLen == 11) {
        if (substr($number, 0, 4) == "0800" || substr($number, 0, 4) == "0300") {
            return substr($number, 0, 4) . " " . substr($number, 4, 3) . " " . substr($number, 7);
        } else {
            return
                "(" . substr($number, 0, 2) . ") " .
                substr($number, 2, 1) . "-" .
                substr($number, 3, 3) . "-" .
                substr($number, 7);
        }
    } else {
        return $number;
    }
}

//echo formatPhoneNumbers('1234-123');

// 3) Crie uma função que receba um array de números de telefone (formatados ou não) e retorne
// os telefones repetidos desse array (uma ocorrência de cada número repetido).

function repeatedNumbers($arr)
{
    $formatedArr = [];
    foreach ($arr as $a) {
        $formatedArr[] = formatPhoneNumbers($a);
    }

    $repeatedNum = array_count_values($formatedArr);
    $arrRep = [];
    foreach ($repeatedNum as $n => $rn) {
        if ($rn > 1) {
            $arrRep[] = $n;
        }
    }
    return $arrRep;
}

$listNum = ["(22) 2527-1727", "3004 4000", "30044000", "(22) 9-8765-4321", "0800 702 4000"];
//print_r(repeatedNumbers($listNum));

//4) Dado o array de inventores abaixo:
// $inventores = [
// [ "nome" => 'Albert', "sobrenome" => 'Einstein', "nasc" => 1879,
// "morte" => 1955 ],
// [ "nome" => 'Isaac', "sobrenome" => 'Newton', "nasc" => 1643,
// "morte" => 1727 ],
// [ "nome" => 'Galileo', "sobrenome" => 'Galilei', "nasc" => 1564,
// "morte" => 1642 ],
// [ "nome" => 'Nicolaus', "sobrenome" => 'Copernicus', "nasc" => 1473,
// "morte" => 1543 ],
// [ "nome" => 'Ada', "sobrenome" => 'Lovelace', "nasc" => 1815,
// "morte" => 1852 ]
// ];
// a) Crie uma função que receba o array de inventores e retorne outro array contendo o
// sobrenome de cada inventor e uma chave indicando quantos anos viveu. Por exemplo,
// se o array de inventores tivesse apenas Einstein, seria retornado um array como o
// abaixo:
// [ [ "sobrenome" => 'Einstein', "viveu" => 77 ] ]

$inventores = [
    [
        "nome" => 'Albert', "sobrenome" => 'Einstein', "nasc" => 1879,
        "morte" => 1955
    ],
    [
        "nome" => 'Isaac', "sobrenome" => 'Newton', "nasc" => 1643,
        "morte" => 2527
    ],
    [
        "nome" => 'Galileo', "sobrenome" => 'Galilei', "nasc" => 1564,
        "morte" => 1642
    ],
    [
        "nome" => 'Nicolaus', "sobrenome" => 'Copernicus', "nasc" => 1473,
        "morte" => 1843
    ],
    [
        "nome" => 'Ada', "sobrenome" => 'Lovelace', "nasc" => 1815,
        "morte" => 1852
    ]
];

function filterInventor($inventores)
{
    $arr = [];
    foreach ($inventores as $i) {
        $arr[] = [
            'sobrenome' => $i['sobrenome'],
            'viveu' => $i['morte'] - $i['nasc']
        ];
    }

    return $arr;
};

//print_r(filterInventor($inventores));

// b) Crie uma função que receba o array de inventores e retorne a média de anos vividos
// por eles.

function mediaVida($inventores)
{
    $sumVida = 0;
    $numInventors = count($inventores);
    foreach ($inventores as $i) {
        $sumVida += $i['morte'] - $i["nasc"];
    };

    return $sumVida / $numInventors;
}

//echo mediaVida($inventores);

// c) Crie uma função que receba o array de inventores e número de um século (ex.: 16) e
// retorne somente os inventores que viveram nele, mesmo que parcialmente.

function filtroPorSeculo($inventores, $sec)
{
    $secInit = ($sec * 100) - 99;
    $secFim = $sec * 100;
    echo $secInit . ' ' . $secFim;

    $arr = [];
    foreach ($inventores as $i) {
        if (
            $i['nasc'] <= $secFim && $i['morte'] >= $secInit
        ) {
            $arr[] = $i;
        }
    }
    return $arr;
};

//print_r(filtroPorSeculo($inventores, 21));

//d) Crie uma função que retorne os inventores ordenados pelo sobrenome.

function ordenarInventores($inventores)
{
    $arr = [];

    return $arr;
}


// 5) Crie uma função que receba o array abaixo e retorne outro array que contabilize o
// número de ocorrências de cada palavra.
// $dados = [ 'carro', 'carro', 'caminhão', 'caminhão', 'bicicleta',
// 'caminhada', 'carro', 'van', 'bicicleta', 'caminhada', 'carro',
// 'van', 'carro', 'caminhão' ];

$dados = [
    'carro', 'carro', 'caminhão', 'caminhão', 'bicicleta',
    'caminhada', 'carro', 'van', 'bicicleta', 'caminhada', 'carro',
    'van', 'carro', 'caminhão'
];

//print_r(array_count_values($dados));

// EXERCÍCIO 6 - AULA
// Dado o array abaixo, gere uma tabela HTML que apresente
// seus dados. Use heredoc na solução.
// EXERCÍCIO 2
// Adiciona, à tabela criada anteriomente, um rodapé
// que contenha o somatório do estoque e a média dos
// preços dos produtos, nas respectivas colunas.
// Use heredoc na solução.

$produtos = [
    [
        'descricao' => 'Guaraná',
        'estoque' => 10,
        'preco' => 8.00
    ],
    [
        'descricao' => 'Coca Cola',
        'estoque' => 50,
        'preco' => 9.00
    ],
    [
        'descricao' => 'Pepsi',
        'estoque' => 20,
        'preco' => 8.50
    ],
];

function salvarParaArquivo($html)
{
    file_put_contents('produtos.html', $html);
    echo 'Salvo.', PHP_EOL;
}

$somaEstoque = 0;
$somaPrecos = 0;

$html = <<<'HTML'
    <style>
    table, th, td {
      border: 1px solid black;
      padding: 5px;
    }
    </style>
    <table>
      <thead>
        <tr>
          <th>Descrição</th>
          <th>Estoque</th>
          <th>Preço</th>
        </tr>
      </thead>
      <tbody>
  HTML;

foreach ($produtos as $p) {
    $html .= <<<LINE
      <tr>
        <td>{$p['descricao']}</td>
        <td>{$p['estoque']}</td>
        <td>{$p['preco']}</td>
      </tr>
    LINE;

    $somaEstoque += $p['estoque'];
    $somaPrecos += $p['preco'];
}

$mediaProdutos = $somaPrecos / count($produtos);

$html .= <<<HTML
      </tbody>
    </table>
  HTML;

$html .= <<<HTML
    <tfoot>
      <tr>
        <td>Estoque = </td>
        <td>$somaEstoque</td>
      </tr>
      <br>
      <tr>
        <td>Média = </td>
        <td>$mediaProdutos</td>
      </tr>
    </tfoot>
  HTML;

//salvarParaArquivo($html);


//   7) Crie uma função removerDiacriticos que remova de um texto, fornecido por
//   parâmetro, os diacríticos de vogais acentuadas com acento agudo, acento grave, trema,
//   acento circunflexo e til, além de remover a cedilha da consoante c

function removerDiacriticos($texto)
{
    $texto = preg_replace('/[áéíóúÁÉÍÓÚ]/u', '', $texto);
    $texto = preg_replace('/[àèìòùÀÈÌÒÙ]/u', '', $texto);
    $texto = preg_replace('/[âêîôûÂÊÎÔÛ]/u', '', $texto);
    $texto = preg_replace('/[ãõÃÕ]/u', '', $texto);
    $texto = preg_replace('/[äëïöüÄËÏÖÜ]/u', '', $texto);
    $texto = preg_replace('/ç/u', '', $texto);

    return $texto;
}

//echo removerDiacriticos("Café é tão gostoso!");

// 8) Crie uma função removerPontuacao que remova todos os espaços de um texto, além das
// seguintes pontuações: vírgula, traço, ponto, ponto-e-vírgula, dois pontos, exclamação e
// ponto-de-interrogação

function removerPontuacao($texto) {
    $texto = str_replace([' '], '', $texto);
    $texto = str_replace([',','-','.',';',':','!','?'], '', $texto);
    
    return $texto;
  }

echo removerPontuacao("Café: é? têão gos!to,s.o!");