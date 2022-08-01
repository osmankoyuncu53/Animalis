<?php

require_once('IyzipayBootstrap.php');

IyzipayBootstrap::init();

class Config
{
    public static function options()
    {
        $options = new \Iyzipay\Options();

        //burada api keyleri alacaksın başka bir işlem yok i7ziconun sitesinde var zaten videoda kayıt oluncaa gösteriyoro
        $options->setApiKey("sandbox-X5isI5jvdwVH0W6rCMlt3XLMTWCwhK5P");
        $options->setSecretKey("sandbox-QCDKTCBrYFt6KsvZYgitlX6dkab7gRDo");
        $options->setBaseUrl("https://sandbox-api.iyzipay.com/");
        return $options;
    }
}