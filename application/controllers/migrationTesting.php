<?php
$phpExecutablePath = 'C:\\xampp\\php\\php.exe'; // Path to PHP executable
$codeIgniterIndexPath = 'C:\\xampp\\htdocs\\Bloging\\index.php'; // Path to CodeIgniter's index.php

// Construct the migration command
$command = "\"$phpExecutablePath\" \"$codeIgniterIndexPath\" migrate";

// Execute migration command using exec()
$output = [];
echo $command;
exec($command, $output, $returnCode);

// Check if the command executed successfully
if ($returnCode === 0) {
    echo "Migration successful!";
} else {
    echo "Migration failed!";
}

// Output the result for debugging purposes
echo "<pre>";
print_r($output);
echo "</pre>";
?>
