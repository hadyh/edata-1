<?php
class database {

  // Change this
  private $db_host      = "localhost";
  private $db_username  = "root";
  private $db_password  = "";
  private $db_name      = "edata";
  
  private $connected = false;
  private $connection;
  private $sql_query;
  private $query_counter = 0;
  
  public function database() {
    $this->connection = mysqli_connect($this->db_host, $this->db_username, $this->db_password,$this->db_name);
    $this->connected = true;
  }


  public function showError(){
    $error = mysqli_error($this->connection);
    return $error;
  }
  
  public function __destruct() {
    if ($this->connected) {
      $this->connected = false;
      mysqli_close($this->connection);
    }
  }
  
  public function getLastQuery() {
    return $this->sql_query;
  }
  
  public function query($query) {
    if ($this->connected) {
      $this->sql_query = $query;
      // echo $this->sql_query;
      $this->query_counter++;
      $result = mysqli_query($this->connection,$this->sql_query);

      if (!$result){
        echo mysqli_error($this->connection);
      }
     
      return $result;
    }
  }
  
  public function select($fields, $table, $where = "", $order = "", $limit = "") {
    if ($this->connected) {
      if (!empty($where)) {
        $where = " WHERE ".$where;
      }
      if (!empty($order)) {
        $order = " ORDER BY ".$order;
      }
      if (!empty($limit)) {
        $limit = " LIMIT ".$limit;
      }
      $result = $this->query("SELECT ".$fields." FROM ".$table.$where.$order.$limit);
      return $result;
    }
  }
  
  public function getTableRows($result) {
    return mysqli_num_rows($result);
  }
  
  public function insert($table, $fields, $values) {
    if ($this->connected) {
      $query = $this->query("INSERT INTO ".$table." (".$fields.") VALUES (".$values.")");
      return $query;
    }
  }
  
  public function delete($table, $where = "") {
    if ($this->connected) {
        if (!empty($where)) {
          $where = " WHERE ".$where;
        }
        
        $this->query("DELETE FROM ".$table.$where);
    }
  }

  public function update($table, $fields, $where = "") {
    if ($this->connected) {
      if (!empty($where)) {
        $where = " WHERE ".$where;
      }
      $query = $this->query("UPDATE ".$table." SET ".$fields.$where);
      return $query;
    }
  }
  
  public function fetch($result) {
    if ($this->connected) {
      return mysqli_fetch_assoc($result);
    }
  }

  
  public function getQueryCount() {
    if ($this->connected) {
      return $this->query_counter;
    }
  }


}
?>