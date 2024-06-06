
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
    <!-- <link rel="stylesheet" href="styles.css"> -->
    <style>
        body {
    font-family: Arial, sans-serif;
    background-color: #f0f0f0;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    margin: 0;
}
.first{
    width: 50%;

}
.second{
    width:50%;
}
.form-container {
    background-color: white;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    width: 300px;
}

h2 {
    text-align: center;
    margin-bottom: 20px;
}

label {
    display: block;
    margin-bottom: 8px;
    font-weight: bold;
}
input[type="text"], input[type="password"], input[type="tel"], input[type="email"] {
    width: 100%;
    padding: 8px;
    margin-bottom: 15px;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
}

button {
    width: 100%;
    padding: 10px;
    background-color: #007BFF;
    color: white;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    font-size: 16px;
}

button:hover {
    background-color: #0056b3;
}

    </style>
</head>
<body>
    <div class="form-container">
        <form action="" method="POST">
            <h2>Registration Form</h2>

            <?php
            include 'connection.php';
            
            $ids = $_GET['id'];
            $showquery = "SELECT * from `jobregistration` WHERE id = {$ids}";
            $showdata = mysqli_query($con,$showquery);
            $arrdata = mysqli_fetch_array($showdata);

            if(isset($_POST['submit'])) {
                $idupdate = $_GET['id'];
                $name = $_POST['username'];
                $degree = $_POST['deg'];
                $mobile = $_POST['mob'];
                $email = $_POST['emai'];
                $refer = $_POST['ref'];
                $job = $_POST['jobpost'];
                // $insertquery = "INSERT INTO `jobregistration`(`name`, `degree`, `mobile`, `email`, `refer`, `jobpost`)  VALUES ('$name', '$degree', '$mobile', '$email', '$refer', '$job')";
                $updatequery = "UPDATE `jobregistration` SET name='$name', degree='$degree', mobile='$mobile', email='$email', refer='$refer', jobpost='$job' WHERE id=$idupdate";
                
                $res = mysqli_query($con, $updatequery);
                if($res) {
                    echo "<script>alert('Data updated successfully');</script>";
                } else {
                    echo "<script>alert('Data not updated successfully');</script>";
                }
            }
?>      
            
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" value= " <?php echo $arrdata['name']; ?>" required>
            
            <label for="degree">Degree:</label>
            <input type="text" id="degree" name="deg" value= " <?php echo $arrdata['degree']; ?>">
            
            <label for="mobile">Mobile:</label>
            <input type="tel" id="mobile" name="mob" value= " <?php echo $arrdata['mobile']; ?>"required>
            
            <label for="email">Email:</label>
            <input type="email" id="email" name="emai" value= " <?php echo $arrdata['email']; ?>"required>
            
            <label for="refer">Refer:</label>
            <input type="text" id="refer" name="ref" value= " <?php echo $arrdata['refer']; ?>">
            
            <label for="jobprofile">Job Profile:</label>
            <input type="text" id="jobpost" name="jobpost" value= "Web developer">
            
            <input type="submit" name="submit" value="Update"/>
            <br>
            <a href="display.php"> check form</a>
        </form> 
    </div>
</body>
</html>
