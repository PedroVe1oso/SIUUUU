<?php

class FormSanitizer
{
    public static function sanitizeFormString($input): string
    {
        $input = strip_tags($input);
        $input = str_replace(" ", "", $input);
        $input = strtolower($input);
        $input = ucfirst($input);
        return $input;
    }

    public static function sanitizeFormUsername($input): string
    {
        $input = strip_tags($input);
        $input = str_replace(" ", "", $input);
        return $input;
    }

    public static function sanitizeFormPassword($input): string
    {
        $input = strip_tags($input);
        return $input;
    }
}
?>