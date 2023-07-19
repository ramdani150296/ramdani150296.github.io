<div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-10 col-lg-12 col-md-9">
                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                       <!--  <h1 class="h4 text-gray-900 mb-4">Selamat Datang</h1> -->
                                        <img src="<?=base_url()?>assets/img/profile_1.jpg" alt="jpg" style="width:50%; height:50%">
                                        <h5><b>HALAMAN LOGIN</b></h5>
                                        <hr>
                                    </div>
                                    <?= $this->session->flashdata('message');?>
                                    <form class="user" method="POST" action="<?=base_url('auth/index');?>">
                                            <div class="form-group">
                                                <input type="text" class="form-control form-control-user" id="email" aria-describedby="emailHelp" placeholder="Enter Email Address..." name="email">
                                                <?=form_error('email','<small class="text-danger pl-3">','</small>')?>
                                            </div>
                                            <div class="form-group">
                                                <input type="password" class="form-control form-control-user" id="password" placeholder="Password" name="password">
                                                <?=form_error('password','<small class="text-danger pl-3">','</small>')?>
                                            </div>
                                            <div class="form-group">
                                                <div class="custom-control custom-checkbox small">
                                                    <input type="checkbox" class="custom-control-input" id="customCheck">
                                                    <label class="custom-control-label" for="customCheck" style="color:black;">Remember Me</label>
                                                </div>
                                            </div>
                                            <button type="submit" class="btn btn-success btn-user btn-block" style="color:black;"><b>Login</b></button>
                                    </form>
                                    <hr>
                                    <div class="text-center">
                                        <a class="small" href="<?=base_url('auth/registration');?>"><b>Create an Account!</b></a>
                                        <hr>
                                        <strong style="color:black;">BDD MANAGEMENT SISTEM<br>Copyright &copy;2023  </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>