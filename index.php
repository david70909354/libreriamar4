<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Bienvenido usuario</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="estilos3.css">
    <style>
      /* Style the menu buttons */
      .menu {
        display: flex;
        justify-content: center; /* Center the buttons horizontally */
      }

      .menu a {
        margin: 5px;
        text-decoration: none;
        background-color: #3498db;
        color: #fff;
        padding: 10px 20px;
        border-radius: 5px;
      }
    </style>
  </head>
  <body>
    <?php if (!empty($user)): ?>
      <br> Welcome. <?= $user['email']; ?>
      <br>You are Successfully Logged In
      <a href="logout.php">Logout</a>
    <?php else: ?>
      <h1>Registro</h1>
      <div class="menu">
        <a href="login.php">Ingreso</a>
        <a href="signup.php">Registro</a>
        
      </div>
    <?php endif; ?>
  </body>
</html>

