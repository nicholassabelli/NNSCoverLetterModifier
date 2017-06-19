<?php

require_once("DOCx.php");

/**
 * Class Modifier
 *
 * @author Nicholas Sabelli
 */
class Modifier
{
    /**
     * Modifier constructor.
     *
     * @param $template
     * @param $company
     * @param $position
     */
    function __construct($template, $company, $position)
    {
        $modifier   = new DOCx($template);
        $date       = date("F j, Y");
        $values     = [
            "{{company}}"   => $company,
            "{{position}}"  => $position,
            "{{date}}"      => $date,
        ];
        $filename   = "Nicholas Sabelli to $company Regarding $position.docx";

        $modifier->setValues($values);
        $modifier->save($filename);
        $modifier->close();
    }
}