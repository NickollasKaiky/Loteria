<?php
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
do {
    $quantidade_apostas = (int) readline();
} while ($quantidade_apostas < 1);

print "Quantas dezenas você quer jogar: (Minimo: $min. Máximo $max) \n";
do {
    $quantidade_dezenas = (int) readline();
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
print "\033c";
print "Valor total: R$" . $quantidade_apostas * $preco . "\nPreço por aposta: R$$preco\n";

for ($i = 0; $i < $quantidade_apostas; $i++) {
    print($i+1 . "º aposta: " . implode(", ",surpresinha($quantidade_dezenas, $intervalo[0], $intervalo[1])) . "\n");
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
