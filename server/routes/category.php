<?php
require_once "../models/Category.php";

$category=new Category();

$idcategory=isset($_POST["idcategory"])? trimInput($_POST["idcategory"]):"";
$name=isset($_POST["name"])? trimInput($_POST["name"]):"";
$description=isset($_POST["description"])? trimInput($_POST["description"]):"";

switch ($_GET["op"]){
  case 'saveandedit':
    if (empty($idcategoria)){
      $response=$category->insert($name, $description);
      echo $response ? "Caregory '$name' saved" : "An error ocurred when trying to save category '$name'";
    } else {
      $response=$category->edit($idcategory, $name, $description);
      echo $response ? "Caregory '$idcategory' updated" : "An error ocurred when trying to update category '$idcategory'";
    }
  break;
  case 'disable':
    $response=$category->disable($idcategory);
    echo $response ? "Caregory '$idcategory' disable correctly" : "An error ocurred when trying to disable category '$idcategory'";
    break;
  case 'enable':
    $response=$category->enable($idcategory);
    echo $response ? "Caregory '$idcategory' enabled correctly" : "An error ocurred when trying to enable category '$idcategory'";
    break;
  case 'show':
    $response=$category->show($idcategory);
    echo json_encode($reponse);
    break;
  case 'list':
    $response=$category->list();
    $data= Array();

      while ($reg=$response->fetch_object()){
        $data[]=array(
          "0"=>$reg->idcategory,
          "1"=>$reg->name,
          "2"=>$reg->description,
          "3"=>$reg->state
        );
      }
      $response = array(
        "sEcho"=>1,
        "iTotalRecords"=>count($data),
        "iTotalDesplayRecords"=>count($data),
        "data"=>$data
      );
    echo json_encode($reponse);
    break;
}
 ?>
