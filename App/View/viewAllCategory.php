<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Category</title>
</head>
<body>
    <h1>Liste des categories</h1>
    
    <table>
        <thead>
            <th>ID</th>
            <th>NAME</th>
            <th>Supprimer<th>
        </thead>
    <!-- Boucler sur le tableau de Category -->
    <?php foreach($categories as $category): ?>
        <!-- afficher le contenu de l'attribut name (Category) -->
         <tr>
            <td><?= $category->getIdCategory() ?> </td>
            <td><?= $category->getName() ?> </td>
            <!-- version lien avec id en GET-->
            <td><a href="/task_poo/category/delete?id=<?=$category->getIdCategory()?>">Supprimer</a></td>
         </tr>
    <?php endforeach ?>

    </table>
    <p><?= $message ?></p>
</body>
</html>