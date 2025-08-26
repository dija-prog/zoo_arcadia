<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../Assets/css/crud.css">
    <title>Document</title>
</head>
<body>
    <form id="formService" method="POST" action="/add_service" class=" text-white m-5 py-4">
        <h3 class="text-success text-center fw-bold m-5"> Ajouter des services au tableau</h3>
        <div class="col-md-3 ">
            <label for="service_nom" class="form-label">Nom</label>
        </div>
        <div class="col-md-4">
            <input type="text" name="service_nom" class="form-control">
        </div>
        <div class="col-md-3 mt-4">
            <label for="description" class="form-label">Description</label>
        </div>
        <div class="col-md-9">
            <textarea type="text" name="description" class="form-control"></textarea>
        </div>
        <button name="envoyer" class="btn btn-success mt-4">Envoyer</button>
    </form>
</body>
</html>