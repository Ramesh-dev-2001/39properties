<?php
    session_start();
    require_once("common/layout.php");
?>
<link href="<?php echo MASTER_URL?>/css/signin.css" rel="stylesheet">
<body class="text-center">
    
<main class="form-signin">
  <form method="post" action="<?php echo API_URL; ?>/login.php"> 
    <img class="mb-4" src="images/logo-black.png" alt="" width="72" height="57">
    <input type="hidden" name="type" id="type" value="login">
    <?php if(isset($_GET['access']) && $_GET['access'] !==''){ ?>
        <div class="form-group" style="color:red;">Email/Password Incorrect</div>
    <?php } ?>
    <div class="form-floating">
      <input type="email" class="form-control" id="email" name="email" placeholder="name@example.com" value="<?php echo isset($_COOKIE['master_email'])?$_COOKIE['master_email']:'';?>" required>
      <label for="floatingInput">Email address</label>
    </div>
    <div class="form-floating">
      <input type="password" class="form-control" id="email" name="password" placeholder="password" value="<?php echo isset($_COOKIE['master_pass'])?$_COOKIE['master_pass']:'';?>" required>
      <label for="floatingPassword">Password</label>
    </div>

    <div class="checkbox mb-3">
      <label>
        <input type="checkbox" name="remember" value="1" <?php echo isset($_COOKIE['master_email'])?'checked':'';?> > Remember me
      </label>
    </div>
    <button class="w-100 btn btn-lg btn-primary" type="submit">Sign in</button>
  </form>
</main>  
  </body>
</html>
