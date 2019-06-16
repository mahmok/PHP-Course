<?php 

require("../models/contact.php");



if(Contact::updateContact($_POST['id'], $_POST['name'], $_POST['email'], $_POST['mobile']))
{
    echo "Contact Updated";
}
else
{
    echo "Error";
}




?>