<?php
  include 'config/connect.php';
  $id = $_GET['id'];
  $stmt = $pdo->prepare("DELETE FROM blog WHERE id=$id");
  $stmt->execute();

  echo "<script>alert('Data Deleted successfully'); window.location.href='blog_admin.php';</script>";
?>
