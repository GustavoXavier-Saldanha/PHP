<?php

namespace Mma;

interface RepositorioLutador{
   public function adicionarLutador(\Lutador $lutador): void;
   public function removerLutador($id): void; 
}

?>