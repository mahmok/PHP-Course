<?php 

require("../models/contact.php");



if(Contact::createContact($_POST['name'], $_POST['email'], $_POST['mobile']))
{
    echo "Contact Created";
}
else
{
    echo "Error";
}




?>