<?php

// Le code principal de l'application se trouve dans une fonction.
function convertisseur($montant, $sens)
{
    // Le tableau de valeur en guise de calculatrice.
   $calculatrice = [
    //Dollars => Euros
    119 => 100,
    100 => 89,
    598 => 500,
    500 => 417,
    1794 => 1500 
    ];

    switch($sens)
    {
        case 'dollarsEuros':
    
        if(array_key_exists($montant, $calculatrice) == true)
        {
            $convertMontant = $calculatrice[$montant];

            $message = "$montant $ est égale $convertMontant €.";
        }
        else
        {
            $message = "Je ne sais pas à combien équivaut $montant $ en €";
        }
        break;

        case 'eurosDollars':
    
        if(in_array($montant, $calculatrice) == true)
        {
            
            $convertMontant = array_search($montant, $calculatrice);

            $message = "$montant € est égale $convertMontant $.";
        }
        else
        {
  
            $message = "Je ne sais pas à combien équivaut $montant € en $ ";
        }
        break;

        default:
        $message = "Je ne sais pas à combien cela correspond !";
    }

    return $message;
}


$result = null;


$sens = 'dollarsEuros';
if(array_key_exists('sens', $_POST) == true)
{

    $sens = $_POST['sens'];
}

if(array_key_exists('montant', $_POST) == true)
{
    $montant = $_POST['montant'];

    $result = convertisseur($montant, $sens);
}
//var_dump($result);

include 'convertisseurExo.html';