<?php 
require("../template-header.php");

require("../models/contact.php");
session_start();
if(!isset($_SESSION['userId']))
{
    header("Location: ../index.php");
}

$contact = Contact::getContactById($_GET['id']);

?>


<div class="container">
    <form action="../scripts/update-contact.php" method="POST">
        <input hidden name="id" value="<?php echo $contact->id ?>">
        <div class="form-group">
            <label for="name">Full Name</label>
            <input type="text" class="form-control" id="name" name="name" aria-describedby="emailHelp" placeholder="Full Name" value="<?php echo $contact->name ?>">
        </div>
        <div class="form-group">
            <label for="email">Email address</label>
            <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" placeholder="Enter email" value="<?php echo $contact->email ?>">
        </div>
        <div class="form-group">
            <label for="mobile">Mobile Number</label>
            <input type="text" class="form-control" id="mobile" name="mobile" aria-describedby="emailHelp" placeholder="Mobile Number" value="<?php echo $contact->mobile ?>">
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>

</div>






<?php 
require("../template-footer.php");
?>

