<?php require_once 'app/views/templates/headerPublic.php'?>
<main role="main" class="container">
    <div class="page-header" id="banner">
        <div class="row">
            <div class="col-lg-12">
                <h1>Register an account</h1>
                <p>Password should be at least 8 characters long</p>
                <p>Password should include letters, numbers, and symbols</p>
            </div>
        </div>
    </div>

<div class="row">
    <div class="col-sm-auto">
    <form action="/create/verify" method="post" >
    <fieldset>
      <div class="form-group">
        <label for="username">Username</label>
        <input required type="text" class="form-control" name="username">
      </div>
      <div class="form-group">
        <label for="password">Password</label>
        <input required type="password" class="form-control" name="password">
      </div>
        <div class="form-group">
            <label for="password">Confirm Password</label>
            <input required type="password" class="form-control" name="password2">
        </div>
            <br>
        <button type="submit" class="btn btn-primary">Register</button>
    </fieldset>
    </form> 
  </div>
</div>
    <?php require_once 'app/views/templates/footer.php' ?>