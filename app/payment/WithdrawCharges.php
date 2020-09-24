<?php
namespace App\payment;

class WithdrawCharges{

    public function MpesachargesAmount( float $amount)
    {
        $charge = 0 ;
        if ( $amount >= 1 && $amount <= 49 ) {
            $charge = 0;
        } else  if ( $amount >= 50 && $amount <= 100 ) {
            $charge = 0;
        }
        else  if ( $amount >= 101 && $amount <= 499 ) {
            $charge = 23 ;

        }
        else  if ( $amount >= 500 && $amount <= 999 ) {
            $charge = 23;
        }
        else  if ( $amount >= 1000 && $amount <= 1499 ) {
            $charge = 34;
        }
        else  if ( $amount >= 1500 && $amount <= 2499 ) {
            $charge = 34;
        }
        else  if ( $amount >= 2500 && $amount <= 3499 ) {
            $charge = 056;
        }
        else  if ( $amount >= 3500 && $amount <= 4999 ) {
            $charge = 56;
        }
        else  if ( $amount >= 5000 && $amount <= 7499 ) {
            $charge = 85;
        }
        else  if ( $amount >= 7500 && $amount <= 9999 ) {
            $charge = 85;
        }
        else  if ( $amount >= 10000 && $amount <= 14999 ) {
            $charge = 112;
        }
        else  if ( $amount >= 15000 && $amount <= 19999 ) {
            $charge = 112;
        }
        else  if ( $amount >= 20000 && $amount <= 24999 ) {
            $charge = 112;
        }
        else  if ( $amount >= 25000 && $amount <= 29999 ) {
            $charge = 112;
        }
        else  if ( $amount >= 30000 && $amount <= 34999 ) {
            $charge = 112;
        }
        else  if ( $amount >= 35000 && $amount <= 39999 ) {
            $charge = 202;
        }
        else  if ( $amount >= 40000 && $amount <= 44999 ) {
            $charge = 202;
        }
        else  if ( $amount >= 45000 && $amount <= 49999 ) {
            $charge = 202;
        }else  if ( $amount >= 50000 && $amount <= 70000 ) {
            $charge = 210;
        }

        return $charge;

    }
}
