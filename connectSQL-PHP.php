<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>etudiant Information</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h1>etudiant Information</h1>
    <?php
    $servername = "localhost:3307";  
    $username = "root@";    
    $password = "";     
    $dbname = "centreformation";

    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $stmt = $conn->query('SELECT * FROM etudiant');

        $etudiant = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if ($etudiant) {
            echo '<table>';
            echo '<tr>';
            foreach ($etudiant[0] as $key => $value) {
                echo '<th>' . htmlspecialchars($key) . '</th>';
            }
            echo '</tr>';

            foreach ($etudiant as $etudiant) {
                echo '<tr>';
                foreach ($etudiant as $value) {
                    echo '<td>' . htmlspecialchars($value) . '</td>';
                }
                echo '</tr>';
            }

            echo '</table>';
        } else {
            echo 'No etudiant data found.';
        }
    } catch (PDOException $e) {
        echo 'Erreur de connexion: ' . $e->getMessage();
    }
    ?>
</body>
</html>