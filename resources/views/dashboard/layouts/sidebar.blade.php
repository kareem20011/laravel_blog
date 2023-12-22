<div class="sidebar">
        <nav class="sidebar-nav">
            <ul class="nav">
                <li class="nav-item">
                    <a class="nav-link" href="{{route('index')}}"><i class="icon-speedometer"></i> {{__('words.website')}}</a>
                </li>


                @can('viewAny', App\Models\User::class)
                <!-- users button -->
                <li class="nav-item nav-dropdown">
                    <a class="nav-link nav-dropdown-toggle" href="#"><i class="icon-puzzle"></i> {{__('words.users')}}</a>
                    <ul class="nav-dropdown-items">
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('dashboard.users.index')}}"><i class="fa fa-users" aria-hidden="true"></i> {{__('words.users')}}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('dashboard.users.addUser')}}"><i class="fa fa-user-plus" aria-hidden="true"></i>{{__('words.addUsers')}}</a>
                        </li>
                    </ul>
                </li>
                @endcan

                <!-- category button -->
                <li class="nav-item nav-dropdown">
                    <a class="nav-link nav-dropdown-toggle" href="#"><i class="icon-puzzle"></i> {{__('words.category')}}</a>
                    <ul class="nav-dropdown-items">
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('dashboard.category.index')}}"><i class="fa fa-table"></i>{{__('words.category')}}</a>
                        </li>
                        @can('view', $settings)
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('dashboard.category.create')}}"><i class="fa fa-plus"></i>{{__('words.addCategory')}}</a>
                        </li>
                        @endcan
                    </ul>
                </li>


                <!-- post button -->
                <li class="nav-item nav-dropdown">
                    <a class="nav-link nav-dropdown-toggle" href="#"><i class="icon-puzzle"></i> {{__('words.posts')}}</a>
                    <ul class="nav-dropdown-items">
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('dashboard.posts.index')}}"><i class="fa fa-signs-post"></i></i>{{__('words.posts')}}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('dashboard.posts.create')}}"><i class="fa fa-plus"></i>{{__('words.addPost')}}</a>
                        </li>
                    </ul>
                </li>


                @can('view', $settings)
                <!-- settings button -->
                <li class="nav-item">
                    <a class="nav-link" href="{{route('dashboard.setting')}}"><i class="fa fa-cog" aria-hidden="true"></i> {{__('words.settings')}}</a>
                </li>
                @endcan


                <!-- profile button -->
                <li class="nav-item nav-dropdown">
                    <a class="nav-link" href="{{route('dashboard.users.edit', auth()->user()->id)}}"><i class="fas fa-edit"></i> {{__('words.profile')}}</a>
                </li>


                <!-- languages -->
                <li class="nav-item nav-dropdown">
                    <a class="nav-link nav-dropdown-toggle" href="#"><i class="fa-solid fa-language"></i> {{LaravelLocalization::getCurrentLocaleNative()}}</a>
                    <ul class="nav-dropdown-items">
                        @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                        <li class="nav-item">
                            <a style="font-size: 14px" class="nav-link" hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                                <i class="fa-solid fa-earth-americas"></i>{{ $properties['native'] }}
                            </a>
                        </li>
                        @endforeach
                    </ul>
                </li>




                <!-- logout button -->

                <li class="nav-item">
                    <form id="logout_form" method="post" action="{{route('logout')}}" >
                        @csrf
                        <button class="nav-link" href="{{route('logout')}}" type="submit"><i style="margin: 1rem;color: #b0bec5;" class="fa fa-sign-out"></i> {{__('words.logout')}}</button>
                    </form>
                </li>

            </ul>
        </nav>
    </div>
