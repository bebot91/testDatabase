<?php

class PGConnector {
  
  public function __construct(){

  }

  public function get_Coindata ( $Selection ){

    $dbconn3 = pg_connect("host=http://192.46.236.174 port=5432 dbname=CRYBOT user=root password=lorwhsou1991");
    $result = pg_query($conn, "select * from coinlog_timeline_1m_cdc where i = ".$Selection." ");
    var_dump(pg_fetch_all($result));


            } 
        }
  ?>