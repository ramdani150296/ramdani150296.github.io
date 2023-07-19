<div class="container">
    <div class="row justify-content-center">
        <div class="col-xl-10 col-lg-12 col-md-9">
            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                            <!-- Nested Row within Card Body -->
                    <div class="row">
                                <div class="col-lg-6 d-none d-lg-block bg-login-image">
                                    <img src="<?=base_url()?>assets/img/register.jpg" style="width:105%; height:100%">
                                </div>
                                    <div class="col-lg-6">
                                        <div class="p-5">
                                            <div class="text-center">
                                                <img src="<?=base_url()?>assets/img/profile_1.jpg" alt="jpg" style="width:50%; height:50%">
                                                <h5><b>HALAMAN REGISTRASI</b></h5>
                                                <hr>
                                            </div>
                                                    <form class="user" method="POST" action="<?=base_url('auth/registration');?>">
                                                            <div class="form-group">
                                                                    <input type="text" class="form-control form-control-user" id="Fullname" placeholder="Fullname" name="fullname">
                                                                    <?=form_error('fullname','<small class="text-danger pl-3">','</small>')?>
                                                            </div>

                                                            <div class="form-group">
                                                                <input type="text" class="form-control form-control-user" id="email" placeholder="Email Address" name="email">
                                                                <?=form_error('email','<small class="text-danger pl-3">','</small>')?>
                                                            </div>

                                                            <div class="form-group row">
                                                                <div class="col-sm-6 mb-3 mb-sm-0">
                                                                    <input type="password" class="form-control form-control-user" id="password" placeholder="Password" name="password">
                                                                    <?=form_error('password','<small class="text-danger pl-3">','</small>')?>
                                                                </div>
                                                                <div class="col-sm-6">
                                                                    <input type="password" class="form-control form-control-user" id="password2" placeholder="Repeat Password" name="password2">
                                                                    <?=form_error('password2','<small class="text-danger pl-3">','</small>')?>
                                                                </div>
                                                            </div>

                                                            <button type="submit" class="btn btn-primary btn-user btn-block">
                                                               <b> Register Account</b>
                                                            </button>
                                                    </form>
                                        <hr>
                                        <div class="text-center">
                                            <a class="small" href="<?=base_url('auth');?>"><b>Already have an account? Login!</b></a>
                                            <hr>
                                            <strong style="color:black;">BDD MANAGEMENT SISTEM<br>Copyright &copy;2023</a>
                                        </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>