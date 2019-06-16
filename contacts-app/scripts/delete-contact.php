<?php 

require("../models/contact.php");



if(Contact::deleteContact($_GET['id']))
{
    echo "Contact Deleted";
}
else
{
    echo "Error";
}




?>