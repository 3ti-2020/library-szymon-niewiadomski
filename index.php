<?php
    require_once 'connect.php';

    function createTable(){
        global $db;
        $sql = "SELECT * from autorzy, tytuly, ksiazki WHERE autorzy.id_autor = ksiazki.id_autor AND tytuly.id_tytul = ksiazki.id_tytul";

        $result = $db->query($sql);

        echo '<table>';
            echo '<tr>
                <th>ID książki</th><th>Tytuł</th><th>Autor</th><th>ISBN</th>
            </tr>';

            while($row=$result->fetch_array()){
                echo '<tr>';
                    echo '<td>'.$row['id_ksiazka'].'</td><td>'.$row['tytul'].'</td><td>'.$row['imie'].' '.$row['nazwisko'].'</td><td>'.$row['ISBN'].'</td>';
                echo '</tr>';
            }
        echo '</table>';

    }
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Library</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <main>
        <h1>Biblioteka</h1>
        <div class="library">
            <?php createTable();?>
        </div>
        <div class="insert">
            <form action="insert.php" method="post" autocomplete="off" >
                <input type="text" name="name" class="input" placeholder="Imię" required>
                <input type="text" name="lastname" class="input" placeholder="Nazwisko" required>
                <input type="text" name="title" class="input" placeholder="Tytuł" required>
                <input type="number" min="1000000000000" max="9999999999999" name="isbn" class="input" placeholder="ISBN 13 cyfr" required>
                <input type="submit" value="Dodaj książkę" class="button">
            </form>
        </div>
    </main>
</body>
</html>