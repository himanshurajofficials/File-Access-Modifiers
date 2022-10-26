<?php
ini_set('display_errors', true);
error_reporting(E_ALL);
if (isset($_POST['submit1'])) {
    $permission = $_POST['permit'];
    $filename = $_POST['filename1'];
    $dirname1 = $_POST['dirname'];
    $filename1 = $dirname1 ."/". $filename;
    chdir($dirname1);
    switch ($permission) {
        case "ex":
            chmod($filename1,0111);
            echo "<h2>";
            echo "Permission Of " . " Execute Only " . "have been  sucessfully granted to " . $filename;
            echo "</h2>";
            break;
        case "wr":
            chmod($filename1,0222);
            echo "<h2>";
            echo "Permission Of " . " Write Only " . "have been sucessfully granted to " . $filename;
            echo "</h2>";
            break;
        case "re":
            chmod($filename1,0444);
            echo "<h2>";
            echo "Permission Of " . " Read Only " . "have beensucessfully granted to " . $filename;
            echo "</h2>";
            break;
        case "exwr":
            chmod($filename1,0333);
            echo "<h2>";
            echo "Permission Of " . " Execute and Write Only " . "have been sucessfully granted to " . $filename;
            echo "</h2>";
            break;
        case "exre":
            chmod($filename1,0555);
            echo "<h2>";
            echo "Permission Of " . " Execute and Read Only " . "have been sucessfully granted to " . $filename;
            echo "</h2>";
            break;
        case "wrre":
            chmod($filename1,0666);
            echo "<h2>";
            echo "Permission Of " . " Write And Read Only " . "have been sucessfully granted to " . $filename;
            echo "</h2>";
            break;
        case "exwrre":
            chmod($filename1,0777);
            echo "<h2>";
            echo "Permission Of " . "Execute, Write and Read " . "have been sucessfully granted to " . $filename;
            echo "</h2>";
            break;
        case "np":
            chmod($filename1,0000);
            echo "<h2>";
            echo "NO Permission  " . "have been granted to " . $filename;
            echo "</h2>";
            break;
        default:
            echo "error";
    }
}

echo "<hr>";
echo "<h2>List Of Files With New Permissions</h2>";
echo "<pre>";
system("ls -l");
echo "</pre>";
echo "<hr>";
echo "<a href='http://localhost/html/file_permissions_page1.php' alt='Link to go to previous page'> Click to go to previous page </a>";
?>
