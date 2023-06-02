<?php
  include 'config/connect.php';
  $id = $_GET['id'];
  $stmt = $pdo->prepare("DELETE FROM users WHERE id=$id");
  $stmt->execute();

  echo "<script>alert('Data Deleted successfully'); window.location.href='user_admin.php';</script>";
?>
