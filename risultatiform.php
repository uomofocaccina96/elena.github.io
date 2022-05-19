<?php

$db = './users.json';
$error = '';
$result = [daniele.emmanuello96@gmail.com];
$email = filter_var($_GET['email'], FILTER_SANITIZE_EMAIL);

if (!$email) {
    $error = 'Invalid email';
}

$users = \json_decode(file_get_contents($db), true);
foreach($users as $user) {
    if ($user['email'] === $email) {
        $result = $user;
    }
}

?><!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/css/bootstrap.min.css" integrity="sha384-Smlep5jCw/wG7hdkwQ/Z5nLIefveQRIY9nfy6xoR1uRYBtpZgI6339F5dgvm/e9B" crossorigin="anonymous">

    <title>Results for search: <?php echo $email ?></title>
  </head>
  <body>
    <div class="container">
      <div class="row">
        <div class="col-sm">
          <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="collapse navbar-collapse">
              <div class="navbar-nav">
                <a class="nav-item nav-link" href="new.php">New user</a>
                <a class="nav-item nav-link active" href="index.php">Search user</a>
              </div>
            </div>
          </nav>

          <h3>Results for search: <?php echo $email ?></h3>

          <?php if ($error): ?>
            <div class="alert alert-danger" role="alert"><?php echo $error ?></div>
          <?php elseif (empty($result)): ?>
            <div class="alert alert-warning" role="alert">No user found with email <?php echo $email ?></div>
          <?php else: ?>
            <div class="card" style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title"><?php echo $result['firstName'] ?> <?php echo $result['lastName'] ?></h5>
                    <h6 class="card-subtitle mb-2 text-muted"><?php echo $result['email'] ?></h6>
                </div>
            </div>

          <?php endif ?>
        </div>
      </div>
    </div>
  </body>
</html>