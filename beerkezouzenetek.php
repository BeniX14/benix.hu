<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'] ?? '';
    $email = $_POST['email'] ?? '';
    $message = $_POST['message'] ?? '';

    // Ellenőrzés és feldolgozás
    if (!empty($name) && !empty($message)) {
        // Üzenet mentése fájlba
        $file = 'uzenetek.txt';
        $data = "Név: $name\nE-mail: $email\nÜzenet: $message\n\n";
        file_put_contents($file, $data, FILE_APPEND);

        // Sikeres üzenet
        echo "Az üzenet sikeresen elküldve!";
    } else {
        // Hibaüzenet
        echo "Kérlek töltsd ki az összes kötelező mezőt!";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Üzenet küldése</title>
    <style>
        body {
            background-color: black;
            color: white;
            font-family: Arial, sans-serif;
        }

        .container {
            max-width: 400px;
            margin: 0 auto;
            padding: 20px;
        }

        input[type="text"],
        input[type="email"],
        textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
        }

        textarea {
            height: 100px;
        }

        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Üzenet küldése</h1>
        <form action="beerkezouzenetek.php" method="POST">
            <label for="name">Név:</label>
            <input type="text" id="name" name="name" placeholder="Add meg a neved" required>

            <label for="email">E-mail cím:</label>
            <input type="email" id="email" name="email" placeholder="Add meg az e-mail címed">

            <label for="message">Üzenet:</label>
            <textarea id="message" name="message" placeholder="Írj nekem valamit" required></textarea>

            <input type="submit" value="Küldés">
        </form>
    </div>
</body>
</html>
