<?php 
  session_start()
?>
<?php
  include_once "include/dbh.inc.php";
  include_once "header.php";
?>
<?php include_once "navbar.php" ?>
<div class="wrapper">
  <div class="intro">
    <h1>This is Introduction</h1>
    <p>
      Lorem ipsum dolor sit amet consectetur adipisicing elit. Ad, explicabo. Eum, optio eveniet cupiditate velit unde,
      debitis voluptatem veniam iste deserunt reprehenderit aspernatur. Fuga perspiciatis voluptate dolore autem labore
      provident.
    </p>
  </div>
  <div class="categories">
    <div class="cat-title">
      <h4>Some Categories</h4>
    </div>
    <div class="cat-body">
      <div>Fun Stuff</div>
      <div>Existing Stuff</div>
      <div>Serious Stuff</div>
      <div>Boring Stuff</div>
    </div>
    <div class="clear"></div>
  </div>
</div>

<?php include_once "footer.php" ?>