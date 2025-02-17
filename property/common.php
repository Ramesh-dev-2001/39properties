<?php
function formatIndianNumber($number) {
    $numberParts = explode('.', $number);
    $integerPart = $numberParts[0];
    $decimalPart = isset($numberParts[1]) ? '.' . $numberParts[1] : '';

    // Split the integer part into segments
    $lastThreeDigits = substr($integerPart, -3);
    $otherDigits = substr($integerPart, 0, -3);

    if ($otherDigits !== '') {
        $formattedNumber = preg_replace('/(?<=\d)(?=(\d{2})+(?!\d))/', ',', strrev($otherDigits));
        $formattedNumber = strrev($formattedNumber) . ',' . $lastThreeDigits;
    } else {
        $formattedNumber = $lastThreeDigits;
    }

    return $formattedNumber . $decimalPart;
}
?>