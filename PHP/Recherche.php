<?php
$prep = $db->prepare("SELECT * FROM stocks.Produit where Nom like :nom or Prix like :price or Categorie like :categori;");
if (!empty($_POST['search']) && isset($_POST['search'])){
    $search = '%'.$_POST['search'].'%';
    $prep->bindParam(':nom', $search);
    $prep->bindParam(':price', $search);
    $prep->bindParam(':categori', $search);
} else{
    $search = '%%';
    $prep->bindParam(':nom', $search);
    $prep->bindParam(':price', $search);
    $prep->bindParam(':categori', $search);
}
$prep->execute();
$data = $prep->fetchAll();
?>
<script>
    renderView('Recherche', 'fas fa-search', 'find');
</script>

<div style="display: flex; flex-direction: column; width: 100%">
    <form action="?page=Recherche" method="post">
        <label for="searchBox">Recherche</label>
        <input id="searchBox" name="search" type="text">
    </form>

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
            </tr>
            <?php
        }
        ?>
        </tbody>
    </table>
</div>