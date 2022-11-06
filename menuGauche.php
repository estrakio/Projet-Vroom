<!--
  <nav class="navbar navbar-expand-lg">

<div class="container-fluid">
    <a class="navbar-brand" href="index.php?content=accueil">
      <img src="../images/maison.png" alt="" height="50"> 
    </a>   
  </div>

  <div class="container-fluid">
    <a class="navbar-brand" href="index.php?content=accueil">
      <img src="../images/connect.png" alt="" height="50"> 
    </a>   
  </div>
-->
</nav>

<nav class="navbar navbar-expand-lg navbar-dark">
  <div class="container">
    <a class="navbar-brand" href="index.php?content=accueil"><img src="../images/maison.png" alt="" height="50"> </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php?content=connexion"><img src="../images/connect.png" alt="" height="50"></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="index.php?content=ticket"><img src="../images/ticket.png" alt="" height="50"></a>
        </li>

        
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Coté Magasin
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="index.php?content=caisse">Nouvelle Commande</a></li>
            <li><a class="dropdown-item" href="index.php?content=gestionUsers">Liste des utilisateurs</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="index.php?content=matricule">Obtenir un matricule</a></li>
          </ul>
        </li>

        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Coté RH
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="#">Ajout de points</a></li>
            <li><a class="dropdown-item" href="index.php?content=majUsers">Mise à jour des utilisateurs</a></li>
            <li><a class="dropdown-item" href="index.php?content=gestionUsers">Liste des utilisateurs</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="index.php?content=matricule">Obtenir un matricule</a></li>
          </ul>
        </li>
      </ul>
      <img src="../images/Vroom.png" class="logo">
    </div>
  </div>
</nav>