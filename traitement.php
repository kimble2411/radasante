<?php
$servername = "localhost";
$username = "root";  // Utilise un utilisateur valide, comme 'admin' ou celui que tu as défini dans MySQL
$password = ""; 
$dbname ="data"; // Le mot de passe pour l'utilisateur MySQL

try {
    // Fixing the database connection string
    $bdd = new PDO("mysql:host=$servername; port=3307;dbname=data;charset=utf8", $username, $password);
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
} catch (PDOException $e) {
    die("Erreur : " . $e->getMessage()); // Stop execution if connection fails
}
// Check if form was submitted
if (isset($_POST['ok'])) {
    // Retrieve form data safely
    $name = trim($_POST['name']);
    $firstname =trim($_POST['firstname']);
    $email = trim($_POST['email']);
    $number = $_post['number'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);  // Hash password for security

    // Prepare and execute SQL query with placeholders
    $requette = $bdd->prepare("INSERT INTO users VALUES (0, :name, :firstname, :email, :number, :password)");
    $requette->execute(array(
        "name" => $name,
        "firstname" => $firstname,
        "email" => $email,
        "number"=>$number,
        "password" => $password,
        
    ));

    // Fetching inserted data (optional, not necessary here)
    $reponse = $requette->fetchAll(PDO::FETCH_ASSOC);
    var_dump($reponse);
}
?>