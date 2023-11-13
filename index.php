 <?php
  include("protect.php")
 ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="assets/css/reset.css">
  <link rel="stylesheet" href="assets/css/main.css">
  <script src="js/script.js" defer></script>
  <title>Movie Finder App</title>
</head>
<body>
  <header class="hero">
    <a href="." class="title">Movie Finder App</a>
    <div class="search-container">
      <input 
        type="text"
        class="search-input"
        placeholder="Search movie..."
      >
      <button class="search-btn">Search</button>
    </div>
    <a class="logout-container" href="logout.php">
      <span class="logout">Log out</span>
      <img 
        class="logout-icon"
        src="assets/images/logout-icon.svg" 
        alt="logout-icon">
    </a>
  </header>
  <table class="main">
    <tr class="cards-container"></tr>
  </table>
  <button class="loadmore-btn"">Load more</button>
</body>
</html>