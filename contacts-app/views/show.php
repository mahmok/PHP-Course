<?php 
require("../template-header.php");
require("../models/contact.php");

session_start();
if(!isset($_SESSION['userId']))
{
    header("Location: ../index.php");
}

function printContact($contact)
{

    echo  '<tr>'.
            '<th scope="row">'.$contact['0'].'</th>'.
            '<td>'.$contact['1'].'</td>'.
            '<td>'.$contact['2'].'</td>'.
            '<td>'.$contact['3'].'</td>'.
            '<td>'.
                '<form action="./update.php" method="GET"><input name="id" hidden value='.$contact['0'].' ><button type="submit" class="btn btn-primary">Update</button></form>'.
                '<form action="../scripts/delete-contact.php" method="GET"><input name="id" hidden value='.$contact['0'].' ><button type="submit" class="btn btn-danger">Delete</button></form>'.
            '</td>'.
    '</tr>';
}

$rows = Contact::getAllContacts();

?>


<div class="container">
    <table class="table">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Full Name</th>
                <th scope="col">Email Address</th>
                <th scope="col">Mobile Number</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php 
                foreach($rows as $row)
                {
                    printContact($row);
                }
            ?>
        </tbody>
    </table>

    <br>
    <br>
    <div class="text-center">
        <a href="./create-form.php" role="button" class="btn btn-primary col-6 text-center">Create Contact</a>
    </div>

</div>






<?php 
require("../template-footer.php");
?>

