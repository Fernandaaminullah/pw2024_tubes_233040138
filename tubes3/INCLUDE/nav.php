<?php 
require_once 'konfig.php';
define('BASE_URL', 'http://localhost/tubes3/');
if (!isset($_SESSION['username_user'])) {

}
?>

<nav class="navbar navbar-expand-lg fixed-top" data-bs-theme="dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="<?php echo BASE_URL; ?>index.php#home">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo BASE_URL; ?>index.php#about">about</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo BASE_URL; ?>index.php#category">Cattegory</a>
        </li>
      </ul>
      <a class="btn btn-dark  " href="<?php echo BASE_URL; ?>login.php">Logout</a>
    </div>
  </div>
</nav>