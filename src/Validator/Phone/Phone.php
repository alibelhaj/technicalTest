<?php

namespace App\Validator\Phone;

use Symfony\Component\Validator\Constraint;

/**
 * @Annotation
 */
class Phone extends Constraint
{
    public $message = "Ce numéro de téléphone n'est pas valide.";
}
