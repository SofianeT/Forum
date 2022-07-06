<?php 
    session_start();
    require('actions/questions/showAllQuestionsAction.php');
?>
<!DOCTYPE html>
<html lang="en">
<?php include 'includes/head.php'; ?>
<body>
<link rel="stylesheet" href="index.css">
    <?php include 'includes/navbar.php'; ?>
    <br><br>

    <div class="container">
    
        <form method="GET">

            <div class="form-group row">

                <div class="col-8">
                    <input type="search" name="search" class="form-control">
                </div>
                <div class="col-4">
                    <button class="btn btn-danger" type="submit">Rechercher</button>
                </div>

            </div>
        </form>

        <br>

        <?php 
            while($question = $getAllQuestions->fetch()){
                ?>
                <div class="card">
                    <div class="card-header">
                        <a href="article.php?id=<?= $question['id']; ?>">
                            <?= $question['titre']; ?>
                        </a>
                    </div>
                    <div class="card-body">
                        <?= $question['description']; ?>
                    </div>
                    <div class="card-footer">
                        Publié par <a href="profile.php?id=<?= $question['id_auteur']; ?>"><?= $question['pseudo_auteur']; ?></a> le <?= $question['date_publication']; ?>
                    </div>
                    <?php 
          if(isset($_SESSION['auth'] ) && $_SESSION['role'] == 'admin'){
            ?>
            <a href="actions/questions/deleteQuestionAction.php?id=<?= $question['id'] ; ?>" style="color:brown; text-decoration:none ; "> Supprimer la question </a>
            <?php
          }
        ?>
                </div>
                
                <br>
                <?php
            }
        ?>

    </div>
    <button id="myBtn"><a href="#top" style="color: white">TOP</a></button>

</body>
</html>