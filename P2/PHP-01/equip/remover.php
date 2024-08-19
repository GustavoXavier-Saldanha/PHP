<?php
require_once 'src/RepositorioEquipamentoEmBDR.php';

if (isset($_GET['id'])) {
    die('Informe o parâmetro ID');
}

$id = $_GET['id'];
if(!is_numeric($id) | $id < 0){
 die('O número deve ser um número positivo');
}

try {
    $pdo = conectar()
    


} catch (\Throwable $th) {
    //throw $th;
}