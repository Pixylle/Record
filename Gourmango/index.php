<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gourmango</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style3.css">

</head>
<body>
<?php include 'connexion.php';
include 'DAO.php'; 
session_start();

?>

    <header>
        <div class="overlay">    
        <video playsinline autoplay="autoplay" muted="muted" loop="loop">
          <source src="src/img/Video4.mp4" type="video/mp4">
        </video>
        </div>      
        <div class="">
          <div class="cont d-flex h-100 text-center align-items-center">
            <div class="w-100 text-white">
                <div class="adress d-flex justify-content-between">
                    <div class="">+4733378901  Email: food@restan.com</div>
                    <div>175 10h Street, Office 375 Berlin, De 21562</div>
                </div>
                <nav class="navbar navbar-expand-lg navbar-dark">
                    <div class="container-fluid">
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Переключатель навигации">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                                <li class="nav-item">
                                    <a class="nav-link" aria-current="page" href="#">HOME</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="plats.php">TOUS LES PLATS</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" aria-current="page" href="categories.php">CATéGORIES</a>
                                </li>
                                
                            </ul>
                            
                        </div>
                        <form class="d-flex">
                                <input class="form-control me-2" type="search" placeholder="Recherche" aria-label="Recherche">
                                <button class="btn btn-outline-success " type="submit">
                                    Rechercher</button>
                            </form>
                    </div>
                </nav>
                
                <div id="content">
                <div id="logo" class="d-flex">
                    <img src="src/img/logonoir-removebg-preview.png" alt="Logo">
                </div>
                <div class="promo-text">
                    <h2>Découvrez <span style="color: #50bda5;">Gourmango</span></h2>
                    <p>Savourez des moments délicieux</p> 
                </div>
                <div class="iconplat d-none d-md-block"><img src="src/img/clean_logo_without_text (1).png"></div>
            </div>
            </div>
          </div>
        </div>
    </header>
    
    <section id="section1" data-speed="8" data-type="background" class="Catégorie parallax p-2">
    <div class="">
        <div class="row justify-content-center mb-4 title">
            <div class="col-12 d-flex align-items-center justify-content-center">
                <span class="decorative-element me-2"></span>
                <h3 class="category-title">Catégories</h3>
                 <span class="decorative-element ms-2"></span>
            </div>
        </div>  
        <div class="container justify-content-center mb-3">
            <?php 
            $categories = get_categories(); // Сохраняем результат работы функции
            // Проверяем, что категории не пусты
            if (!empty($categories)) {
            foreach($categories as $category): ?>
        <div class="col-3 cath">
            <a href="categorie.php?id=<?php echo $category->id;?>">
                <!-- Название категории над картинкой -->
                <p class="category-name"><?php echo $category->libelle; ?></p>                
                <!-- Картинка категории -->
                <img src="src/img/<?php echo $category->image; ?>" alt="<?php echo $category->libelle; ?>" class="category-image">
            </a>
        </div>
            <?php endforeach; 
            } else {
                echo "<p>Категории не найдены</p>";
            }
            ?>
    </div>
</section>
    
    <section class="plat-de-jour">
    <div class="justify-content-center mb-4">
        <div class="col-12 d-flex align-items-center justify-content-center pt-3">
            <span class="decorative-element me-2"></span>
            <h3 class="category-title">Plats les plus vendus</h3>
            <span class="decorative-element ms-2"></span>
        </div>
    </div>
    <div>
        <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <?php 
                    $plats_pop = plus_populaire();
                    $i = 1;

                    foreach ($plats_pop as $plat_pop): ?>
                        <div class="carousel-item <?php echo ($i == 1) ? 'active' : ''; ?>">
                            <img src="src/img/<?php echo $plat_pop->image; ?>" class="d-block w-100 carousel-image" alt="<?php echo htmlspecialchars($plat_pop->libelle); ?>">
                            <div class="carousel-caption">
                                <h5><?php echo htmlspecialchars($plat_pop->libelle); ?></h5>
                                <p><?php echo htmlspecialchars($plat_pop->description); ?></p>
                            </div>
                        </div>
                        <?php $i++; ?>
                    <?php endforeach; ?>
            </div>
        </div>
    </div>
</section>


  
    <section id="team-carousel" class="carousel" id="section3" data-speed="2" data-type="background">
        <div class="row justify-content-centecat.libeller mb-4 title">
            <div class="col-12 d-flex align-items-center justify-content-center">
                <span class="decorative-element me-2"></span>
                <h3 class="category-title">Notre Équipe</h3>
                <span class="decorative-element ms-2"></span>
            </div>
        </div>
        <div class="carousel-coverflow-wrapper">
            <div class="carousel-coverflow-item">
                <img src="src/img/e1.jpg" class="team-image" alt="Team Member 1">
            </div>
            <div class="carousel-coverflow-item">
                <img src="src/img/e2.png" class="team-image" alt="Team Member 2">
            </div>
            <div class="carousel-coverflow-item">
                <img src="src/img/e3.jpg" class="team-image" alt="Team Member 3">
            </div>
            <div class="carousel-coverflow-item">
                <img src="src/img/e4.jpg" class="team-image" alt="Team Member 4">
            </div>
            <div class="carousel-coverflow-item">
                <img src="src/img/e5.jpg" class="team-image" alt="Team Member 5">
            </div>
            <div class="carousel-coverflow-item">
                <img src="src/img/e6.jpg" class="team-image" alt="Team Member 6">
            </div>
        </div>
        <button class="carousel-control-prev" type="button">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </section>
  
    

    <?php include 'footer.php'; ?>
</body>
</html>
