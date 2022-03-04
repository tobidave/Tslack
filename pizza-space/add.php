<?php
$email = $title = $ingredients = '';
// $mainerror =['email'=>'', 'title'=>'', 'ingredients'=>'' ];
$error = ['email'=>'', 'title'=>'', 'ingredients'=>'' ];

    if (isset($_POST['submit'])){
      // email verification
    if(empty($_POST['email'])){
      $error['email'] = 'An email is required <br />
      i.e: abc@gmail.com <br />';
     }else {
      $email = $_POST['email'];
      if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $error['email'] = "you need a valid email <br />";
      }
      // echo htmlspecialchars($_POST['email']);
    }
    
    // title verification
    if(empty($_POST['title'])){
      $error['title'] =  'A title is required <br />';
    }else{
      $title = $_POST['title'];
      if(!preg_match('/^[a-zA-Z\s]+$/', $title)){
        $error['title'] = 'your title must conatain only letters and spaces only <br />
        any form of _-.#@^&*: cant be used <br />';
      }
    //     // echo htmlspecialchars( $_POST['title']);


        if(array_filter($error)){

        }else{
          header('location: index.php');
        }
    }
    

    // // ingredients verification
    if(empty($_POST['ingredients'])){
      $error['ingredients'] = 'at least a ingredient is required <br />';
    }else{
      $ingredients = $_POST['ingredients'];
      if(!preg_match('/^([a-zA-Z\s]+)(,\s*[a-zA-Z\s]*)*$/', $ingredients)){
        $error['ingredients'] = 'ingredeints are meant to be comma seprated <br />
        spaces not allowed <br />';
      }
    //   // echo htmlspecialchars($_POST['ingredients']);
    }

    }
?>
<!DOCTYPE html>
<html lang="en">
 
<?php include'./templates/header.php'?>
<section class="container red-text">
    <h4 class="center"> Add a pizza</h4>
    <form class="white" action="add.php" method="POST">
        <label for="">Your Email</label>
        <input type="text" name="email" value="<?php  echo htmlspecialchars($email) ?>">
        <div class="red-text"> 
          <?php // echo $mainerror['email'];
                echo $error['email']
        ?></div>
        <label for="">Pizza Ttitle</label>
        <input type="text" name="title" value="<?php  echo htmlspecialchars($title) ?>">
        <div class="red-text"> 
          <?php // echo $mainerror['title'];
                echo $error['title']
        ?></div>
        <label for="">Ingredients (comma seprated):</label>
        <input type="text" name="ingredients" value="<?php  echo htmlspecialchars($ingredients) ?>">
        <div class="red-text"> 
          <?php // echo $mainerror['ingredients'];
                echo $error['ingredients']
        ?></div>
        <div class="center ">
            <input type="submit" name="submit" value="submit" class="btn brand z-depth-0">
        </div>
            

    </form>
</section>
<?php include'./templates/footer.php' ?>
</html>