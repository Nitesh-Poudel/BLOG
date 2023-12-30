<?php
$config = array(
    'add_article_rules' => array(
        array(
            'field' => 'title',
            'label' => 'Article Title',
            'rules' => 'required|min_length[5]|max_length[100]'
        ),
        array(
            'field' => 'content',
            'label' => 'Article Content',
            'rules' => 'required'
        ),
        
    ),
 
);
?>