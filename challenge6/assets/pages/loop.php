<?php
require 'loop.php';

$_GET['sp'] = 'exo3';
if (isset($_GET['sp']) && $_GET['sp'] == 'exo1') { 

  if (isset($_POST['debut']) && isset($_POST['fin'])) {
    if (is_numeric($_POST['debut']) && $_POST['debut'] > 0) {
      if (is_numeric($_POST['fin']) && $_POST['fin'] > $_POST['debut']) {
        $liste = nNombre($_POST['debut'], $_POST['fin']);
      } else {
        $_POST['fin'] = 'Veuillez entrer un nombre valide (positif et supérieur à début)';
      }
    } else {
      $_POST['debut'] = 'Veuillez entrer un nombre valide (positif)';
    }
  }
?>
  <div class="container-fluid">
    <form action="?p=loop&sp=exo1" method="post">
      <div class="form-group">
        <label for="debut">Début :</label>
        <input type="text" class="form-control" id="debut" <?php if (isset($_POST['debut'])) echo 'value="'.$_POST['debut'].'"'; ?>>
      </div>
      <div class="form-group">
        <label for="fin">Fin :</label>
        <input type="text" class="form-control" id="fin" <?php if (isset($_POST['fin'])) echo 'value="'.$_POST['fin'].'"'; ?>>
      </div>
      <button type="submit" class="btn btn-default">Submit</button>
    </form>
  </div>
  <div class="container-fluid reponse">
    <?php if (isset($liste)) echo $liste; ?>
  </div>
<?php } ?>

<?php if (isset($_GET['sp']) && $_GET['sp'] == 'exo2') { 
  if (isset($_POST['tabl'])) {
    $tab = explode(',', $_POST['tabl']);
  }
?>
  <div class="container-fluid">
    <form action="?p=loop&sp=exo2" method="post">
      <div class="form-group">
        <label for="tabl">Liste des valeur (séparé par des virgules) :</label>
        <input type="text" class="form-control" id="tabl" <?php if (isset($_POST['tabl'])) echo 'value="'.$_POST['tabl'].'"'; ?>>
      </div>
      <button type="submit" class="btn btn-default">Submit</button>
    </form>
  </div>
  <div class="container-fluid reponse">
    <?php if (isset($tab)) echo '<span>Le plus grand écart de ce tableau est : '.plusGrandGap($tab); ?>
  </div>
<?php } ?>

<?php if (isset($_GET['sp']) && $_GET['sp'] == 'exo3') { 
  if (isset($_POST['ingame'])) {
    if (isset($_POST['essai'])) $retour = fourchetteWeb($_POST['secret'], $_POST['essai'], $_POST['passe']);
?>
  <div class="container-fluid">
    <form action="?p=loop&sp=exo3" method="post">
      <div class="form-group">
        <label for="essai">Essai <?php echo ($_POST['passe'] + 1); ?> :</label>
        <input type="number" min="1" max="100" class="form-control" id="essai" <?php if (isset($_POST['essai'])) echo 'value="'.$_POST['essai'].'"'; ?>>
      </div>
      <input type="hidden" id="secret" <?php if (isset($_POST['secret'])) echo 'value="'.$_POST['secret'].'"'; ?>>
      <input type="hidden" id="passe" <?php if (isset($_POST['passe'])) echo 'value="'.($_POST['passe'] + 1).'"'; ?>>
      <input type="hidden" id="ingame" value="true">
      <button type="submit" class="btn btn-default">Submit</button>
    </form>
  </div>
<?php } else { ?>
  <div class="container-fluid">
    <form action="?p=loop&sp=exo3" method="post">
      <input type="hidden" id="secret" <?php echo 'value="'.rand(1, 100).'"'; ?>>
      <input type="hidden" id="passe" value="0">
      <input type="hidden" id="ingame" value="true">
      <button type="submit" class="btn btn-default">Commencer</button>
    </form>
  </div>
<?php } ?>
  <div class="container-fluid reponse">
    <?php if (isset($retour)) echo 'Essai 1 : '.$retour; ?>
  </div>
<?php } ?>
