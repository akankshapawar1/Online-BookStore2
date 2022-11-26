<!-- PHP code to establish connection with the localserver -->
<?php

$user = 'admin';
$password = 'Fit4M0Re!';
 
$database = 'BookStore';
$servername='dbms-project.csddeoelb5pk.us-east-1.rds.amazonaws.com:3306';
$mysqli = new mysqli($servername, $user,
                $password, $database);
$link = mysqli_connect($servername, $user, $password, $database);

// Checking for connections
if ($mysqli->connect_error) {
    die('Connect Error (' .
    $mysqli->connect_errno . ') '.
    $mysqli->connect_error);
}

    $sql = "SELECT pid FROM Publisher;";
    $result = $mysqli->query($sql);

?>

<!DOCTYPE html>
<html>
  <head>
    <title>Add New Book</title>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600' rel='stylesheet' type='text/css'>
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
    <style>
      html, body {
      min-height: 100%;
      }
      body, div, form, input, select, p { 
      padding: 0;
      margin: 0;
      outline: none;
      font-family: Roboto, Arial, sans-serif;
      font-size: 14px;
      color: #666;
      }
      h1 {
      margin: 0;
      font-weight: 400;
      }
      h3 {
      margin: 12px 0;
      color: #8ebf42;
      }
      .main-block {
      display: flex;
      justify-content: center;
      align-items: center;
      background: #fff;
      }
      form {
      width: 100%;
      padding: 20px;
      }
      fieldset {
      border: none;
      border-top: 1px solid #8ebf42;
      }
      .account-details, .personal-details {
      display: flex;
      flex-wrap: wrap;
      justify-content: space-between;
      }
      .account-details >div, .personal-details >div >div {
      display: flex;
      align-items: center;
      margin-bottom: 10px;
      }
      .account-details >div, .personal-details >div, input, label {
      width: 100%;
      }
      label {
      padding: 0 5px;
      text-align: right;
      vertical-align: middle;
      }
      input {
      padding: 5px;
      vertical-align: middle;
      }
      .checkbox {
      margin-bottom: 10px;
      }
      select, .children, .gender, .bdate-block {
      width: calc(100% + 26px);
      padding: 5px 0;
      }
      select {
      background: transparent;
      }
      .gender input {
      width: auto;
      } 
      .gender label {
      padding: 0 5px 0 0;
      } 
      .bdate-block {
      display: flex;
      justify-content: space-between;
      }
      .birthdate select.day {
      width: 35px;
      }
      .birthdate select.mounth {
      width: calc(100% - 94px);
      }
      .birthdate input {
      width: 38px;
      vertical-align: unset;
      }
      .checkbox input, .children input {
      width: auto;
      margin: -2px 10px 0 0;
      }
      .checkbox a {
      color: #8ebf42;
      }
      .checkbox a:hover {
      color: #82b534;
      }
      button {
      width: 100%;
      padding: 10px 0;
      margin: 10px auto;
      border-radius: 5px; 
      border: none;
      background: #8ebf42; 
      font-size: 14px;
      font-weight: 600;
      color: #fff;
      }
      button:hover {
      background: #82b534;
      }
      @media (min-width: 568px) {
      .account-details >div, .personal-details >div {
      width: 50%;
      }
      label {
      width: 40%;
      }
      input {
      width: 60%;
      }
      select, .children, .gender, .bdate-block {
      width: calc(60% + 16px);
      }
      }
    </style>
  </head>
  <body>
    <div class="main-block">
    <form role="form" method="post" action="addNewBook.php">
      <h1>Add a new book</h1>
      <fieldset>
        <legend>
          <h3>Book Details</h3>
        </legend>
        <div class="account-details">

          <div><label>BookID </label><input type="text" name="bookId" required></div>

          <div><label>Book Title </label><input type="text" name="bookTitle" required></div>

          <!--Genre should be dropdown-->
          <!--<div><label>Genre </label><input type="text" name="genre" required></div>-->
          <div><label>Genre </label>
          <select name="genre" required>
              <option value="">Select...</option>
              <option value="Young Adult">Young Adult</option>
              <option value="Mystery">Mystery</option>
              <option value="Fiction">Fiction</option>
              <option value="Childrens">Childrens</option>
              <option value="SciFi/Fantasy">SciFi/Fantasy</option>
              <option value="Romance">Romance</option>
              <option value="Nonfiction">Nonfiction</option>
              <option value="Memoir">Memoir</option>
          </select>
          </div>

          <!--number-->
          <div><label>No of Pages </label><input type="number" name="noOfPages" required></div>

          <div><label>ISBN </label><input type="text" name="isbn" required></div>

          <!--Type should be dropdown Predefined-->
          <div><label>Format </label>
            <select name="Format" required>
              <option value="">Select...</option>
              <option value="Mass market paperback">Mass market paperback</option>
              <option value="Board book">Board book</option>
              <option value="Paperback">Paperback</option>
              <option value="Trade paperback">Trade paperback</option>
              <option value="Hardcover">Hardcover</option>
              <option value="Graphic">Graphic</option>
            </select>
          </div>
          <!--number-->
          <div><label>Price </label><input type="number" step="any" name="price" required></div>

          <!--number-->
          <div><label>Volume </label><input type="number" name="volume" required></div>

          <!--Number-->
          <div><label>Print Run </label><input type="number" name="printRun" required></div>

          <!--Type should be date(Add calendar)-->
          <div><label>Publication Date </label><input type="date" name="publicationDate" required></div>

          <!--Should be a dropdown or autopopulate, whichever is easier
          <div><label>Author Name </label><input type="text" name="authorName" required></div>
          -->
          
          <div><label>Author ID </label><input type="text" name="authorId" required></div>

          <!-- Add a button that says 'Add award'
          <div><label>Award Name</label><input type="text" name="awardName"></div>

          <div><label>Award Year</label><input type="text" name="authorId">
          -->

            <!--Dropdown-->
            <!--Add new publisher button-->
            <div>
            <label>Publisher </label>
              <!--<select name="PublisherID" required id="PublisherID">
                <option value="here">here</option>-->
                <?php 
                echo "<select id='PublisherID' name='PublisherID'>";

                while ($row = mysqli_fetch_array($result)) {
                   unset($id, $name);
                   $id = $row['pid'];
                   $name = $row['name']; 
                   ?>
                   <!--echo '<option value="'.$id.'">'.$name.'</option>';-->
                   <option value="<?= $id?>"><?= $id?></option>
                 <?php }
                 echo "</select>";
                ?>
                
                

              <!--</select>-->
            </div>
          </div>
        </fieldset>
      </div>
      <button type="submit" href="/">Submit</button>
      <!--<button type="submit" formaction="addAward.php">Add award for a book</button>
      <button type="submit" formaction="addPublisher.php">Add a new publisher</button>-->
    </form>
    </div> 
  </body>
</html>