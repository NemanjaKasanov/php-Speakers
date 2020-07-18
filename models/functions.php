<?php

function show_nav_elements($parent){
    $childrenQuery = "SELECT * FROM nav_elements WHERE parent=$parent";
    $childrenArray = executeQuery($childrenQuery);
    foreach($childrenArray as $child):
        if(check_for_children($child->id_nav)){
            echo '<li class="has-children">';
        }
        else{
            echo '<li>';
        }
        ?>
        <a href="<?= $child->href ?>" class="nav-link"><?= $child->name ?></a>
        <?php 
            if(check_for_children($child->id_nav)){
                echo '<ul class="dropdown">';
                show_nav_elements($child->id_nav); 
                echo '</ul>';
            }
        ?>

        <?php
        echo "</li>";
    endforeach;
}

function check_for_children($parentId){
    $childrenQuery = "SELECT * FROM nav_elements WHERE parent=$parentId";
    $childrenArray = executeQuery($childrenQuery);

    if(count($childrenArray) > 0){
        return true;
    }
    else{
        return false;
    }
}

function show_errors_array($array){
    
    foreach($array as $el): 
    ?>
        <p class="text-danger"><?= $el ?></p>
    <?php
    endforeach;
}