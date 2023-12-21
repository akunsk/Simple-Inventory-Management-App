<?php
    require_once 'include.php';
    $tables = Application::getTables();
    $verification = isset($_GET['table']) && in_array($_GET['table'], $tables);
    if(!$verification):
        print('Invalid table!');
        die;
    endif;
    $table = $_GET['table'];
    $file_name = $table . '.xml';
    $file = fopen($file_name, 'w');    //file opening
    fputs($file, "<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n");    //XML header
    fputs($file, "<!DOCTYPE xml>\n");
    fputs($file, "<$table>\n");    //container_start
    $sql = "SELECT * FROM $table ORDER BY id DESC";
    $result = DB_Manager::query($sql);
    $data = array();    //data container    (attribute => value)

    foreach($result as $record):
        switch($table):
            case 'articles':
                $data['id'] = $record['id'];
                $data['id_range'] = $record['id_range'];
                $data['range_name'] = Range::get($record['id_range'])->getName();
                $data['name'] = $record['name'];

                fputs($file, "<article>\n");
                XMLgenerator::add_element($data, $file);
                fputs($file, "</article>\n");
            break;
            case 'gadgets':
                $data['id'] = $record['id'];
                $data['id_article'] = $record['id_article'];
                $data['article_name'] = Article::get($record['id_article'])->getName();
                $data['id_range'] = $record['id_range'];
                $data['range_name'] = Range::get($record['id_range'])->getName();
                $data['name'] = $record['name'];

                fputs($file, "<gadget>\n");
                XMLgenerator::add_element($data, $file);
                fputs($file, "</gadget>\n");
            break;
            case 'ranges':
                $data['id'] = $record['id'];
                $data['name'] = $record['name'];
                $data['short_name'] = $record['short_name'];

                fputs($file, "<range>\n");
                XMLgenerator::add_element($data, $file);
                fputs($file, "</range>\n");
            break;
            case 'clients':
                $data['id'] = $record['id'];
                $data['name'] = $record['name'];

                fputs($file, "<client>\n");
                XMLgenerator::add_element($data, $file);
                fputs($file, "</client>\n");
            break;
        endswitch;
    endforeach;
    fputs($file, "</$table>\n");    //container_ending
    fclose($file);    //file closure
    Application::redir($file_name);    //redirection to the downloadable file
/*
    The resulting file is in the form:

    <?xml version="1.0"?>
    <container>
        <attribute1>value1</attribute1>
        <attribute2>value2</attribute2>
        <attribute3>value3</attribute3>
    </container>
*/
?>

