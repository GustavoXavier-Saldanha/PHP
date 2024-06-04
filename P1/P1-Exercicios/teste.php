<?php

interface Impressora {
    function imprimir( $texto );
   }
   interface ImpressoraConfiguravel extends Impressora {
    function configurar( array $parametros );
   }
   class ImpressoraFabricanteXPTO {
    public function enviar( $conteudo ) { /*...*/ }
    public function definirPorta( $porta ) { /*...*/ }
   }
   class ImpressoraXPTO extends ImpressoraFabricanteXPTO implements ImpressoraConfiguravel {
    public function imprimir( $texto ) { $this->enviar( $texto ); }
    public function configurar( array $parametros ) { $this->definirPorta( $parametros[ 'porta' ] ); }
   }
   $i = new ImpressoraXPTO();
   $i->configurar( [ 'porta' => 'USB001' ]);
   $i->imprimir( 'Teste de Impressão' );