<?php
function db_query($query) {
    $connection = mysqli_connect("localhost","root","root","acc");
    $result = mysqli_query($connection,$query);

    return $result;
}

function delete($tblname,$field_id,$id){

	$sql = "delete from ".$tblname." where ".$field_id."=".$id."";

	return db_query($sql);
}

function select_id($fecha,$renta,$total,$saldo,$estatus){
	$sql = "Select * from CFDI where ".$field_name." = ".$field_id."";
	$db=db_query($sql);
	$GLOBALS['row'] = mysqli_fetch_object($db);

	return $sql;

}
?>
