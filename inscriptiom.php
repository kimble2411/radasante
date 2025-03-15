<?php
require 'src/DB.php';

$db = new DB();
$bdd = $db->getConnection();

require 'traitement.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = trim($_POST['name']);
    $firstname = trim($_POST['firstname']);
    $email = trim($_POST['email']);
    $number = trim($_POST['number']);
    $gender = $_POST['gender'];
    $dob = $_POST['dob'];

    if (!empty($name) && !empty($firstname) && !empty($email) && !empty($number) && !empty($gender) && !empty($dob)) {
        $stmt = $bdd->prepare("INSERT INTO base (name, firstname, email, number, gender, dob) VALUES (?, ?, ?, ?, ?, ?)");

        if ($stmt->execute([$name, $firstname, $email, $number, $gender, $dob])) {
            echo '✅ Envoi réussi!';
            header("Location: index.html");
            exit();
        } else {
            echo "<p class='message'>❌ Erreur lors de l'envoi.</p>";
        }
    } else {
        echo "<p class='message'>❌ Veuillez remplir tous les champs.</p>";
    }
}
?>

    
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"content="width=device-width,initial-scale=1.0">
        <link rel="stylesheet" href="inscription.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    </head>
     <body>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
  <h4>s'abonnez à la newsletter</h4>
        <hr>
        <div class="name-field">
          <div>
            <label for="name"><i class="fa-solid fa-user"></i> Nom </label>
            <input type="text" id="name" name="name" placeholder="entrez votre nom" requirerd>
          </div> 
          <div>
            <label for="firstname"><i class="fa-solid fa-user"></i>Prenom</label>
          <input type="text" id="firstname" name="firstname"placeholder="entrez votre prenom" required>
        </div> 
      </div>
      <label for="number"><i class="fa-solid fa-phone"></i>telephone</label>
      <input type="phone" id="number" name="number" placeholder="entrez votre numero de telephone" required>
         <label for="email"><i class="fa-solid fa-envelope">adresse email</i></label>
        <input type="email" id="email" name="email"placeholder="entrez votre adresse email" required>
        <label for="gender"><i class="fa-solid fa-venus-mars"></i>Vous êtes de quel sexe?</label>
<input list="genderList" id="gender" name="gender" placeholder="entrez votre sexe"required>
<datalist id="genderList">
    <option value="male">
    <option value="femelle">
</datalist>
<label for="dob" id="dob" name="dob"><i class="fa-solid fa-cake-candles"></i>quel est votre date de naissance?</label>
<input type="date" id="dob" name="dob" required>

        <input type="submit" value="envoyer">
        <p>vous voulez faire un don à RADAsante?<a href="alerte.html">cliquez ici!</a></p>
     </form>
     
     
     
    </body>
    <script src="index2.js"></script>
