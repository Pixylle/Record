<?php 
include 'connexion.php';  

function get_categories() {
    
    global $db;
    
    
    $popcat = $db->prepare('
        SELECT cat.id, cat.libelle, cat.image, SUM(com.quantite) AS total_quantite 
        FROM categorie cat
        LEFT JOIN plat p ON p.id_categorie = cat.id 
        LEFT JOIN commande com ON com.id_plat = p.id
        GROUP BY cat.libelle
        ORDER BY total_quantite DESC
        LIMIT 6;
    ');
    
   
    $popcat->execute();
    
    $categories = $popcat->fetchAll(PDO::FETCH_OBJ); 
    return $categories;
    
}

function get_cat() {
    global $db;
    $requete = $db->prepare("SELECT libelle, id FROM categorie  
    where id=?");
    $requete->execute(array($_GET["id"]));
    $cat = $requete->fetch(PDO::FETCH_OBJ);
    return $cat; 

}

function get_plats($icat) {
    global $db;
    $requete = $db->prepare("SELECT libelle, image, description, prix FROM plat  
    where id_categorie=?");
    $requete->execute([$icat]);
    $plats = $requete->fetch(PDO::FETCH_OBJ);
    return $plats; 

}


?>
