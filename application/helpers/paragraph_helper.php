<?php
if (!function_exists('clean_paragraph')) {
    function clean_paragraph($paragraph) {
        // Remove extra spaces while preserving line breaks
        $cleaned_paragraph = preg_replace('/[ \t]+/', ' ', $paragraph);
        
        // Replace newline characters with <br> tags
        $cleaned_paragraph_with_br = nl2br($cleaned_paragraph);
        
        return $cleaned_paragraph_with_br;
    }
}

?>