<!DOCTYPE html>
<html lang="fr">
    <?php include 'header.php'; 
    include 'connexion.php';
    include 'DAO.php'; 
    ?>

<body>
<div class="page-container">
    <?php 
       $cat_id = $_GET["id"];
       $cat = get_cat($cat_id);
       $plats = get_plats($cat_id);
    ?>

    <section class="menu-section">
      <div class="menu-container">
        <?php foreach ($plats as $plat): ?>
        <div class="custom-card">
          <form method="POST" action="addcard.php" class="custom-card"> 
            <img src="src/img/<?php echo $plat->image; ?>" alt="<?php echo htmlspecialchars($plat->libelle); ?>" class="custom-card-img">
            <h5 class="custom-card-title"><?php echo htmlspecialchars($plat->libelle); ?></h5>
            <p class="custom-card-description"><?php echo htmlspecialchars($plat->description); ?></p>
            <p class="custom-card-price"><?php echo "$plat->prix €"; ?></p>
            <div class="custom-card-footer">
              <input type="number" min="1" value="1" class="custom-card-quantity">
              <input type="hidden" name="plat_id" value="<?php echo $plat->id; ?>">
              <input type="hidden" name="plat_name" value="<?php echo $plat->libelle; ?>">
              <input type="hidden" name="plat_prix" value="<?php echo $plat->prix; ?>">
              <input type="hidden" name="id_categorie" value="<?php echo $plat->id_categorie; ?>">
              <button  type="submit" name="action" value="buy_now" class="custom-card-btn">
                <i class="fa fa-shopping-cart"></i> Acheter
              </button>
            </div>
          </form>
        </div>
        <?php endforeach; ?>
      </div>
    </section>
    
    <?php include 'footer.php'; ?>
</div>
</body>
</html>
