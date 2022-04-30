<?php

function verificadorCPF(String $cpf)
{
    $cpf = preg_replace('/[^0-9]/is', '', $cpf);

    if (strlen($cpf) !== 11 || preg_match('/(\d)\1{10}/', $cpf)) {
        print 'CPF não é valido';
    }

    for ($i = 9; $i < 11; $i++) {
        for ($j = 0, $k = 0; $k < $i; $k++) {
            $j += $cpf[$k] * (($i + 1) - $k);
        }

        $j = ((10 * $j) % 11) % 10;

        if ($cpf[$k] != $j) {
            print "CPF invalido";
        }
    }
    print "CPF válido";
}

verificadorCPF("477.163.230-83");
