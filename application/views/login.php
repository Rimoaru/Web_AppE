<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="https://fonts.googleapis.com/css?family=Ubuntu&display=swap" rel="stylesheet">
    <link rel="shortcut icon" href="<?=base_url()?>assets/images/logo_title.png">
    <link rel="stylesheet" href="<?=base_url()?>assets/plugins/bootstrap/dist/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?=base_url()?>assets/css/login.css">
	<title>AppE Admin</title>
</head>
<body>
<div class="container-fluid bg-login">
        <div class="container">
            <div class="row">
                <div class="col-lg-9 col-md-12 login-card">
                    <div class="row">
                        <div class="col-md-5 detail-part">
							<table style="height:100%">
								<tbody>
									<tr>
										<td><img class="align-middle" src="<?=base_url()?>assets/images/logo.PNG" alt=""></td>
									</tr>
								</tbody>
							</table>
                        </div>
                        <div class="col-md-7 logn-part">
                          <div class="row">
                              <div class="col-lg-10 col-md-12 mx-auto">
                                  <div class="logo-cover text-center">
                                       <h1>Aplikasi Pesantren</h1>
                                   </div>
								   <form class="form-cover" method="post" action="<?php echo base_url('auth/proses_login')?>">
										<br><br>
                                        <?php echo $this->session->flashdata('pesan') ?>
                                         <input placeholder="Masukkan Username" name="username" type="text" class="form-control">
                                         <input placeholder="Masukkan Password" name="password" type="password" class="form-control">
                                         <div class="row form-footer">
                                             <div class="col-md-6 forget-paswd">
											 <span class="text-muted text-sm">Ada masalah?<br><a href="https://api.whatsapp.com/send?phone=6281213956708"> Hubungi Admin</a>.</span>
                                             </div>
                                             <div class="col-md-6 button-div">
                                                 <button class="btn btn-primary">Login</button>
                                             </div>
                                         </div>
								   </form>
                              </div>
                          </div>
                           
                           
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>
	<script src="<?=base_url()?>assets/js/jquery-3.2.1.min.js"></script>
	<script src="<?=base_url()?>assets/js/popper.min.js"></script>
	<script src="<?=base_url()?>assets/js/bootstrap.min.js"></script>
</html>