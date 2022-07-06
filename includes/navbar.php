<nav class="navbar navbar-expand-lg navbar-dark bg-danger">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">    <img  class ="w-25 " src="https://www.icone-png.com/png/10/10438.png" class="rounded mx-auto d-block" alt="...">
</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link " href="index.php">Les questions</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="publish-question.php">Publier une question</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="my-questions.php">Mes questions</a>
        </li>
        <?php 
          if(isset($_SESSION['auth']) && $_SESSION['role'] != 'admin'){
            ?>
            <li class="nav-item">
              <a class="nav-link" href="profile.php?id=<?= $_SESSION['id']; ?>">Mon profil</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="actions/users/logoutAction.php">Déconnexion</a>
            </li>
            <?php
          }
        ?>
          <?php 
          if(isset($_SESSION['auth'] ) && $_SESSION['role'] == 'admin'){
            ?>
            <li class="nav-item">
              <a class="nav-link" href="backoffice.php">Back office</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="actions/users/logoutAction.php">Déconnexion</a>
            </li>
            <?php
          }
        ?>
      </ul>
    </div>
  </div>
</nav>