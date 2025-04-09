<?php
$conn = new mysqli("localhost", "root", "", "sqllab");

if ($conn->connect_error) {
    die("Connexion échouée: " . $conn->connect_error);
}

$id = $_GET['id']; // 🧨 Pas sécurisé !
$query = "SELECT * FROM users WHERE id = $id";
$result = $conn->query($query);

if ($result && $result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<strong>Utilisateur :</strong> " . htmlspecialchars($row["username"]) . "<br>";
        echo "<strong>Email :</strong> " . htmlspecialchars($row["email"]) . "<br>";
        echo "<strong>Role :</strong> " . htmlspecialchars($row["role"]) . "<hr>";
    }
} else {
    echo "Aucun utilisateur trouvé.";
}
?>
