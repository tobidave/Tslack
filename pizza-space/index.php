<?php
    // connection
    $conn = mysqli_connect('sql108.epizy.como', 'epiz_31208857', 'vsUQzmtViBttHJ', 'epiz_31208857_pizzaspace' );

    if(!$conn){
        echo 'connection lost: ' . mysqli_connect_error(); 
    }
    $sql = 'SELECT id, title,ingredients FROM pizzas ORDER BY created_at';

    $result = mysqli_query($conn, $sql);

    $pizzas = mysqli_fetch_all($result, MYSQLI_ASSOC);

    // print_r($pizzas);
    mysqli_free_result($result);

    mysqli_close($conn);
?>
<!DOCTYPE html>
<html lang="en">
 
<?php include'./templates/header.php'?>

<h4 class="center grey-text"> PizzaS! </h4>
<div class="container">
    <div class="row">
        <?php 
        foreach($pizzas as $pizza){ ?>
        <div class="col s6 md3">
            <div class="card z-depth-0">
                <div class="card-content center">
                    <!-- <h4> <?php echo htmlspecialchars($pizza['id']) ?></h1> -->
                    <h5 ><?php echo htmlspecialchars($pizza['title']) ?></h5>
                    <div><?php echo htmlspecialchars($pizza['ingredients'])?></div>
                    <div class="card-action right-align z=depth-0">
                        <a href="#" class="brand-text"> More Info</a>
                    </div>

                </div>
            </div>
        </div>        
       <?php } ?>
    </div>


</div>



<?php include'./templates/footer.php' ?>
</html>
