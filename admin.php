<?php include 'config.php'; 
$msg = "";

if(isset($_POST['ajouter'])){
    $nom = $_POST['nom'];
    $desc = $_POST['description'];
    $prix = $_POST['prix'];
    $cat = $_POST['categorie'];
    
    // Upload photo
    $photo = $_FILES['photo']['name'];
    $tmp = $_FILES['photo']['tmp_name'];
    $target = "uploads/".$photo;

    if(move_uploaded_file($tmp, $target)){
        $sql = "INSERT INTO plats (nom, description, prix, photo, categorie) VALUES ('$nom', '$desc', '$prix', '$photo', '$cat')";
        if($conn->query($sql)){
            $msg = "Plat ajouté avec succès !";
        }else{
            $msg = "Erreur BDD: ".$conn->error;
        }
    }else{
        $msg = "Erreur upload photo";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin - Ajouter un plat</title>
    <style>
        body{font-family:Arial; max-width:600px; margin:30px auto;}
        input, textarea, select{width:100%; padding:8px; margin:5px 0;}
        button{padding:10px 20px; background:green; color:white; border:none; cursor:pointer;}
        .msg{color:green; font-weight:bold;}
    </style>
</head>
<body>
<h2>Ajouter un plat</h2>
<a href="menu.php">Voir le Menu</a> | <a href="index.php">Accueil</a>
<p class="msg"><?php echo $msg; ?></p>

<form method="POST" enctype="multipart/form-data">
    Nom du plat: <input type="text" name="nom" required>
    
    Catégorie: 
    <select name="categorie">
        <option>Entrée</option>
        <option>Plat</option>
        <option>Dessert</option>
        <option>Boisson</option>
    </select>

    Description: <textarea name="description" rows="4"></textarea>
    
    Prix FCFA: <input type="number" step="0.01" name="prix" required>
    
    Photo: <input type="file" name="photo" accept="image/*" required>
    
    <button name="ajouter">Ajouter le plat</button>
</form>

<hr>
<h3>Plats déjà ajoutés</h3>
<?php
$result = $conn->query("SELECT * FROM plats ORDER BY id DESC");
while($plat = $result->fetch_assoc()){
    echo "<div style='border:1px solid #ccc; padding:10px; margin:10px 0;'>";
    echo "<img src='uploads/".$plat['photo']."' width='100'>";
    echo "<b>".$plat['nom']."</b> - ".$plat['prix']." FCFA<br>";
    echo $plat['categorie'];
    echo "</div>";
}
?>
</body>
</html>