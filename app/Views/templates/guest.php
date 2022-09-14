<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        .middlecenter {
            padding-left: 12px;
            padding-right: 12px;
            width: fit-content;
            height: fit-content;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            position: fixed;
        }

        .blur {
            position: absolute;
            top: 0px;
            right: 0px;
            bottom: 0px;
            z-index: 9999;
            left: 0px;
            /* background: rgba(175, 178, 180, 0.2); */
        }
    </style>
    <title>Login</title>
</head>

<body>

    <!-- gagal php -->
    <?php if (session()->getFlashdata('gagal')) : ?>

        <div class="gagal blur" style="border-radius: 10px;">
            <div class="middlecenter">
                <div class="d-flex justify-content-between bg-danger px-1" style="border-radius: 10px;width:300px;font-size:small">

                    <div class="toast-body p-2 text-light" style="border-radius: 10px; font-size:small">
                        <?= session()->getFlashdata('gagal'); ?>
                    </div>
                    <div>
                        <button type="button" class="btn btn-sm m-auto btnclose text-light"><i class="fa fa-times-circle"></i></button>

                    </div>
                </div>
            </div>
        </div>
    <?php endif; ?>
    <div class="container" style="margin-top:300px;">
        <div class="row justify-content-md-center">
            <div class="col-md-5">
                <div class="card box">
                    <div class="card-body">
                        <div class="card">
                            <div class="card-body">

                                <div class="text-center mb-3">Halaman Login</div>
                                <form action="<?= base_url('login'); ?>" method="post">
                                    <?= csrf_field() ?>
                                    <div class="input-group input-group-sm mb-3">
                                        <span class="input-group-text" style="width:100px;font-size:small;">Username</span>
                                        <input style="font-size:small;" name="username" type="text" class="form-control" placeholder="Username" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" autofocus>
                                    </div>
                                    <div class="input-group input-group-sm mb-3">
                                        <span class="input-group-text" style="width:100px;font-size:small;">Password</span>
                                        <input style="font-size:small;" name="password" type="password" class="form-control" placeholder="Password" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                                    </div>

                                    <div class="d-grid gap-2 d-flex justify-content-center">
                                        <button type="submit" class="btn btn-info text-light" style="--bs-btn-padding-y: .25rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: .75rem;">
                                            <i class="fa fa-location-arrow"></i> Login
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>

    <script>
        $(".btnclose").click(function() {
            $('.gagal').hide();
        })
    </script>

</body>

</html>