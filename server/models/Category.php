<?php
  require "../config/database.php"

  Class Category {
    public function __construct () {}

    // CLASS METHODS
    // THIS METHOD CREATES A NEW CATEGORY
    public function insert($name, $description) {
      $sql="INSERT INTO category (name,description,state) VALUES ('$name','$description','1')";
      return queryExecution($sql);
    }
    // THIS METHOD UPDATE AN EXISTING CATEGORY
    public function edit($idcategory, $name, $description) {
      $sql="UPDATE category SET name='$name', description='$description' WHERE idcategory='$idcategory'";
      return queryExecution($sql);
    }

    // THIS METHOD ENABLES A EXISTING CATEGORY
    public function enable($idcategory) {
      $sql="UPDATE category SET state='1' WHERE idcategory='$idcategory'";
      return queryExecution($sql);
    }

    // THIS METHOD ENABLES A EXISTING CATEGORY
    public function disable($idcategory) {
      $sql="UPDATE category SET state='0' WHERE idcategory='$idcategory'";
      return queryExecution($sql);
    }

    // THIS METHOD RETURNS DATA OF A EXISTING CATEGORY
    public function show($idcategory) {
      $sql="SELECT * FROM category WHERE idcategory='$idcategory'";
      return executeQuerySimpleRow($sql);
    }
    // THIS METHOD RETURNS ALL REGISTRY EN CATEGORIES DB
    public function list() {
      $sql="SELECT * FROM category";
      return queryExecution($sql);
    }
  }
 ?>
