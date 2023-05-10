<?php

namespace Webkul\Customer\Rules;

use Illuminate\Contracts\Validation\Rule;

/**
 * Class VatIdRule
 *
 * @see https://laravel.com/docs/5.8/validation#using-rule-objects
 * @package App\Rules
 */
class VatIdRule implements Rule
{
    private function validaNIF($nif, $ignoreFirst=true) {
        //Limpamos eventuais espaços a mais
        $nif=trim($nif);
        //Verificamos se é numérico e tem comprimento 9
        if (!is_numeric($nif) || strlen($nif)!=9) {
            return false;
        } else {
            $nifSplit=str_split($nif);
            //O primeiro digíto tem de ser 1, 2, 3, 5, 6, 8 ou 9
            //Ou não, se optarmos por ignorar esta "regra"
            if (
                in_array($nifSplit[0], array(1, 2, 3, 5, 6, 8, 9))
                ||
                $ignoreFirst
            ) {
                //Calculamos o dígito de controlo
                $checkDigit=0;
                for($i=0; $i<8; $i++) {
                    $checkDigit+=$nifSplit[$i]*(10-$i-1);
                }
                $checkDigit=11-($checkDigit % 11);
                //Se der 10 então o dígito de controlo tem de ser 0
                if($checkDigit>=10) $checkDigit=0;
                //Comparamos com o último dígito
                if ($checkDigit==$nifSplit[8]) {
                    return true;
                } else {
                    return false;
                }
            } else {
                return false;
            }
        }
    }

    /**
     * Determine if the validation rule passes.
     *
     * The rules are borrowed from:
     * @see https://raw.githubusercontent.com/danielebarbaro/laravel-vat-eu-validator/master/src/VatValidator.php
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        return empty($value) || $this->validaNIF($value);
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return trans('shop::app.invalid_vat_format');
    }
}
