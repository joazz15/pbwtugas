<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">  
    <!-- CSS untuk data tables -->
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.7/css/dataTables.dataTables.css">
    <!-- CSS untuk bootsrap icon -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    
    <title>.:Admin Movie - @yield('title'):.</title>
    <style>
        .footer {
            background-color: #007bff; /* Sesuaikan dengan warna header */
            color: white; /* Warna teks putih agar kontras */
            text-align: center;
            padding: 10px 0;
            position: fixed;
            bottom: 0;
            width: 100%;
        }
    </style>
</head>
<body>
    <div class="container-fluid">
        <!--HEADER-->
        <div class="row">
            <div class="col-md-12 bg-primary py-2">
                <div class="dropdown float-right">
                    <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="bi bi-person-circle"></i> User
                    </button>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" href="#">Jochanan Azarya Antono</a>
                        <a class="dropdown-item" href="{{ route('profile.edit') }}"><i class="bi bi-key"></i> Change Password </a>
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit" class="dropdown-item"><i class="bi bi-box-arrow-right"></i> Logout</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!--BODY/KONTEN-->
        <div class="row" style="min-height: calc(100vh - 80px);">
            <div class="col-md-2">
                <!--MENU-->
                <div class="row mt-4">
                    <div class="col-3">
                        <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                            <a class="nav-link {{ (isset($key) && $key == "home") ? "active":"" }}" id="v-pills-home-tab" href="/home">Home</a>
                            <a class="nav-link {{ (isset($key) && $key == "bazooka") ? "active":"" }}" id="v-pills-profile-tab" href="/bazooka">Senjata</a>
                            <a class="nav-link" id="v-pills-messages-tab" href="#">Messages</a>
                            <a class="nav-link" id="v-pills-settings-tab" href="#">Settings</a>
                        </div>
                    </div>
                </div>
            </div>
            <!--ARTIKEL-->
            <div class="col-md-10">
                <div class="card mt-4">
                    <div class="card-header"></div>
                    <div class="card-body">
                        <!-- ANAK-ANAK = HOME,PROFILE,ABOUT -->
                        @yield('artikel')
                    </div>
                </div>
            </div>
        </div>
        
        <!-- FOOTER -->
        <footer class="footer">
            <div class="container">
                <p class="mb-0">Template by Joaz</p>
            </div>
        </footer>
    </div>
    
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/2.0.7/js/dataTables.js"></script>
    <!-- Javascript Datatables -->
    <script>new DataTable('#example');</script>
</body>
</html>
