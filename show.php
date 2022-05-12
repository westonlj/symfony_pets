<?php 
require 'lib/functions.php';
if (!isset($_GET['id'])) {
    echo 'Sorry! Pet not found!';
    die; // or return 0;
}

// TODO: WHAT HAPPENS WHEN WE ENTER A PET ID THAT DOES NOT EXIST OR IS HUGE

$id = $_GET['id']; // associative array grabbed from our GET query

$pets = get_pet($id);
?>

<?php require 'layout/header.php'?>

<div class="container">
    <div class="row">
        <div class="col-xs-3 pet-list-item">
            <img src="/images/<?php echo $pets['image'] ?>" class="pull-left img-rounded" />
        </div>
        <div class="col-xs-6">
            <p>
                <?php echo $pets['information']; ?>
            </p>

            <table class="table">
                <tbody>
                    <tr>
                        <th>Breed</th>
                        <td><?php echo $pets['breed']; ?></td>
                    </tr>
                    <tr>
                        <th>Age</th>
                        <td><?php echo $pets['age']; ?></td>
                    </tr>
                    <tr>
                        <th>Weight</th>
                        <td><?php echo $pets['weight']; ?></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php require 'layout/footer.php'?>
