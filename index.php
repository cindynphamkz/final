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
        <img src="https://www.billboard.com/wp-content/uploads/2023/04/LE-SSERAFIM-press-credit-SOURCE-MUSIC-2023-billboard-exclusive-1548.jpg?w=1024" class="img-fluid rounded" alt="LE SSERAFIM">
    </div>

    <!-- aespa -->
    <div class="col-md-4 text-center">
        <h3>aespa</h3>
        <img src="images/aespa.jpg" class="img-fluid rounded" alt="aespa">
    </div>

    <!-- IVE -->
    <div class="col-md-4 text-center">
        <h3>IVE</h3>
        <img src="images/ive.jpg" class="img-fluid rounded" alt="IVE">
    </div>
</div>

<div class="row mt-4">
    <!-- (G)I-DLE -->
    <div class="col-md-6 text-center">
        <h3>(G)I-DLE</h3>
        <img src="images/gidle.jpg" class="img-fluid rounded" alt="(G)I-DLE">
    </div>

    <!-- NMIXX -->
    <div class="col-md-6 text-center">
        <h3>NMIXX</h3>
        <img src="images/nmixx.jpg" class="img-fluid rounded" alt="NMIXX">
    </div>
</div>
<?php include "view-footer.php"; ?>
