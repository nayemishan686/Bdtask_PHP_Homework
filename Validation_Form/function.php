<?php 
    //This function used to create department option
    function displayDepartament($values){
        foreach($values as $value){
            printf("<option value = '%s'>%s</option>", strtolower($value), ucwords($value));
        }
    }
?>

<?php 
    //This function used to senitize Student Form
    function senitizeStudent($dataValues){
        $dataValues = trim($dataValues);
        $dataValues = stripslashes($dataValues);
        $dataValues =  htmlspecialchars($dataValues);
        return $dataValues;
    }

?>

<?php 
    //Programming Language checked function
    function isProgrammingLanguage($language){
        if(isset($_POST['language']) && is_array($_POST['language']) && in_array($language, $_POST['language'])){
            echo 'checked';
        }
    }
?>