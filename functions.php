<?php

function readFromFile() {
    $file = fopen("record.txt", "r");

    $i = 0;
    while(!feof($file)) {

        if ($i == 0){
        echo "<pre>" . fgets($file);
        $i = $i + 1;
        } else if ($i == 1){
            echo fgets($file);
            $i = $i + 1;
        } else if ($i == 2){
            echo fgets($file). "</pre>";
            $i = 0;
        }
    }
    
    fclose($file);
}

function resetFile() {
    $file = fopen ("record.txt", "w");
    fwrite($file, "");
    fclose($file);
}

function addToFile($priceAfterTaxes, $discount, $taxes) {
    $file = fopen("record.txt", "a");
    fwrite($file, "➜ Importe total: " . $priceAfterTaxes . "€\n" . "• Descuento aplicado: " .
     $discount * 100 . "%\n" . "• Impuesto aplicado: " . $taxes * 100 . "%\n");
    fclose($file);
}


function calculatePriceSuppliers($articles, $amount, $country){

    $taxes = getTaxesFromCountry($country);
    $price = $articles * $amount;
    $discount = getDiscountFromPrice($price);
    $priceBeforeTaxes = $price * (1 - $discount);
    $priceAfterTaxes = $priceBeforeTaxes + $priceBeforeTaxes * $taxes;
    addToFile($priceAfterTaxes, $discount, $taxes);

    return $priceAfterTaxes;
}

function getTaxesFromCountry($country){

    switch($country){
        case 'España':
            $taxes = 0.21;
            break;
        case 'Italia':
            $taxes = 0.22;
            break;;
        case 'Francia':
            $taxes = 0.20;
            break;
        case 'Portugal':
            $taxes = 0.23;
            break;
        case 'Reino Unido':
            $taxes = 0.20;
            break;
        default:
            $taxes = 0.00;
            break;
    }

    return $taxes;
}

function getDiscountFromPrice($price){
    
    if( ($price > 0) && ($price <= 5000) ) {
        $discount = 0.15;
    } else if( ($price > 5000) && ($price <= 10000) ) {
        $discount = 0.20;
    } else if( ($price > 10000) && ($price <= 15000) ) {
        $discount = 0.25;
    } else if( ($price > 15000) && ($price <= 20000) ) {
        $discount = 0.30;
    } else if( ($price > 20000) && ($price <= 30000) ) {
        $discount = 0.50;
    } else{
        $discount = 0.00;
    }

    return $discount;
}

?>

