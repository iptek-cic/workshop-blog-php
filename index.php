<?php
require_once 'config.php';
$page = isset($_GET['page']) ? $_GET['page'] : NULL;
?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>INFORMATIC BLOG</title>

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom fonts for this template -->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href='https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>

  <!-- Custom styles for this template -->
  <link href="css/clean-blog.min.css" rel="stylesheet">

</head>

<body>

<?php
  $page = isset($_GET['page']) ? $_GET['page'] : NULL;
  require_once 'navbar.php';       
  if ($page == "logout") {
    include_once 'logout.php';
  } elseif($page == "contact") {
    include_once "contact.php";
  }else {

?>

  <!-- Page Header -->
  <header class="masthead" style="background-image: url('img/home-bg.jpg')">
    <div class="overlay"></div>
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
          <div class="site-heading">
            <h1>INFORMATICS</h1>
            <span class="subheading">Build Simple Blog With PHP NATIVE</span>
          </div>
        </div>
      </div>
    </div>
  </header>

  <!-- Main Content -->
  <div class="container" id="content">
    <div class="row">
      <div class="col-lg-8 col-md-10 mx-auto">
      <?php
        $halperpage = 2;
        $page = isset($_GET["halaman"]) ? (int)$_GET["halaman"] : 1;
        $mulai = ($page>1) ? ($page * $halperpage) - $halperpage : 0;
        $result = mysqli_query($link,"SELECT * FROM posts");
        $total = mysqli_num_rows($result);
        $pages = ceil($total/$halperpage);            
        $no = $mulai+1;
        $sql = "SELECT posts.slug, posts.content ,posts.title, users.name, DATE_FORMAT(posts.date,'%M %d, %Y') AS post_date FROM posts LEFT JOIN users ON posts.user_id = users.id  ORDER BY DATE ASC LIMIT $mulai, $halperpage";
        $query = mysqli_query($link, $sql);
        $cek = mysqli_num_rows($query);
          if($cek > 0) {
              while ($post = mysqli_fetch_object($query)) {
      ?>
        <div class="post-preview">
          <a href="post.php?page=<?= $post->slug ?>">
            <h2 class="post-title">
              <?= $post->title; ?>
            </h2>
            <h5 class="post-subtitle">
              <?php echo substr($post->content,0,40);?>&rarr;
            </h5>
          </a>
          <p class="post-meta">Posted by
            <a href="#"><?= ucwords($post->name); ?></a>
            on <?= $post->post_date; ?></p>
        </div>
      <?php
              } // END OF WHILE
          } // END OF IF
      ?>
        <hr>
        <!-- Pager -->
        <div class="clearfix">
        <?php for ($i=1; $i<=$pages ; $i++){ ?>
        <a class="btn btn-info btn-md " href="?halaman=<?php echo $i; ?>"><?php echo $i; ?></a>
        <?php } ?>
        </div>
      </div>
    </div>
  </div>

  <hr>
  <?php
    } // END OF IF MENU
    require_once 'footer.php';
  ?>

  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Custom scripts for this template -->
  <script src="js/clean-blog.min.js"></script>

</body>

</html>
