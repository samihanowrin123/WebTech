<?php

require_once ('../Model/model.php');

function fetchAllManagers(){
	return showAllManager();

}
function fetchManagers($username){
	return showManager($username);

}
?>
