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
  <link href="<?= __BASEURL__; ?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href='https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>

  <!-- Custom styles for this template -->
  <link href="css/clean-blog.min.css" rel="stylesheet">

</head>

<body>

<?php
  require_once 'navbar.php';          
  if ($page == "logout") {
    include_once 'logout.php';
    }else {
?>
<?php
  $sql = "SELECT posts.id AS 'idpost',users.id AS 'iduser',posts.image, posts.slug, posts.content,posts.title, users.name, DATE_FORMAT(posts.date,'%M %d, %Y') AS post_date FROM posts LEFT JOIN users ON posts.user_id = users.id WHERE posts.slug = '$page' LIMIT 1";
  $query = mysqli_query($link, $sql);
  $post = mysqli_fetch_object($query)
?>
  <!-- Page Header -->
  <header class="masthead" style="background-image: url('uploads/posts/<?= $post->image ?>')">
    <div class="overlay"></div>
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
          <div class="post-heading">
          <h2><?= $post->title; ?><h2>
            <span class="meta">Posted by
              <a href="#"><?= $post->name ?></a>
              on <?= $post->post_date ?></span>
          </div>
        </div>
      </div>
    </div>
  </header>
   <!-- Post Content -->
   <article>
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
          <?= $post->content;?>
        </div>
      </div>
    </div>
  </article>
  <hr>
  <div class="container">
    <div class="row">
      <div class="col-lg-8 col-md-10 mx-auto">
        <b>Comments Section</b><hr>
        <?php
          $sql2 = "SELECT users.username,comments.text,users.picture FROM comments LEFT JOIN users ON comments.user_id = users.id LEFT JOIN posts ON comments.post_id = posts.id WHERE posts.slug = '$page'";
          $query2 = mysqli_query($link, $sql2);

          $cek2 = mysqli_num_rows($query2);
            if($cek2 > 0) {
                while ($comment = mysqli_fetch_object($query2)) {
        ?>
        <div class="post-preview"> 
            <h5>
            <img src="uploads/<?= $comment->picture ?>" width = 90px height= 90px>
              <a href="#"><?= $comment->username ?></a>
            </h5>
            <hr>
            <p>
              <?= $comment->text ?>
            </p>
            <hr>&nbsp;
        </div>
        <?php
                }
        ?>
        <form action="" method="POST">
        <div class="form-group">
          <label for="comment">Comment:</label>
          <textarea class="form-control" rows="5" id="comment" name="comment" required></textarea>
        </div>
        <div class="clearfix">
          <button type="submit" name="send" class="btn btn-primary float-right">Send &rarr;</button>
        </div>
        </form>
        <?php
              }else{
        ?>
        <form action="" method="POST">
        <div class="form-group">
          <label for="comment">Comment:</label>
          <textarea class="form-control" rows="5" id="comment" name="comment" required></textarea>
        </div>
        <div class="clearfix">
          <button type="submit" name="send" class="btn btn-primary float-right">Send &rarr;</button>
        </div>
        </form>
              <?php 
              } 

              if (isset($_POST['send'])) {
                
                $idpost = $post->idpost;
                $iduser = $_SESSION['user']['id'];
                $comment = $_POST['comment'];
                $sql3 = "INSERT INTO comments VALUES ('','$idpost','$iduser','$comment')";
                $query3 = mysqli_query($link, $sql3);
                if ($query3) {
                    echo "<script>
                        alert('Tambah Komentar baru berhasil');
                        window.location= '?page=$page';
                    </script>";
                } else {
                    echo "<script>
                        alert('Tambah Komentar baru gagal');
                    </script>";
                }
              }
              ?>
        </div>
    </div>
  </div>
  <?php
  }
    require_once 'footer.php';
  ?>

  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Custom scripts for this template -->
  <script src="js/clean-blog.min.js"></script>

</body>

</html>
