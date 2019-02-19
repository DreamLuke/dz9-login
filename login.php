<?php
// var_dump($_POST); // проверка
require './Session.php';
require './Cookie.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if(isset($_POST['login']) && isset($_POST['password']) && ($_POST['login'] === 'admin') && ($_POST['password'] === 'admin')) {
        $user = [ //создание пользователя
            'id'=> 1,
            'login' => 'admin',
            'email' => 'darklord@admins.ru'
        ];

        $session = new session(); 
        $session->set('user', $user);

        if(isset($_POST['cb_remember_me'])) {
            $hash = md5(md5($user['id'] . time() . random_int(0, 100000)));
            $cookie = new cookie;
            $cookie->set('token_access', $hash);
        }
    	// header('Location: ./secret.php');
    	//echo 'hash = ' . $hash .'<br>';
    	echo 'SUCCESS';
	}
}
?>
<link rel="stylesheet" href="auth.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="https://code.jquery.com/jquery-3.3.1.js"></script>


<div class="container">
    <div class="row">
        <div class="col-md-offset-3 col-md-6">

            <div class="tab" role="tabpanel">
                <ul class="nav nav-tabs" role="tablist">
                    <li role="presentation" class="active"><a href="#Section" aria-controls="home" role="tab" data-toggle="tab">sign in</a></li>
                    <li><a href="./logout.php">Выйти</a></li>
                </ul>

                 <ul class="nav nav-tabs" role="tablist">
                    <li><a href="./secret.php">Secret content</a></li>
                    <li><a href="./secret2.php">Other secret content</a></li>
                </ul>
                
                <!-- Tab panes -->
                <div class="tab-content tabs">
                    <div role="tabpanel" class="tab-pane fade in active" id="Section">
                        <form class="form-horizontal" id = 'form-horizontal-one' method="post">
                            <div class="form-group">
                                <label for="login">login</label>
                                <input type="text" class="form-control" id="login" name = 'login'>
                            </div>

                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" class="form-control" id="password" name = 'password'>
                            </div>
                            <div class="form-group">
                                <div class="main-checkbox">
                                    <input value="None" id="cb_remember_me" type="checkbox" name = 'cb_remember_me'>
                                    <label for="cb_remember_me" name = 'remember_me'>Remember me</label>
                                </div>
                                <!-- <span class="text">Remember me</span> -->
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-default">Sign in</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div><!-- /.col-md-offset-3 col-md-6 -->
    </div><!-- /.row -->
</div><!-- /.container -->
<!-- <script>
    $(function(){
        $('#form-horizontal-one').submit(function(e){
            var form = $(this);

            $.ajax({
                url: '/lesson7/auth.php',
                type: 'POST',
             
                data: form.serialize(),
                dataType: 'json',
                success: function(data){ //data получила данные от сервера
                    console.log(data);
                    alert(data);
                }
            });
            e.preventDefault();//оставить данные после обновления
        });
    });
</script> -->