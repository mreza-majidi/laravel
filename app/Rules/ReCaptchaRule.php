<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use ReCaptcha\ReCaptcha;

class ReCaptchaRule implements Rule
{

    private $error_msg = '';

    /**
     * Determine if the validation rule passes.
     *
     * @param string $attribute
     * @param mixed  $value
     *
     * @return boolean
     */
    public function passes($attribute, $value) //phpcs:ignore
    {
        if (empty($value)) {
            $this->error_msg = ':attribute field is required.';

            return false;
        }
        $recaptcha = new ReCaptcha(env('GOOGLE_CAPTCHA_PRIVATE_KEY'));
        $resp      = $recaptcha->setExpectedHostname($_SERVER['SERVER_NAME'])
                               ->setScoreThreshold(0.5)
                               ->verify($value, $_SERVER['REMOTE_ADDR'])
        ;

        if (!$resp->isSuccess()) {
            $this->error_msg = __('reCaptcha.required');

            return false;
        }

        if ($resp->getScore() < 0.5) {
            $this->error_msg = __('reCaptcha.failed');

            return false;
        }


        return true;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return $this->error_msg;
    }
}
