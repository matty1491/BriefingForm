<?php 
$row = 1;
if (($handle = fopen("links.csv", "r")) !== FALSE) {
    while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
        $num = count($data);
        $row++;
        for ($c=0; $c < $num; $c++) {
            echo "<a href='" . $data[$c] . "'>Test</a>";
        }
    }
    fclose($handle);
}
?>