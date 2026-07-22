<?php include 'config.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <title>Notre Menu - Restaurant</title>
    <style>
        body{font-family:'Arial'; background:#f8f8f8; margin:0; padding:20px;}
        h1{text-align:center; color:#d35400; margin-bottom:30px;}
        .container{display:flex; flex-wrap:wrap; gap:20px; justify-content:center; max-width:1200px; margin:auto;}
        .plat{background:white; border-radius:12px; padding:0; width:320px; box-shadow:0 4px 8px rgba(0,0,0,0.1); overflow:hidden; transition:0.3s;}
        .plat:hover{transform:scale(1.03);}
        .plat img{width:100%; height:220px; object-fit:cover;}
        .info{padding:15px;}
        .info h3{margin:0 0 10px 0; color:#333;}
        .info p{margin:0 0 10px 0; color:#666; font-size:14px;}
        .prix{color:#d35400; font-size:22px; font-weight:bold;}
        .categorie{background:#d35400; color:white; padding:3px 10px; border-radius:15px; font-size:12px;}
        .topnav{text-align:center; margin-bottom:20px;}
        .topnav a{color:#d35400; text-decoration:none; font-weight:bold;}
    </style>
</head>
<body>
<div class="topnav"><a href="admin.php">+ Ajouter un plat</a></div>
<h1>🍽️ Notre Menu</h1>
<div class="container">
<?php
$result = $conn->query("SELECT * FROM plats ORDER BY id DESC");
while($plat = $result->fetch_assoc()){
    echo "<div class='plat'>";
    echo "<img src='uploads/".$plat['photo']."'>";
    echo "<div class='info'>";
    echo "<span class='categorie'>".$plat['categorie']."</span>";
    echo "<h3>".$plat['nom']."</h3>";
    echo "<p>".$plat['description']."</p>";
    echo "<p class='prix'>".$plat['prix']." FCFA</p>";
    echo "</div></div>";
}
?>
</div>
</body>
</html>