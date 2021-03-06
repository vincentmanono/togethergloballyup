<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('home') }}" class="brand-link">
        <img src="{{ asset('logo.jpeg') }}" alt="Togethergloballyup"
            class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light text-capitalize "> {{ config('app.name') }} </span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ (Str::contains(auth()->user()->avatar,'http') ? auth()->user()->avatar:'/storage/users/' . auth()->user()->avatar ) }}" class="img-circle elevation-2"
                    alt="User Image">
            </div>
            <div class="info">
                <a href="{{ route('profile.show', auth()->user()->email) }}" class="d-block">
                    {{ auth()->user()->name }}</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                <li class="nav-item has-treeview menu-open">
                    <a href="{{ route('home') }}" class="nav-link active">
                        <i class="fa fa-home" aria-hidden="true"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>

                </li>

                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="fa fa-object-group" aria-hidden="true"></i>
                        <p>
                            Chamas
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">

                        @if ( auth()->user()->role == 'super')
                             <li class="nav-item">
                            <a href="{{ route('admin.chama') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>All Chamas</p>
                            </a>
                        </li>
                        @else
                        <li class="nav-item">
                            <a href="{{ route('admin.chama') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Join Chama</p>
                            </a>
                        </li>
                        @endif


                        <li class="nav-item">
                            <a href="{{ route('user.chama.create') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Create new Chama</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('user.chama.subscribed') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>My Subscribed Chama</p>
                            </a>
                        </li>

                    </ul>
                </li>


                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="fa fa-money" aria-hidden="true"></i>
                        <p>
                            Wallet
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('user.wallet') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>View Wallet</p>
                            </a>
                        </li>
                    </ul>
                </li>





                @if(auth()->user()->role == 'super' || auth()->user()->role == 'admin')
                    <li class="nav-item has-treeview">
                        <a href="#" class="nav-link">

                            <i class="fa fa-check" aria-hidden="true"></i>
                            <p>
                                Monitor My Chamas
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('admin.allmychama') }}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>my Chamas</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                @endif





                @if(auth()->user()->role == 'super')
                    <li class="nav-item has-treeview">
                        <a href="#" class="nav-link">
                            <i class="fa fa-users" aria-hidden="true"></i>
                            <p>
                                Administrators
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('admin.chamaAdmins') }}" class="nav-link">
                                    {{-- <i class="far fa-circle nav-icon"></i> --}}
                                    <i class="fa fa-fire-extinguisher" aria-hidden="true"></i>
                                    <p>View chama Admins</p>
                                </a>
                            </li>

                        </ul>
                        <ul class="nav nav-treeview bg-info ">
                            <li class="nav-item">
                                <a href="{{ route('admin.all.super') }}" class="nav-link">

                                    <i class="fa fa-fire" aria-hidden="true"></i>
                                    <p>View Super Admins</p>
                                </a>
                            </li>

                        </ul>
                    </li>

                    <li class="nav-item has-treeview">
                        <a href="#" class="nav-link">
                            <i class="fa fa-users" aria-hidden="true"></i>
                            <p>
                                Users
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('admin.users.index') }}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <i class="fa fa-users" aria-hidden="true"></i>
                                    <p>Users</p>
                                </a>
                            </li>

                        </ul>
                        <ul class="nav nav-treeview ">
                            <li class="nav-item">
                                <a href="{{ route('admin.users.create') }}" class="nav-link">
                                    <i class="fa fa-user-plus" aria-hidden="true"></i>
                                    <p>Add User</p>
                                </a>
                            </li>

                        </ul>
                    </li>

                @endif

                @if(auth()->user()->role == 'super')
                    <li class="nav-item has-treeview">
                        <a href="#" class="nav-link">
                            <i class="fas fa-money-bill    "></i>
                            <p>
                                Payments
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('admin.mpesa.all') }}" class="nav-link">

                                    <p>All Transactions</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('admin.mpesa.completed') }}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Mpesa Completed</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('admin.mpesa.cancelled') }}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Mpesa Cancelled</p>
                                </a>
                            </li>

                        </ul>
                    </li>
                @endif




                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-chart-pie"></i>
                        <p>
                            Subscriptions
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">

                        @if(auth()->user()->role == 'super')
                            <li class="nav-item">

                                <a href="{{ route('admin.all.subscription') }}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>All Subscriptions</p>
                                </a>
                            </li>
                            <li class="nav-item">

                                <a href="{{ route('admin.active.subscription') }}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Active Subscriptions</p>
                                </a>
                            </li>
                        @else

                            <li class="nav-item">
                                <a href="{{ route('user.all.subscription') }}" class="nav-link">

                                    <i class="fas fa-lock-open    "></i>
                                    <p>My Subscriptions</p>
                                </a>
                            </li>

                        @endif






                    </ul>
                </li>


                <li class="nav-header">Extra Staff</li>
                <li class="nav-item">
                    <a href="/testimonies" class="nav-link">
                        <i class="nav-icon far fa-calendar-alt"></i>
                        <p>
                            Testimonials
                            {{-- <span class="badge badge-info right">2</span> --}}
                        </p>
                    </a>
                </li>
                @if(auth()->user()->role == 'super')
                    <li class="nav-item">
                        <a href="{{ route('admin.mysubscriptions') }}" class="nav-link">
                            <i class="fa fa-envelope" aria-hidden="true"></i>
                            <p>
                                For news letters
                            </p>
                        </a>
                    </li>
                @endif



                <li class="nav-item has-treeview disabled ">
                    <a href="#" class="nav-link">
                        <i class="nav-icon far fa-envelope"></i>
                        <p>
                            Mailbox
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('messages.index') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Inbox</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('messages.create') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Compose</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Send</p>
                            </a>
                        </li>
                    </ul>
                </li>

            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
