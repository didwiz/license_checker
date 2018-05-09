
<div class="wrapper">
    <div class="sidebar" data-background-color="white" data-active-color="danger">

        <!--
            Tip 1: you can change the color of the sidebar's background using: data-background-color="white | black"
            Tip 2: you can change the color of the active button using the data-active-color="primary | info | success | warning | danger"
        -->

        <div class="sidebar-wrapper">
            <div class="logo">
                <a href="#" class="simple-text">
                  <i class="ti-user"></i> Hi <b style="color:orange">{{ Auth::user()->name }}</b>
                </a>
            </div>

            <ul class="nav">
                <li class="active">
                    <a href="/user/dashboard">
                        <i class="ti-panel"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li>
                    <a href="/license">
                        <i class="ti-id-badge"></i>
                        <p>Licenses</p>
                    </a>
                </li>
                <li>
                    <a href="/settings">
                        <i class="ti-settings"></i>
                        <p>Settings</p>
                    </a>
                </li>

            </ul>
        </div>
    </div>