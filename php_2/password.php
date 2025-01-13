<?php



function controlloLunghezza($string)
{
    $check = false;
    if (strlen($string) > 7) {
        $check = true;
    }
    if (!$check) {
        echo "La password deve contenere almeno 8 caratteri! \n";
    }
    return $check;

}

function controlloMaiuscola($string)
{
    $check = false;
    for ($i = 0; $i < strlen($string); $i++) {
        if (ctype_Upper($string[$i])) {
            $check = true;
        }
    }
    if (!$check) {
        echo "La password deve contenere almeno un carattere maiuscolo! \n";
    }
    return $check;
}

function controlloMinuscola($string)
{
    $check = false;
    for ($i = 0; $i < strlen($string); $i++) {
        if (ctype_Lower($string[$i])) {
            $check = true;
        }
    }
    if (!$check) {
        echo "La password deve contenere almeno un carattere minuscolo! \n";
    }
    return $check;
}
function controlloSpeciale($string)
{
    $check = false;
    for ($i = 0; $i < strlen($string); $i++) {
        if (!ctype_alnum($string[$i])) {
            $check = true;
        }
    }
    if (!$check) {
        echo "La password deve contenere almeno un carattere speciale! \n";
    }
    return $check;
}

function controlloPassword($string)
{
    // $check = false;
    $checkLung = controlloLunghezza($string);
    $checkMiausc = controlloMaiuscola($string);
    $checkMinusc = controlloMinuscola($string);
    $checkSpe = controlloSpeciale($string);

    if ($checkLung && $checkMiausc && $checkMinusc && $checkSpe) {
        echo "La password ''" . $string . "'' è stata accettata";
        // $check = true;
        return true;
    }
    return false;

}
$tentativi = 5;

for ($i = 0; $i < 5; $i++) {
    $password = readline("Inserisci la password: ");
    $risposta = controlloPassword($password);
    if ($risposta == false) {

        if ($tentativi > 1) {
            echo "Hai a disposizione ancora " . ($tentativi -1) . " tentativi. \n";
            $tentativi--;
        } else {
            echo "Hai esaurito i tentativi a tua disposizione.";
        }
    } else {
        break;
    }
}
