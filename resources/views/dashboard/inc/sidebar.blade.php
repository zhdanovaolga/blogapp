<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="{{ route("dashboard.home") }}" class="brand-link">
        <span class="brand-text font-weight-bold px-2">{{ config('app.sitesettings')::first()->site_title }}</span>
    </a>
    <div class="sidebar">
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ asset("uploads/author/".(auth()->user()->profile ?? "default.webp")) }}" class="img-circle elevation-2" alt="{{ auth()->user()->name }}"/>
            </div>
            <div class="info">
                <a target="_blank" href="{{ route("frontend.user", auth()->user()->username) }}" class="d-block">{{ auth()->user()->name }}</a>
            </div>
        </div>
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a href="{{ route("dashboard.home") }}" class="nav-link {{ request()->route()->getName() == "dashboard.home" ? "active" : "" }}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li class="nav-item {{ in_array(request()->route()->getName(), ["dashboard.posts.index", "dashboard.posts.create","dashboard.posts.edit"]) ? "menu-open" : "" }}">
                    <a href="#" class="nav-link {{ in_array(request()->route()->getName(), ["dashboard.posts.index", "dashboard.posts.create", "dashboard.posts.edit"]) ? "active" : "" }}">
                        <i class="nav-icon fas fa-pencil-alt"></i>
                        <p>Posts<i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route("dashboard.posts.index") }}" class="nav-link {{ request()->route()->getName() == "dashboard.posts.index" ? "active" : "" }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>All Posts</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route("dashboard.posts.create") }}" class="nav-link {{ request()->route()->getName() == "dashboard.posts.create" ? "active" : "" }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>New Post</p>
                            </a>
                        </li>
                    </ul>
                </li>
                
                <li class="nav-item {{ in_array(request()->route()->getName(), ["dashboard.comments.index", "dashboard.comments.create","dashboard.comments.edit"]) ? "menu-open" : "" }}">
                    <a href="#" class="nav-link {{ in_array(request()->route()->getName(), ["dashboard.comments.index", "dashboard.comments.create", "dashboard.comments.edit"]) ? "active" : "" }}">
                        <i class="nav-icon fas fa-comment-alt"></i>
                        <p>Comments<i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route("dashboard.comments.index") }}" class="nav-link {{ request()->route()->getName() == "dashboard.comments.index" ? "active" : "" }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>All Comments</p>
                            </a>
                        </li>
                    </ul>
                </li>
                
                <li class="nav-item">
                    <a href="{{ route("dashboard.tags.index") }}" class="nav-link {{ request()->route()->getName() == "dashboard.tags.index" ? "active" : "" }}">
                        <i class="nav-icon fas fa-tags"></i>
                        <p>Tags<i class="right fas fa-angle-left"></i></p>
                    </a>
                </li>
                <li class="nav-item {{ in_array(request()->route()->getName(), ["dashboard.users.index", "dashboard.users.create","dashboard.users.edit"]) ? "menu-open" : "" }}">
                    <a href="#" class="nav-link {{ in_array(request()->route()->getName(), ["dashboard.users.index", "dashboard.users.create", "dashboard.users.edit"]) ? "active" : "" }}">
                        <i class="nav-icon fas fa-user"></i>
                        <p>Users<i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route("dashboard.users.index") }}" class="nav-link {{ request()->route()->getName() == "dashboard.users.index" ? "active" : "" }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>All Users</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route("dashboard.users.create") }}" class="nav-link {{ request()->route()->getName() == "dashboard.users.create" ? "active" : "" }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>New User</p>
                            </a>
                        </li>
                    </ul>
                </li>
                
                <li class="nav-item {{ in_array(request()->route()->getName(), ["dashboard.settings.password", "dashboard.settings.menus.footer", "dashboard.settings.menus.header", "dashboard.settings.site", "dashboard.settings.profile"]) ? "menu-open" : "" }}">
                    <a href="#" class="nav-link {{ in_array(request()->route()->getName(), ["dashboard.settings.password", "dashboard.settings.menus.footer", "dashboard.settings.menus.header", "dashboard.settings.site", "dashboard.settings.profile"]) ? "active" : "" }}">
                        <i class="nav-icon fas fa-cog"></i>
                        <p>Settings<i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route("dashboard.settings.profile") }}" class="nav-link {{ request()->route()->getName() == "dashboard.settings.profile" ? "active" : "" }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Profile</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route("dashboard.settings.password") }}" class="nav-link {{ request()->route()->getName() == "dashboard.settings.password" ? "active" : "" }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Change Password</p>
                            </a>
                        </li>
                        @if (auth()->user()->role == 3)
                        <li class="nav-item">
                            <a href="{{ route("dashboard.settings.site") }}" class="nav-link {{ request()->route()->getName() == "dashboard.settings.site" ? "active" : "" }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Site Settings</p>
                            </a>
                        </li>
                        
                        @endif
                    </ul>
                </li>
                <li class="nav-header"></li>
                <li class="nav-item">
                    <a class="btn nav-link text-left" onclick="document.getElementById('logout').submit()">
                        <form method="POST" id="logout" action="{{ route("auth.logout") }}">
                            @csrf
                            <i class="nav-icon fa fa-sign-out-alt"></i>
                            <p>Log Out</p>
                        </form>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</aside>
