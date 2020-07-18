<?php

$file = fopen("data/log.txt", "r");

if($file){
    $file_array = file("data/log.txt");

    $file_data = [];
    foreach($file_array as $el){
        array_push($file_data, explode("\t", $el));
    }

    $all_pages = [];
    foreach($file_data as $el){
        if(!in_array($el[0], $all_pages)){
            array_push($all_pages, $el[0]);
        }
    }

    $time_now = time();
    $time_yesterday = $time_now - (60 * 60 *24);
    $page_entries = [];
    foreach($all_pages as $page){
        $count = 0;
        foreach($file_data as $el){
            $entry_time = DateTime::createFromFormat('d.m.Y H:i:s', $el[1])->getTimestamp();

            if($page == $el[0] && $entry_time >= $time_yesterday && $entry_time <= $time_now){
                $count++;
            }
        }
        array_push($page_entries, [$page, $count]);
    }

    $page_entries_all = [];
    foreach($all_pages as $page){
        $count = 0;
        foreach($file_data as $el){
            if($page == $el[0]){
                $count++;
            }
        }
        array_push($page_entries_all, [$page, $count]);
    }

    $total_entries = 0;
    foreach($page_entries as $el){
        $total_entries += $el[1];
    }

    fclose($file);
}