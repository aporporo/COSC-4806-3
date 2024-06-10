<?php require_once 'app/views/templates/headerPublic.php'?>
<main role="main" class="container">
    <div class="page-header" id="banner">
        <div class="row">
            <div class="col-lg-12">
                <h1>You are not logged in</h1>
            </div>
        </div>
    </div>

	<section class="vh-50">
		<div class="container py-2 h-100" >
			<div class="row d-flex justify-content-center align-items-center h-100">
				<div class="col-md-8">
					<div style="border-radius: 1rem; background-color: #696969;">
						<div class="card-body p-5 text-center">
							<?php if (isset($_SESSION['failedAuth']) && $_SESSION['failedAuth'] >= 3): ?>
									<div class="alert alert-danger" role="alert">
											<?php echo "Exceeded failed login attempts, please wait 60 seconds"; ?>

									</div>
							<?php endif ?>
							<h1 class="mb-4" style="color: white">Sign in</h1>

							
    
							<form action="/login/verify" method="post" >
							<fieldset>
							<div data-mdb-input-init class="form-outline mb-3">
				
								<input required type="text" class="form-control form-control-lg" name="username" placeholder="Username">
							</div>
							<div data-mdb-input-init class="form-outline mb-3">
				
								<input required type="password" class="form-control form-control-lg" name="password" placeholder="Password">
							</div>
            
		    
							<button type="submit" class="btn btn-primary btn-lg" >Login</button>
								<hr class="my-3">
								
								<p><a href="/create" class="text-white">Register Here</a></p>
						</fieldset>
						</form> 
							
						
					</div>
					
					</div>
				</div>
			</div>
		</div>
	</section>
	
    <?php require_once 'app/views/templates/footer.php' ?>
