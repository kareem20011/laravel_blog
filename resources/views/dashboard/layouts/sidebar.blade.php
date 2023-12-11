<div class="sidebar">
        <nav class="sidebar-nav">
            <ul class="nav">
                <li class="nav-item">
                    <a class="nav-link" href="{{route('dashboard.index')}}"><i class="icon-speedometer"></i> {{__('words.dashboard')}}</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{route('dashboard.setting')}}"><i class="fa fa-cog" aria-hidden="true"></i> {{__('words.settings')}}</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{route('dashboard.users.index')}}"><i class="fa fa-users" aria-hidden="true"></i> {{__('words.users')}}</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{route('dashboard.users.addUser')}}"><i class="fa fa-user-plus" aria-hidden="true"></i>{{__('words.addUsers')}}</a>
                </li>

                <li class="nav-item">
                    <form id="logout_form" method="post" action="{{route('logout')}}" >
                        @csrf
                        <button class="nav-link" href="{{route('logout')}}" type="submit"><i style="margin: 1rem;color: #b0bec5;" class="fa fa-sign-out"></i> {{__('words.logout')}}</button>
                    </form>
                </li>

            </ul>
        </nav>
    </div>
