<html>
<body>


Welcome
<?php

if($_SERVER["REQUEST_METHOD"] == "POST")
{
$name = $_REQUEST['name'];
if(empty($name))
{
echo "name is empty";
}
else
{
echo $name;
}
}

?>
</body>
</html>