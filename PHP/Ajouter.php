<script>
    renderView('Ajouter', 'fas fa-plus', 'add');
</script>

<div id="form">
    <h1>Ajouter</h1>

    <form action="?page=Visualiser" method="post">
        <div>
            <label for="name">Nom du stock</label>
            <input id="name" name="name" type="text" maxlength="50">
        </div>
            <div>
            <label for="price">Prix du stock</label>
            <!-- that validate if the number correspond the number allowed in DB-->
            <input id="price" name="price" type="number" min="0.01" pattern="^[0-9]+([\.,][0-9]{1,2})?$" step="0.01">
        </div>
        <div>
            <label for="categories">Catégorie</label>
            <select name="categories" id="categories">
                <option value="Informatique">Informatique</option>
                <option value="Décoration">Décoration</option>
                <option value="Plomberie" >Plomberie</option>
                <option value="Outils">Outils</option>
                <option value="Extérieur">Extérieur</option>
                <option value="Audiovisuel">Audiovisuels</option>
            </select>
        </div>
        <div>
            <input type="submit" name="query" value="Ajouter">
        </div>
    </form>
</div>