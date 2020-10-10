<?php
$id = '';
if (!empty($_POST['id'])){
    $id = $_POST['id'];
} else $id = $_GET['id'];
$prep = $db->prepare("SELECT * FROM stocks.produit Where Id = :id");
$prep->bindParam(':id',$id);
$prep->execute();
$data = $prep->fetch();
?>
<script>
    renderView('Modifier','fas fa-edit');
</script>

<div id="form">
    <h1>Modifier</h1>

    <form action="?page=Visualiser" method="post">
        <div>
            <label for="name">Nom du stock</label>
            <input id="name" name="name" type="text" maxlength="50" value="<?= $data['Nom'] ?>" required>
        </div>

        <div>
            <label for="price">Prix du stock</label>
            <!-- that validate if the number correspond the number allowed in DB-->
            <input id="price" name="price" type="number" value="<?= $data['Prix'] ?>" min="0.01" pattern="^[0-9]+([\.,][0-9]{1,2})?$" step="0.01" required>
        </div>

        <div>
            <label for="categories">Catégorie</label>
            <select name="categories" id="categories">
                <option value="Informatique" <?php echo ($data['Categorie'] === 'Informatique' ? 'selected' : ''); ?>>Informatique</option>
                <option value="Décoration" <?php echo ($data['Categorie'] === 'Décoration' ? 'selected' : ''); ?>>Décoration</option>
                <option value="Plomberie" <?php echo ($data['Categorie'] === 'Plomberie' ? 'selected' : ''); ?>>Plomberie</option>
                <option value="Outils" <?php echo ($data['Categorie'] === 'Outils' ? 'selected' : ''); ?>>Outils</option>
                <option value="Extérieur" <?php echo ($data['Categorie'] === 'Extérieur' ? 'selected' : ''); ?>>Extérieur</option>
                <option value="Audiovisuel" <?php echo ($data['Categorie'] === 'Audiovisuel' ? 'selected' : ''); ?>>Audiovisuels</option>
            </select>
        </div>

        <div>
            <input type="hidden" name="id" value="<?= $data['Id'] ?>">
            <input type="submit" name="query" value="Modifier">
        </div>
    </form>
</div>