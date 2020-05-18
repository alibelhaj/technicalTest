<?php

namespace App\Validator\Phone;

use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;

class PhoneValidator extends ConstraintValidator
{
    /**
     * @param mixed $value
     *
     * @return mixed
     */
    public function validate($value, Constraint $constraint)
    {
        if (empty($value)) {
            return;
        }

        $phoneNumberUtil = \libphonenumber\PhoneNumberUtil::getInstance();

        try {
            $phoneNumberObject = $phoneNumberUtil->parse($value, 'FR');
            if (false === $phoneNumberUtil->isValidNumber($phoneNumberObject)) {
                return $this->context
                    ->buildViolation($constraint->message)
                    ->addViolation()
                    ;
            }
        } catch (\Exception $e) {
            return $this->context
                ->buildViolation($constraint->message)
                ->addViolation()
                ;
        }
    }
}
