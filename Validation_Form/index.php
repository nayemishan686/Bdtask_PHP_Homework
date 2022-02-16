<?php 
    include_once 'function.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            padding: 40px;
            max-width: 1180px;
            margin: auto;
        }
        h2::after{
            content: '';
            height: 3px;
            width: 500px;
            display: block;
            background-color: #000;
            margin: 5px auto;
        }
        p{
            font-size: 14px;
            font-weight: normal;
        }
        span{
            color: #BB313B;
            font-size: 12px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row">
            <h2 class="text-center">Student Registration Form</h2>
        </div>
    </div>
    <?php 
        $department = ['Computer Department','Civil Department','Power Department','Electrical Department','Mechanical Department','AIDT'];
        //difine variable empty
        $stNameErr = $fNameErr = $mNameErr = $emailErr = $passwordErr = $repasswordErr = $genderErr = $ageErr = $phoneErr = $commentErr = $departmentErr = $filesErr = '';
        $stName = $fName = $mName = $email = $password = $repassword = $regender = $age = $phone = $comment = '';
        $stNameLen = strlen($_POST['stName']);
        $fNameLen = strlen($_POST['fName']);
        $mNameLen = strlen($_POST['mName']);
        $passwordLen = strlen($_POST['password']);

        //take values from form
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            //Student Name Validation
            if(empty($_POST['stName'])){
                $stNameErr = "You must fill the Student Name";
            }else if($stNameLen <4){
                $stNameErr = "Student Name ar least 4 words";
            }else if($stNameLen > 20){
                $stNameErr = "Student Name will under 20 words";
            }else if(!preg_match("/^[a-zA-Z-' ]*$/", $_POST['stName'])){
                $stNameErr = "Student Name Will support only letters and spaces";
            }else{
                $stName = senitizeStudent($_POST['stName']);
            }
            //Student Father's' Name Validation
            if(empty($_POST['fName'])){
                $fNameErr = "You must fill the Father Name";
            }else if($fNameLen <4){
                $fNameErr = "Father Name ar least 4 words";
            }else if($fNameLen > 20){
                $fNameErr = "Father Name will under 20 words";
            }else if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
                $emailErr = "Please enter a valid email address";
            }else{
                $fName = senitizeStudent($_POST['fName']);
            }
            //Student Mother's Name Validation
            if(empty($_POST['mName'])){
                $mNameErr = "You must fill the Mother Name";
            }else if($fNameLen <4){
                $mNameErr = "Mother Name ar least 4 words";
            }else if($fNameLen > 20){
                $mNameErr = "Mother Name will under 20 words";
            }else{
                $mName = senitizeStudent($_POST['mName']);
            }
            //Email Validation
            if(empty($_POST['email'])){
                $emailErr = "You must fill E-mail";
            }else{
                $email = senitizeStudent($_POST['email']);
            }
            //Password Validation
            if(empty($_POST['password'])){
                $passwordErr = "You must fill Password";
            }else if($passwordLen<8){
                $passwordErr = "Password Length must be at least 8 characters";
            }else{
                $password = senitizeStudent($_POST['password']);
            }
            //rePassword Validation
            if(empty($_POST['repassword'])){
                $repasswordErr = "You must fill Retype-Password";
            }else if($_POST['repassword'] != $_POST['password']){
                $repasswordErr = "Password don't match";
            }else{
                $repassword = senitizeStudent($_POST['repassword']);
            }
            //Gender Validation
            if(empty($_POST['gender'])){
                $genderErr = "You must Select Gender";
            }else{
                $gender = senitizeStudent($_POST['gender']);
            }
            //Age Validation
            if(empty($_POST['age'])){
                $ageErr = "You must fill Age";
            }else{
                $age = senitizeStudent($_POST['age']);
            }
            //Phone Validation
            if(empty($_POST['phone'])){
                $phoneErr = "You must fill E-mail";
            }else{
                $phone = senitizeStudent($_POST['phone']);
            }
            //Department Validation
            if(empty($_POST['department'])){
                $departmentErr = "You must select Department";
            }else{
                $department = senitizeStudent($_POST['department']);
            }
            //Comment Validation
            if(empty($_POST['comment'])){
                $commentErr = "You must fill Comment";
            }else{
                $comment = senitizeStudent($_POST['comment']);
            }
            //Files Validation
            $allowedTypes = array(
                "image/jpg",
                "image/jpeg",
                "image/png"
            );
            if(!file_exists($_FILES['photo']['tmp_name'])){
                $filesErr = "Plese select a photo";
            }else if($_FILES["photo"]){
                if(in_array($_FILES["photo"]["type"],$allowedTypes) !== false && $_FILES["photo"]["size"] < 5*1024*1024){
                    move_uploaded_file($_FILES["photo"]["tmp_name"], "files/".$_FILES["photo"]["name"]);
                }
            }

                
        }
    ?>
    

    <div class="container">
        <div class="row">
            <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post" enctype="multipart/form-data">
                <div class="mt-2 mb-2">
                    <label for="stName">Student Name : <span>*</span></label>
                    <input type="text" class="form-control" name="stName" id="stName" placeholder="Enter Student name" value="<?php echo $stName; ?>">
                    <span><?php echo $stNameErr; ?></span>
                </div>
                <div class="mt-2 mb-2">
                    <label for="fName">Father's Name : <span>*</span></label>
                    <input type="text" class="form-control" name="fName" id="fName" placeholder="Enter Father's name" value="<?php echo $fName; ?>">
                    <span><?php echo $fNameErr; ?></span>
                </div>
                <div class="mt-2 mb-2">
                    <label for="mName">Mother's Name : <span>*</span></label>
                    <input type="text" class="form-control" name="mName" id="mName" placeholder="Enter Mother's name" value="<?php echo $mName; ?>">
                    <span><?php echo $mNameErr; ?></span>
                </div>
                <div class="mt-2 mb-2">
                    <label for="email">Email Address : <span>*</span></label>
                    <input type="email" class="form-control" name="email" id="email" placeholder="Enter Student's Email Address" value="<?php echo $email; ?>">
                    <span><?php echo $emailErr; ?></span>
                </div>
                <div class="mt-2 mb-2">
                    <label for="password">Password : <span>*</span></label>
                    <input type="password" class="form-control" name="password" id="password" placeholder="Enter Your Password " value="<?php echo $password; ?>">
                    <span><?php echo $passwordErr; ?></span>
                </div>
                <div class="mt-2 mb-2">
                    <label for="repassword">Retype Password : <span>*</span></label>
                    <input type="password" class="form-control" name="repassword" id="repassword" placeholder="Enter Passsword Again" value="<?php echo $repassword; ?>">
                    <span><?php echo $repasswordErr; ?></span>
                </div>
                <div class="mt-2 mb-2">
                    <label for="gender">Gender : <span>*</span></label>
                    <span><?php echo $genderErr; ?></span>
                    <br>
                    <input type="radio" name="gender" id="male" value="male" <?php echo $_POST['gender'] == 'male'? 'checked' : '';?>>
                    <label for="male">Male</label> 
                    <br>
                    <input type="radio" name="gender" id="female" value="female" <?php echo $_POST['gender'] == 'female'? 'checked' : '';?>> 
                    <label for="female">Female</label>
                    <br>
                    <input type="radio" name="gender" id="others" value="others" <?php echo $_POST['gender'] == 'others'? 'checked' : '';?>> 
                    <label for="others">Others</label>
                </div>
                <div class="mt-2 mb-2">
                    <label for="age" class="">Age : <span>*</span></label>
                    <input type="number" class="form-control" name="age" id="age" placeholder="Enter Student's age" value="<?php echo $age; ?>">
                    <span><?php echo $ageErr; ?></span>
                </div>
                <div class="mt-2 mb-2">
                    <label for="phone">Mobile Number : <span>*</span></label>
                    <input type="number" class="form-control" name="phone" id="phone" placeholder="Enter Your Mobile Number" value="<?php echo $phone; ?>">
                    <span><?php echo $phoneErr; ?></span>
                </div>
                <div class="mt-2 mb-2">
                    <label for="department" class="">Department : <span>*</span></label>
                    <br>
                    <select name="department" id="department" class="form-select  ">
                        <option value="select" selected disabled>Select Department</option>
                        <?php displayDepartament($department); ?>
                    </select>
                    <span><?php echo $departmentErr; ?></span>
                </div>
                <div class="mt-2 mb-2">
                    <label for="stName">Favourite Programming Languages :</label>
                    <br>
                     <input type="checkbox" name="language[]" value="php" id="php" <?php isProgrammingLanguage('php')?>>
                     <label for="php">PHP</label><br>
                     <input type="checkbox" name="language[]" value="phython" id="phython" <?php isProgrammingLanguage('phython')?>>
                     <label for="phython">Phython</label><br>
                     <input type="checkbox" name="language[]" value="java" id="java" <?php isProgrammingLanguage('java')?>>
                     <label for="java">JAVA</label><br>
                     <input type="checkbox" name="language[]" value="c++" id="c++" <?php isProgrammingLanguage('c++')?>>
                     <label for="c++">C++</label><br>
                     <input type="checkbox" name="language[]" value="c#" id="c#" <?php isProgrammingLanguage('c#')?>>
                     <label for="c#">C#</label><br>
                </div>
                <div class="mt-2 mb-2">
                    <label for="comment">Comment : <span>*</span></label>
                    <textarea name="comment" id="comment" cols="30" rows="5" class="form-control"><?php echo $comment; ?></textarea>
                    <span><?php echo $commentErr; ?></span>
                </div>
                <div class="mt-2 mb-2">
                    <label for="photo">Upload Student Photo : <span>*</span></label>
                    <input type="file" class="form-control" name="photo" id="image" value="">
                    <span><?php echo $filesErr; ?></span>
                </div>
                <div class="mt-3 mb-2">
                    <input type="submit" value="Submit" class="btn btn-primary p-2">
                    <input type="reset" value="Reset" class="btn btn-danger p-2">
                </div>
            </form>

            <?php 
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                echo "<strong>Your Input Values :<strong> <br>";
                echo "<p>Student Name : ".$stName."</p>";
                echo "<p>Father's Name : ".$fName."</p>";
                echo "<p>Mother's Name : ".$mName."</p>";
                echo "<p>E-mail Address : ".$email."</p>";
                echo "<p>Gender : ".$gender."</p>";
                echo "<p>Age : ".$age."</p>";
                echo "<p>Phone : ".$phone."</p>";
                printf("<p>You have selected Yout Department: %s",ucwords($department));
                echo "<p>Comment : ".$comment."</p>";
            }
            ?>
        </div>
    </div>







    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>