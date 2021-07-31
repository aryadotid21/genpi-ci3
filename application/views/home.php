<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title><?php echo $title ?></title>
    <link href="http://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <style>
        nav>.nav.nav-tabs {
            border: none;
            color: #fff;
            background: #272e38;
            border-radius: 0
        }

        nav>div a.nav-item.nav-link {
            border: none;
            padding: 18px 25px;
            color: #fff;
            background: #272e38;
            border-radius: 0
        }

        .tab-content {
            background: #fdfdfd;
            line-height: 25px;
            border: 1px solid #ddd;
            border-top: 5px solid #88c53f;
            border-bottom: 5px solid #88c53f;
            padding: 30px 25px
        }

        nav>div a.nav-item.nav-link:hover,
        nav>div a.nav-item.nav-link:focus,
        nav>div a.nav-item.nav-link.active {
            border: none;
            background: #88c53f;
            color: #fff;
            border-radius: 0;
            transition: background 0.20s linear
        }

        .logo {
            padding: 2em 0;
            text-align: center
        }

        .text-center {
            text-align: center
        }
    </style>
    <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>

<body>

    <div class="container">
        <div class="row">
            <div class="col">
                <div class="logo">
                    <img src="https://www.genpi.co/assets/icon/favicon.png" alt="GenPI.co" />
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <nav>
                    <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
                        <a class="nav-item nav-link active" id="nav-news-tab" data-toggle="tab" href="#nav-news" role="tab" aria-controls="nav-news" aria-selected="true">Latest News</a>
                        <?php if ($this->session->userdata('email')) : ?>
                        <?php else : ?>
                            <a class="nav-item nav-link" id="nav-register-tab" data-toggle="tab" href="#nav-register" role="tab" aria-controls="nav-register" aria-selected="false">Registers</a>
                        <?php endif; ?>
                        <a class="nav-item nav-link" id="nav-user-tab" data-toggle="tab" href="#nav-user" role="tab" aria-controls="nav-user" aria-selected="false">List User</a>
                        <?php if ($this->session->userdata('email')) : ?>
                            <a class="nav-item nav-link" id="nav-login-tab" data-toggle="tab" href="#nav-login" role="tab" aria-controls="nav-login" aria-selected="false">Profile</a>
                        <?php else : ?>
                            <a class="nav-item nav-link" id="nav-login-tab" data-toggle="tab" href="#nav-login" role="tab" aria-controls="nav-login" aria-selected="false">Login</a>
                        <?php endif; ?>

                    </div>
                </nav>
                <div class="tab-content py-3 px-3 px-sm-0" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="nav-news" role="tabpanel" aria-labelledby="nav-news-tab">
                        <ul class="list-unstyled">
                            <?php foreach ($content->items as $key => $content) : ?>
                                <li class="media">
                                    <img src="<?php echo $content->news_image_full ?>" class="mr-3 rounded" alt="title" style="width:250px">
                                    <div class="media-body">
                                        <h5 class="mt-0 mb-1"><?php echo $content->news_title ?></h5>
                                        <small class="text-muted"><i class="fa fa-calendar-alt" aria-hidden="true"></i> <?php echo tanggal($content->news_publish) ?></small><br>
                                        <?php echo $content->news_teaser ?>
                                    </div>
                                </li>
                            <?php endforeach ?>
                        </ul>
                    </div>
                    <div class="tab-pane fade" id="nav-register" role="tabpanel" aria-labelledby="nav-register-tab">
                        <div class="d-flex justify-content-center align-items-center">
                            <div class="col-sm-6 ofwwwet-3">
                                <?php echo form_open_multipart('Auth/regist'); ?>
                                <form class="form-signin text-center" method="POST" action="<?= base_url(); ?>Auth/regist">
                                    <h1 class="h3 mb-3 font-weight-normal">Register</h1>
                                    <input type="text" class="form-control" placeholder="Nama" required autofocus name="name">
                                    <input type="email" class="form-control" placeholder="Email address" required autofocus name="email">
                                    <input type="password" class="form-control" placeholder="Password" required name="password">
                                    <textarea class="form-control" placeholder="Alamat" required name="alamat"></textarea>
                                    <input type="file" class="form-control" placeholder="foto" name="foto" required><br>
                                    <button class="btn btn-lg btn-primary btn-block" type="submit">Daftar</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="nav-user" role="tabpanel" aria-labelledby="nav-user-tab">
                        <ul class="list-unstyled">
                            <?php foreach ($user as $key => $user) : ?>
                                <li class="media">
                                    <img src="./assets/images/avatar/<?php echo $user->foto ?>" class="mr-3" alt="<?php echo $user->name ?>" style="width:200px">
                                    <?php if ($this->session->userdata('email')) : ?>
                                        <div class="media-body">
                                            <h5 class="mt-0 mb-1">
                                                <?php if (isFollow($this->session->id, $user->id) == 0) : ?>
                                                    <a href="javascript:;" data-toggle="modal" data-target="#" onclick="alert('Maaf! Anda tidak punya akses Untuk melihat profil. Follow dulu!');"><?php echo $user->name ?></a>
                                                <?php else : ?>
                                                    <a href="javascript:;" data-toggle="modal" data-target="#profile" id='details' onclick="getData(<?php echo $user->id ?>);"><?php echo $user->name ?></a>
                                                <?php endif ?>
                                            </h5>
                                            <p><?php echo $user->alamat ?></p>
                                            <?php if ($this->session->id == $user->id) : ?>
                                                <!-- Tidak menampilkan tombol follow / unfollow untuk user yang login -->
                                            <?php else : ?>
                                                <?php if (isFollow($this->session->id, $user->id) == 0) : ?>
                                                    <a class="btn btn-primary" href="follow/follow/<?php echo $user->id ?>">Follow</a>
                                                <?php else : ?>
                                                    <a class="btn btn-secondary" href='follow/unfollow/<?php echo isFollow($this->session->id, $user->id) ?>'>Following</a>
                                                <?php endif ?>
                                            <?php endif  ?>
                                        </div>
                                    <?php else : ?>
                                        <div class="media-body">
                                            <h5 class="mt-0 mb-1">
                                                <a href="javascript:;" data-toggle="modal" data-target="#profile"><?php echo $user->name ?></a>
                                            </h5>
                                            <p><?php echo $user->alamat ?></p>
                                            <a href="javascript:void(0)" onclick="$('#nav-login-tab').click();" class="btn btn-primary">Follow</a>
                                        </div>
                                    <?php endif ?>

                                </li> <br>
                            <?php endforeach ?>
                        </ul>
                    </div>
                    <div class="tab-pane fade" id="nav-login" role="tabpanel" aria-labelledby="nav-login-tab">
                        <div class="d-flex justify-content-center align-items-center">
                            <div class="row">
                                <div class="col-sm-12">
                                    <?php if ($this->session->userdata('email')) : ?>
                                        <p class="text-center">
                                            <!-- comment sudah login -->
                                            <img src="./assets/images/avatar/<?php echo $this->session->userdata('foto') ?>" alt="Avatar" class="avatar" style="width:200px"><br><br>
                                            Anda sudah login sebagai <?php echo $this->session->userdata('name') ?>. <br /> <?php echo $this->session->userdata('alamat') ?> <br> <a href="<?= base_url(); ?>Auth/logout">Logout</a>
                                        </p>
                                    <?php else : ?>
                                        <p class="text-center">
                                            <!-- comment belum login -->
                                            Anda belum login, cek user anda.
                                        </p>
                                        <form class="form-signin text-center" method="POST" action="<?= base_url(); ?>Auth/login">
                                            <h1 class="h3 mb-3 font-weight-normal">Please sign in</h1>
                                            <label for="inputEmail" class="sr-only">Email address</label>
                                            <input type="email" id="inputEmail" class="form-control" placeholder="Email address" required autofocus name="email">
                                            <label for="inputPassword" class="sr-only" name="">Password</label>
                                            <input type="password" id="inputPassword" class="form-control" placeholder="Password" required name="password">
                                            <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
                                        </form>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="profile" class="modal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <?php if ($this->session->userdata('email')) : ?>
                        <div class="media">
                            <img src="#" class="mr-3 foto_view" alt="title" style="width:200px">
                            <div class="media-body">
                                <h5 class="mt-0 mb-1"><a href="javascript:;" data-toggle="modal" data-target="#profile" class="name_view">Nama 3</a></h5>
                                <p class="alamat_view">Alamat 3, sCras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis.ssssssssssssssss</p>
                            </div>
                        </div>
                    <?php else : ?>
                        <div class="media">
                            Maaf anda tidak punya akses, harap follow terlebih dahulu
                        </div>
                    <?php endif ?>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <script>
        function getData(id) {
            var base_url = "<?php echo base_url(); ?>";
            $.ajax({
                method: "GET",
                url: base_url + "home/details/" + id,
                dataType: 'json',
                success: function(response) {
                    var data = (response);
                    $('.name_view').text(data.name);
                    $('.alamat_view').text(data.alamat);
                    $('.foto_view').attr("src", "./assets/images/avatar/" + data.foto);
                    $('modal').modal('show');
                },
            });
        }
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>

</body>

</html>