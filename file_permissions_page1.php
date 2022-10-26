<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LAB1</title>
</head>

<body>



    <form action="file_permissions_page1.php" method="post">
        <?php
        echo "<h2>Your Present directory is : </h2>";
        system("pwd");
        echo "<hr>";
        echo "<h2>Enter New Directory Or File Path</h2><br>";
        ?>
            <input type="text" name="path" id="path_name" placeholder="Enter Your Path Name " />
            <input type="submit" name="submit" value="SUBMIT" />
    </form>
   

    <?php
    
    $path_name = $_POST['path'];
    if (isset($_POST['submit'])) {
        if ($path_name != null) {
            chdir("$path_name");
            echo "<hr>";
            echo "<h2>Your new directory is:</h2>";
            system("pwd");
            echo "<br><hr><br>";


            $f =  scandir($path_name, 1);
            echo "<table  border='1px solid black' style='border-collapse:collapse ;width:80%' >";
            echo "<tr>";
            echo "<th>" . "File Name"  . "</th>";
            echo "<th>" . "Owner" . "</th>";
            echo "<th>" . "Change Permissions" . "</th>";
            echo "</tr>";
            foreach ($f as $i) {
                $o = fileowner($i);
                $on = posix_getpwuid($o)['name'];
               
                echo "<tr>";
                
                
            echo "<form action='file_permissions_page2.php' method='post'>"; 
           echo "<input hidden type='invisible' name ='dirname'  value='$path_name' />";
            echo "<input hidden type='invisible' name ='filename1'  value='$i' />";
           echo "<td>$i</td>";
                echo "<td>" . $on . "</td>";
                echo "<td>";
           echo "<select name='permit' id='permit>";
            echo "<option value=''>Select Permissions</option>";
            echo "<option value='ex'>Execute only</option>";
            echo "<option value='wr'>Write Only</option>";
            echo "<option value='re'>Read Only</option>";
            echo "<option value='exwr'>Execute and write only</option>";
            echo "<option value='exre'>Execute and read only</option>";
            echo "<option value='wrre'>Write and Read Only</option>";
            echo "<option value='exwrre'>Execute,write and Read</option>";
            echo "<option value='np'>No Permissions</option>";
            echo "</select>";
            echo "<input type='submit' name='submit1' value='SUBMIT' />";
            echo "</form>";
              
            echo "</td>";
                echo "</tr>";

                }
            echo "</table>";
            echo "<br><br><hr>";
            echo "<h2>";
            echo "Details Of the Files inside " . $path_name ;
            echo " </h2>";
            echo "<pre>";
            system("ls -l");
            echo "</pre>";
        }
    }

    ?>
</body>
</html>
