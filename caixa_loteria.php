<?php
print ("
    \033[1;097m------------------------
    |    loteria caixa      |
    -------------------------
    |Qual jogo deseja jogar:|
    -------------------------
    |\033[1;092m1° Mega-sena\033[097m           |   
    -------------------------
    |\033[1;094m2° Quina\033[097m               |
    -------------------------
    |\033[1;095m3° Lotofácil\033[097m           |
    -------------------------
    |\033[1;093m4° Lotomania\033[097m           | 
    -------------------------\033[0m\n");
do {
    $loteria = (int) readline();
    if ($loteria < 1 or $loteria> 4){
        print ("\033[1;091mOpção invalida!!\033[0m\n");
        print ("\033[1;096mTente novamente\033[0m\n");
    }else{
    switch ($loteria) {<?php
print("
    ------------------------
    |    loteria caixa     |
    ------------------------
    |Qualjogo deseja jogar:|
    ------------------------
    |\033[1;092m1° Mega-sena\033[0m          |   
    ------------------------
    |\033[1;34m2° Quina\033[0m              |
    ------------------------
    |\033[1;95m3° Lotofácil\033[0m          |
    ------------------------
    |\033[1;93m4° Lotomania\033[0m          |
    ------------------------\n");

do {
    $loteria = (int) readline();

    switch ($loteria) {
        case 1:
            print "\033c";
            print 'Mega-Sena selecionada: ';

            $min = 6;
            $max = 20;
            $preco = 6.00;
            $intervalo = [1, 60];

            break;
        case 2:
            print "\033c";
            print 'Lotofácil selecionada: ';
            $min = 15;
            $max = 20;
            $preco = 3.50;
            $intervalo = [1, 25];
            break;
        case 3:
            print "\033c";
            print 'Quina selecionada: ';
            $min = 5;
            $max = 15;
            $preco = 3.00;
            $intervalo = [1, 80];

            break;
        case 4:
            print "\033c";
            print 'Lotomanía selecionada: ';
            $min = 50;
            $max = 50;
            $preco = 3.00;
            $intervalo = [1, 100];

            break;

        default:
            print "Opção inválida tente novamente\n";
            break;
    }
} while ($loteria > 4 or $loteria < 1);

print "\nQuantas apostas você deseja gerar: \n";

        case 1:
            print ("\033c");
            print ("\033[1;092mMega-Sena selecionada: \033[0m");

            $min = 6;
            $max = 20;
            $preco = 6.00;
            $intervalo = [1, 60];

            break;
        case 2:
            print ("\033c");
            print ("\033[1;095mLotofácil selecionada: \033[0m");
            $min = 15;
            $max = 20;
            $preco = 3.50;
            $intervalo = [1, 25];
            break;
        case 3:
            print ("\033c");
            print ("\033[1;094mQuina selecionada: \033[0m");
            $min = 5;
            $max = 15;
            $preco = 3.00;
            $intervalo = [1, 80];

            break;
        case 4:
            print ("\033c");
            print ("\033[1;093mLotomanía selecionada: \033[0m");
            $min = 50;
            $max = 50;
            $preco = 3.00;
            $intervalo = [1, 100];

            break;
        }
    }
} while ($loteria > 4 or $loteria < 1);

print ("\n\033[1;097mQuantas apostas você deseja gerar: \033[0m\n");
do {
   $quantidade_apostas = (int) readline();
   if ($quantidade_apostas < 1){
        print ("\033[1;091mOpção invalida!!\033[0m\n");
        print ("\033[1;096mNúmero de apostas mínimas é 1\033[0m\n");
        print ("\033[1;096mTente novamente\033[0m\n");      
   } 
} while ($quantidade_apostas < 1);

print ("\033[1;097mQuantas dezenas você quer jogar: (Mínimo: $min. Máximo $max)\033[0m\n");
do {
    $quantidade_dezenas = (int) readline();
    if ($quantidade_dezenas< $min or $quantidade_dezenas > $max){
        print ("\033[1;091mOpção invalida!!\033[0m\n");
        print ("\033[1;096mTente novamente\033[0m\n");  
    }
} while ($quantidade_dezenas < $min or $quantidade_dezenas > $max);

$n = $quantidade_dezenas;
$k = $min;
$nk = $n - $k;

$fatorial_k = 1;
$fatorial_n = 1;
$fatorial_nk = 1;

for ($i = $quantidade_dezenas; $i >= 1; $i--) {
    $fatorial_n *=  $i;
}
for ($i = $min; $i >= 1; $i--) {
    $fatorial_k *= $i;
}
for ($i = $nk; $i >= 1; $i--) {
    $fatorial_nk *= $i;
}
$preco = ($fatorial_n / ($fatorial_k * $fatorial_nk)) * $preco;
print ("\033c");
print ("\033[1;097mValor total: R$" . $quantidade_apostas * $preco . "\nPreço por aposta: R$$preco\n");

for ($i = 0; $i < $quantidade_apostas; $i++) {
    print ($i+1 . "º aposta: " . implode(", ",surpresinha($quantidade_dezenas, $intervalo[0], $intervalo[1])) . "\n");
}

function surpresinha($dezenas, $min, $max)
{
    do {
        for ($i = 0; $i < $dezenas; $i++) {
            $numeros_sorteados[$i] = rand($min, $max);
        }
        $numeros_sorteados = array_unique($numeros_sorteados);
    } while (sizeof($numeros_sorteados) < $dezenas);
    sort($numeros_sorteados);
    return $numeros_sorteados;
}
