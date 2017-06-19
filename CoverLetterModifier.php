<?php

/**
 * PHP CLI for modifying cover letters.
 *
 * @author Nicholas Sabelli
 */

require_once("Modifier.php");

$template   = null;
$company    = null;
$position   = null;

if ($argc == 1) {
    $exists = false;

    do {
        fwrite(STDOUT, "Enter template file path: ");
        $template = trim(trim(fgets(STDIN)), "\'\"");

        if(!$exists = file_exists($template)) {
            fwrite(STDOUT, "File not found.\n");
        }
    } while (!$exists);

    fwrite(STDOUT, "Enter company name: ");
    $company    = trim(trim(fgets(STDIN)), "\'\"");
    fwrite(STDOUT, "Enter position title: ");
    $position   = trim(trim(fgets(STDIN)), "\'\"");
} elseif ($argc == 4) {
    $template   = $argv[1];
    $company    = $argv[2];
    $position   = $argv[3];
} elseif ($argc > 4) {
    fwrite(STDOUT, "Error: Too many arguments. Expected 3 (template file path, company, position).\n");
    exit(1);
} elseif ($argc < 4) {
    fwrite(STDOUT, "Error: Too few arguments. Expected 3 (template file path, company, position).\n");
    exit(1);
}

$modifier = new Modifier($template, $company, $position);
fwrite(STDOUT, "File created!\n");
exit();

?>