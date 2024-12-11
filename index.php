<?php
$pageTitle = "Home";
include "view-header.php";
?>
<h1 class="text-center mt-4">Welcome to KPOP Data!</h1>
<p class="text-center">
    This website allows you to explore various K-pop groups and their albums. This site focuses on five popular girl groups, each from different companies. 
    You can browse through group details, albums, view albums by specific groups, and visualize data using charts. Use the navigation bar above to explore!
</p>

<div class="row mt-5">
    <!-- LE SSERAFIM -->
    <div class="col-md-4 text-center">
        <h3>LE SSERAFIM</h3>
        <img src="https://www.billboard.com/wp-content/uploads/2023/04/LE-SSERAFIM-press-credit-SOURCE-MUSIC-2023-billboard-exclusive-1548.jpg?w=1024" class="group-image" alt="LE SSERAFIM">
    </div>

    <!-- aespa -->
    <div class="col-md-4 text-center">
        <h3>aespa</h3>
        <img src="https://www.kiacenter.com/assets/img/Static_TM-ArtistImage_2426x1365_Aespa_2025_National_V2-1be89b680e.jpg" class="group-image" alt="aespa">
    </div>

    <!-- IVE -->
    <div class="col-md-4 text-center">
        <h3>IVE</h3>
        <img src="https://dynamicmedia.livenationinternational.com/r/r/m/dddc9379-ee66-4dcb-b479-56ef4ba15f7e.jpg" class="group-image" alt="IVE">
    </div>
</div>

<div class="row mt-4">
    <!-- (G)I-DLE -->
    <div class="col-md-6 text-center">
        <h3>(G)I-DLE</h3>
        <img src="https://pbs.twimg.com/media/GAPP7tFWYAAcDin?format=jpg&name=4096x4096" class="group-image" alt="(G)I-DLE">
    </div>

    <!-- NMIXX -->
    <div class="col-md-6 text-center">
        <h3>NMIXX</h3>
        <img src="https://mediaproxy.tvtropes.org/width/1200/https://static.tvtropes.org/pmwiki/pub/images/imageedit_1_2679403850.jpg" class="group-image" alt="NMIXX">
    </div>
</div>

<!-- Add inline CSS or a separate stylesheet -->
<style>
    .group-image {
        width: 100%; /* Make images responsive */
        max-width: 300px; /* Ensure consistent width */
        height: auto; /* Maintain aspect ratio */
        object-fit: cover; /* Ensures the image fills the frame without distortion */
        border-radius: 10px; /* Optional: Slightly rounded corners */
    }
</style>

<?php include "view-footer.php"; ?>
