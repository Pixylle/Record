<!DOCTYPE html>
<html lang="fr">
    <?php include 'header.php'; 
    include 'connexion.php';
include 'DAO.php'; 
?>
<body>



<section class="menu-section">
  <div class="menu-container">
    <!-- Карточка -->
    <?php 
        $toutes = toutes_plats();
        foreach ($toutes as $plat):
            
        ?>
    <div class="custom-card">
      <img src="src/img/<?php echo $plat->image; ?>" alt="<?php echo htmlspecialchars($plat->libelle); ?>" class="custom-card-img">
      <h5 class="custom-card-title"><?php echo htmlspecialchars($plat->libelle); ?></h5>
      <p class="custom-card-description"><?php echo htmlspecialchars($plat->description); ?></p>
      <p class="custom-card-price"><?php echo "$plat->prix €"; ?></p>
      <div class="custom-card-footer">
        <input type="number" min="1" value="1" class="custom-card-quantity">
        <button class="custom-card-btn">
          <i class="fa fa-shopping-cart"></i> Acheter
        </button>
      </div>
    </div>
    <?php endforeach; ?>
    <!-- Повторить карточки -->
  </div>
  
</section>
<div class="col-12 d-flex justify-content-center align-items-center my-2">
  <button class="custom-card-btn"><a href="addplat.php">Ajouter plat</a></button>
</div>
    <?php include 'footer.php'; ?>
</body>
</html>