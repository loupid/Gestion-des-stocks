<?php
$_categori = '';
$_price = '';
$_name = '';

if (!empty($_POST['query']) && isset($_POST['query']) && $_POST['query'] === 'Ajouter') {
    if (!empty($_POST['categories']) && isset($_POST['categories'])
        && !empty($_POST['price']) && isset($_POST['price'])
        && !empty($_POST['name']) && isset($_POST['name'])) {
        $_categori = $_POST['categories'];
        $_price = $_POST['price'];
        $_name = $_POST['name'];
        if (!is_numeric($_price) || $_price <= 0 || strpos($_price, 'e') || $_name == "" || strlen($_name) > 50) {
            redirect('?page=Ajouter');
        } else {
            try {
                $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $prep = $db->prepare("insert into Produit(nom, prix, Categorie) values (:nom, :price, :categori)");
                $prep->bindParam(':nom', $_name);
                $prep->bindParam(':price', $_price);
                $prep->bindParam(':categori', $_categori);
                $prep->execute();
            } catch (PDOException $e) {
                echo "Échec de connexion à la base de données: " . $e->getMessage();
            }
        }
    } else redirect('?page=Ajouter');
}

if (!empty($_POST['query']) && isset($_POST['query']) && $_POST['query'] === 'Modifier') {
    if (!empty($_POST['categories']) && isset($_POST['categories'])
        && !empty($_POST['price']) && isset($_POST['price'])
        && !empty($_POST['name']) && isset($_POST['name']) && !empty($_POST['id'] && isset($_POST['id']))) {
        $_categori = $_POST['categories'];
        $_price = $_POST['price'];
        $_name = $_POST['name'];
        $_id = $_POST['id'];
        if (!is_numeric($_price) || $_price <= 0 || strpos($_price, 'e') || $_name == "" || strlen($_name) > 50) {
            redirect('?page=Modifier&id=' . $_id);
        } else {
            try {
                $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $prep = $db->prepare("update Produit set Nom = :nom, Prix = :price, Categorie = :categori WHERE Id = :id");
                $prep->bindParam(':nom', $_name);
                $prep->bindParam(':price', $_price);
                $prep->bindParam(':categori', $_categori);
                $prep->bindParam(':id', $_id);
                $prep->execute();
            } catch (PDOException $e) {
                echo "Échec de connexion à la base de données: " . $e->getMessage();
            }
        }
    } else {
        $_id = $_POST['id'];
        redirect('?page=Modifier&id=' . $_id);
    }
}

if (!empty($_POST['query']) && isset($_POST['query']) && $_POST['query'] === 'Supprimer') {
    if (!empty($_POST['id'] && isset($_POST['id']))) {
        $id = $_POST['id'];
        try {
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $prep = $db->prepare("DELETE FROM Produit WHERE Id = :id");
            $prep->bindParam(':id', $id);
            $prep->execute();
        } catch (PDOException $e) {
            echo "Échec de connexion à la base de données: " . $e->getMessage();
        }
    }
}

$prep = $db->prepare("SELECT * FROM Produit;");
$prep->execute();
$data = $prep->fetchAll();
?>
<script>
    renderView('Visualiser', 'fas fa-eye', 'view');
</script>

<table class="content-table">
    <thead>
    <tr>
        <th>
            Nom
        </th>
        <th>
            Prix
        </th>
        <th>
            Catégorie
        </th>
        <th>
            Actions
        </th>
    </tr>
    </thead>
    <tbody>
    <?php
    foreach ($data as $row) {
        ?>
        <tr>
            <td>
                <?= $row["Nom"] ?>
            </td>
            <td>
                <?= $row["Prix"] ?>
            </td>
            <td>
                <?= $row["Categorie"] ?>
            </td>
            <td>
                <div id="action">
                    <form action='?page=Modifier' method="post">
                        <input type="hidden" name="id" value="<?= $row["Id"] ?>">
                        <button type="submit" class="fas fa-edit"></button>
                    </form>
                    <form action="?page=Visualiser" method="post" onsubmit="return willDelete()">
                        <input type="hidden" name="id" id="id" value="<?= $row["Id"] ?>">
                        <input type="hidden" name="query" value="Supprimer">
                        <button type="submit" class="fas fa-trash"></button>
                    </form>
                </div>
            </td>
        </tr>
        <?php
    }
    ?>
    </tbody>
</table>