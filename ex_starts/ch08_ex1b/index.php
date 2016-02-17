<?php

$customer_type = filter_input(INPUT_POST, 'type');
$invoice_subtotal = filter_input(INPUT_POST, 'subtotal');

$customer_type = strtoupper($customer_type);

switch ($customer_type)
{
    case 'R':
        if ($invoice_subtotal < 100)
        {
            $discount_percent = .0;
        } 
        else if ($invoice_subtotal >= 100 && $invoice_subtotal < 250)
        {
            $discount_percent = .1;
        }
        else if ($invoice_subtotal >= 250)
        {
            $discount_percent = .25;
        }
    break;
    
    case 'C':
        if ($customer_type == 'C')
        {
            if ($invoice_subtotal < 250)
            {
                $discount_percent = .2;
            }
            else
            {
                $discount_percent = .3;
            }
        }
    break;
        
    case 'T':
        if ($customer_type == 'T')
        {
            if ($invoice_subtotal >= 500)
            {
                $discount_percent = .5;
            }
            else
            {
                $discount_percent = .4;
            }
        }
    break;
        
    default:
        {
            $discount_percent = .1;
        }
}

/*
if ($customer_type == 'R') {
    if ($invoice_subtotal < 100) {
        $discount_percent = .0;
    } else if ($invoice_subtotal >= 100 && $invoice_subtotal < 250) {
        $discount_percent = .1;
    } else if ($invoice_subtotal >= 250) {
        $discount_percent = .25;
    }
} else if ($customer_type == 'C') {
    if ($invoice_subtotal < 250) {
        $discount_percent = .2;
    } else {
        $discount_percent = .3;
    }
} else {
    $discount_percent = .0;
}
*/

$discount_amount = $invoice_subtotal * $discount_percent;
$invoice_total = $invoice_subtotal - $discount_amount;

$percent = number_format(($discount_percent * 100));
$discount = number_format($discount_amount, 2);
$total = number_format($invoice_total, 2);

include 'invoice_total.php';

?>