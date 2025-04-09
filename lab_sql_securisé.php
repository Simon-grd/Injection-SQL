<?php
$conn = new mysqli("localhost", "root", "", "sqllab");

if ($conn->connect_error) {
    die("Connexion échouée: " . $conn->connect_error);
}

$id = $_GET['id'];

if (!is_numeric($id)) {
    die("ID invalide.");
}

$stmt = $conn->prepare("SELECT * FROM users WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();

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
