<div class="container">
        <!-- Outer Row -->
        <div class="row justify-content-center">
            <div class="col-xl-10 col-lg-12 col-md-9">
                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                             <div class="col-lg-6 d-none d-lg-block bg-login-image">
                                <img src="<?=base_url()?>assets/img/diamond.jpeg" style="width:105%; height:100%" >
                             </div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                       <!--  <h1 class="h4 text-gray-900 mb-4">Selamat Datang</h1> -->
                                        <img src="<?=base_url()?>assets/img/banner.jpg" alt="PGN" style="width:100%; height:100%">
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
                                            <button type="submit" class="btn btn-success btn-user btn-block" style="color:black;">Login</button>
                                    </form>
                                    <hr>
                                    <div class="text-center">
                                        <a class="small" href="<?=base_url('auth/registration');?>">Create an Account!</a>
                                        <hr>
                                        <strong style="color:black;">Copyright &copy;2023 | Diamond Group</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>