<?php 
class Config {

	//Get Heroku ClearDB connection information
	$cleardb_url = parse_url(getenv("CLEARDB_DATABASE_URL"));

	$active_group = 'default';
	$query_builder = TRUE;

	const HOST = $cleardb_url["host"];
	const USER = $cleardb_url["user"];
	const PASS = $cleardb_url["pass"];
	const DBNAME = substr($cleardb_url["path"],1);

	const CHARSET = "utf8";//Padrao de caracteres
}