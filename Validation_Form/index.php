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
        $stName = $fName = $mName = $email = $gender = $age = $phone = $comment = '';

        //take values from form
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $stName = senitizeStudent($_POST['stName']);
            $fName = senitizeStudent($_POST['fName']);
            $mName = senitizeStudent($_POST['mName']);
            $email = senitizeStudent($_POST['email']);
            $gender = senitizeStudent($_POST['gender']);
            $age = senitizeStudent($_POST['age']);
            $phone = senitizeStudent($_POST['phone']);
            $department = senitizeStudent($_POST['department']);
            //$programmingLanguage = senitizeStudent($_POST['language']);
            $comment = senitizeStudent($_POST['comment']);
            
            
            
        }
    ?>

    

    <div class="container">
        <div class="row">
            <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
                <div class="mt-2 mb-2">
                    <label for="stName">Student Name :</label>
                    <input type="text" class="form-control" name="stName" id="stName" placeholder="Enter Student name" value="<?php echo $stName; ?>">
                </div>
                <div class="mt-2 mb-2">
                    <label for="fName">Father's Name :</label>
                    <input type="text" class="form-control" name="fName" id="fName" placeholder="Enter Father's name" value="<?php echo $fName; ?>">
                </div>
                <div class="mt-2 mb-2">
                    <label for="mName">Mother's Name :</label>
                    <input type="text" class="form-control" name="mName" id="mName" placeholder="Enter Mother's name" value="<?php echo $mName; ?>">
                </div>
                <div class="mt-2 mb-2">
                    <label for="email">Email Address :</label>
                    <input type="email" class="form-control" name="email" id="email" placeholder="Enter Student's Email Address" value="<?php echo $email; ?>">
                </div>
                <div class="mt-2 mb-2">
                    <label for="gender">Gender :</label>
                    <br>
                    <input type="radio" name="gender" id="male" value="male">
                    <label for="male">Male</label> 
                    <br>
                    <input type="radio" name="gender" id="female" value="female"> 
                    <label for="female">Female</label>
                    <br>
                    <input type="radio" name="gender" id="others" value="others"> 
                    <label for="others">Others</label>
                </div>
                <div class="mt-2 mb-2">
                    <label for="age" class="">Age :</label>
                    <input type="number" class="form-control" name="age" id="age" placeholder="Enter Student's age" value="<?php echo $age; ?>">
                </div>
                <div class="mt-2 mb-2">
                    <label for="phone">Mobile Number :</label>
                    <input type="number" class="form-control" name="phone" id="phone" placeholder="Enter Your Mobile Number" value="<?php echo $phone; ?>">
                </div>
                <div class="mt-2 mb-2">
                    <label for="department" class="">Department :</label>
                    <br>
                    <select name="department" id="department" class="form-select  ">
                        <option value="select" selected disabled>Select Department</option>
                        <?php displayDepartament($department); ?>
                    </select>
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
                    <label for="comment">Comment :</label>
                    <textarea name="comment" id="comment" cols="30" rows="5" class="form-control"><?php echo $comment; ?></textarea>
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