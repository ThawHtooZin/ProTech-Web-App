<?php
  include 'config/connect.php';
  $id = $_GET['id'];
  $stmt = $pdo->prepare("DELETE FROM lessons WHERE id=$id");
  $stmt->execute();

  echo "<script>alert('Data Deleted successfully'); window.location.href='lesson_admin.php';</script>";
?>
