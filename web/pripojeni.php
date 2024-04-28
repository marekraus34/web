<!DOCTYPE html>
<utf8_encode>
<html>
<head>
    <title>Moje portfolio</title>
    <link rel="stylesheet" href="styleznamky.css">
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
            margin-top: 20px;
        }
        th, td {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
            background-color: #ffffff; /* Barva pozadí buněk */
            color: #000000; /* Barva textu */
        }
        th {
            background-color: #f2f2f2;
        }
        .banner {
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="banner">
        <div class="navbar">
            <img src="logo.png" class="logo">
            <ul>
                <li><a href="Domu.html">Domu</a></li>
                <li><a href="znamky.html">Znamky</a></li>
                <li><a href="o_me.html">O me</a></li>
            </ul>
        </div>
        <h1>Moje skolni vysledky</h1>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <label for="predmet">Predmet:</label>
            <input type="text" id="predmet" name="predmet" required><br><br>
            
            <label for="body">Pocet bodu za semestr:</label>
            <input type="number" id="body" name="body" required><br><br>
            
            <label for="zapocet">Ziskany zapocet:</label>
            <select id="zapocet" name="zapocet">
                <option value="ano">Ano</option>
                <option value="ne">Ne</option>
            </select><br><br>
            
            <label for="zkouska">Absolvovana zkouska:</label>
            <select id="zkouska" name="zkouska">
                <option value="ano">Ano</option>
                <option value="ne">Ne</option>
            </select><br><br>
            
            <input type="submit" value="Pridat vysledek">
        </form>

        <?php
        session_start();

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $predmet = $_POST['predmet'];
            $body = $_POST['body'];
            $zapocet = $_POST['zapocet'];
            $zkouska = $_POST['zkouska'];
            $_SESSION['data'][] = array($predmet, $body, $zapocet, $zkouska);
        }

        if(isset($_SESSION['data'])) {
            echo '<h2>Vase zadane hodnoty:</h2>';
            echo '<table>';
            echo '<tr>
                    <th>Predmet</th>
                    <th>Pocet bodu za semestr</th>
                    <th>Ziskany zapocet</th>
                    <th>Absolvovana zkouska</th>
                </tr>';
            foreach ($_SESSION['data'] as $row) {
                echo '<tr>';
                foreach ($row as $value) {
                    echo '<td>' . $value . '</td>';
                }
                echo '</tr>';
            }
            echo '</table>';
        }
        ?>
    </div>
</body>
</html>
