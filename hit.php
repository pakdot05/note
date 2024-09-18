<!--.
<li class="nav-item dropdown">
<a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    Select Category
</a>
<div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
    <a class="dropdown-item" href="#">Category 1</a>
    <a class="dropdown-item" href="#">Category 2</a>
    <a class="dropdown-item" href="#">Category 3</a>
 Add more categories as needed 
    </div>
</li>
</ul>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Dropdown Menu</title>
<style>
.dropdown {
  position: relative;
  display: inline-block;
}

.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f9f9f9;
  min-width: 160px;
  box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);
  z-index: 1;
}

.dropdown-content a {
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
}

.dropdown-content a:hover {
  background-color: #ddd;
}

.dropdown:hover .dropdown-content {
  display: block;
}

.dropdown:hover .dropbtn {
  background-color: #3e8e41;
}
</style>
</head>
<body>

<div class="dropdown">
  <button class="dropbtn">Dropdown</button>
  <div class="dropdown-content">
    <a href="#">Option 1</a>
    <a href="#">Option 2</a>
    <a href="#">Option 3</a>
  </div>
</div>

</body>
</html>
<!DOCTYPE html>
<html>
<body>

<h1>The select element</h1>

<p>The select element is used to create a drop-down list.</p>

<form action="/action_page.php">
  <label for="cars">Choose a car:</label>
  <select name="cars" id="cars">
    <option value="volvo">Volvo</option>
    <option value="saab">Saab</option>
    <option value="opel">Opel</option>
    <option value="audi">Audi</option>
  </select>
  <br><br>
  <input type="submit" value="Submit">
</form>

<p>Click the "Submit" button and the form-data will be sent to a page on the 
server called "action_page.php".</p>

</body>
</html>
<?php
//initialize variables and set to empty values
$name = $phone = $email = $business = $industry= "";
$nameErr = $phoneErr = $emailErr = $businessErr = $industryErr="";

ini_set('display_errors', 1);
error_reporting(E_ALL);

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $valid = true;

    //check if name contains letters and white-space
    if (empty($_POST["name"])) {

        $valid = false;

        $nameErr = "Please fill out this field";
        echo 'name is empty<br>';
    } else {
        $name = test_input($_POST["name"]);
        if (!preg_match("/^[a-zA-Z ,.-]*$/", $name)) {

            $valid = false;

            $nameErr = "*Only Letters and white-spaces are allowed*";
        } /* else {
          echo'name is valid<br>';
          } */
    }

    //check if phone contains numbers
    if (empty($_POST["phone"])) {

        $valid = false;

        $phoneErr = "Please fill out this field";
        echo'phone is empty<br>';
    } else {
        $phone = test_input($_POST["phone"]);
        if (!preg_match("/^[0-9 ,+.-]*$/", $phone)) {

            $valid = false;

            $phoneErr = "*Only numbers are allowed*";
        
        }

        /*   else {
          echo'  phone is valid<br>';
          } */
    }

    //check if email is valid
    if (empty($_POST["email"])) {

        $valid = false;

        $emailErr = "Please fill out this field";
        echo'email is empty<br>';
    } else {
        $email = test_input($_POST["email"]);
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {

            $valid = false;

            $emailErr = "*Invalid email address*";
           
        }

        /*  else {
          echo'email is valid<br>';
          }
         */
    }
	
	      //check if industry is filled
	 if (empty($_POST["industry"])) {
		 $industryErr = "Please Select an item";
	} else 
	{$industry = test_input($_POST["industry"]);}
	
	
}
?>

<!DOCTYPE html>
<html>
    <head>
        <meta name= "robots" content= "noindex, nofollow">
        <meta charset="UTF-8">
        <meta name= "author" content= "Kelly James">
        <link href= "style.css" rel= "stylesheet" type= "text/css">
        <title> Contact form </title>
    </head>

    <body>

        <img src= "images/logo.gif" border= "0" width= "240" height="160">

        <br>
        <div class="form">

            <form method= "post" action= "<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" >

                <h4 id="h4form"> Please fill the form below to kick start your project. <br> <br> <font color="red"> *required field </font> </h4>

                <br> What is your name? <input type= "text" class= "input" name= "name"  placeholder= "e.g Nelson Mandela" value="<?php echo $name; ?>"  required> <span class= "error"> * <br> <?php echo $nameErr; ?> </span>

                <br> <br>What is your phone number? <input type= "text" class= "input" name= "phone"  value="<?php echo $phone; ?>" placeholder= "e.g 0722222222" required> <span class= "error"> * <br> <?php echo $phoneErr; ?> </span>

                <br> <br> What is your email address? <input type= "email" class= "input" name= "email" placeholder= "will not be published" value="<?php echo $email; ?>" required> <span class= "error"> * <br> <?php echo $emailErr; ?> </span>
				
				<br> <br> What industry is your business? <span class= "error"> * <?php echo $industryErr;?> </span>
                    <select class= "input" name="industry" required>
                     <option value= "" > Select  Industry </option>
                     <option value= "Air_and_Travel" >Air & Travel </option>
                     <option value= "Agriculture">Agriculture</option> 
					 <option value= "Architecture and Structural"> Architecture and Structural </option> 
					 <option value="Attorney & legal"> Attorney & Legal </option> 
					 <option value="Automotive"> Automotive </option>
                     <option value= "Consultation"> Consultation </option>
					 </select> 
					 
				<br> <br> <button class="submit" type= "submit" value= "Submit"> Submit  Form </button>



            </form>
        </div>
    </body>
</html>
