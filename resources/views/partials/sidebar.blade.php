@inject('request', 'Illuminate\Http\Request')
<div class="page-sidebar-wrapper">
    <div class="page-sidebar navbar-collapse collapse">
        <ul class="page-sidebar-menu"
            data-keep-expanded="false"
            data-auto-scroll="true"
            data-slide-speed="200">
            <li class="{{ is_null($request->segment(2)) ? 'active' : '' }}">
                <a href="{{ route('dashboard') }}">
                    <i class="fa fa-dashboard"></i>
                    <span class="title">@lang('quickadmin.dashboard')</span>
                </a>
            </li>
            @if(strtolower(auth()->user()->roles()->first()->title) == 'administrator')
            <li class="{{ $request->segment(2) == 'quick-count' ? 'active' : '' }}">
                <a href="{{ route('quick') }}">
                    <i class="fa fa-history"></i>
                    <span class="title">Quick Count</span>
                </a>
            </li>
            @endif
            @if(strtolower(auth()->user()->roles()->first()->title) == 'pengawas' || strtolower(auth()->user()->roles()->first()->title) == 'administrator')
            <li class="{{ $request->segment(2) == 'calons' ? 'active' : '' }}">
                <a href="{{ route('calons.index') }}">
                    <i class="fa fa-user"></i>
                    <span class="title">Calons</span>
                </a>
            </li>
            @endif
            @if(strtolower(auth()->user()->roles()->first()->title) == 'pengawas' || strtolower(auth()->user()->roles()->first()->title) == 'administrator')
            <li class="{{ $request->segment(2) == 'mhs' ? 'active' : '' }}">
                <a href="{{ route('mhs.index') }}">
                    <i class="fa fa-list-alt"></i>
                    <span class="title">Mahasiswa</span>
                </a>
            </li>
            <li class="{{ $request->segment(2) == 'settings' ? 'active' : '' }}">
                <a href="{{ route('settings.index') }}">
                    <i class="fa fa-gears"></i>
                    <span class="title">Settings</span>
                </a>
            </li>
            @endif
            @if(strtolower(auth()->user()->roles()->first()->title) == 'administrator')
            <li class="">
                <a href="#">
                    <i class="fa fa-users"></i>
                    <span class="title">@lang('quickadmin.user-management.title')</span>
                    <span class="fa arrow"></span>
                </a>
                <ul class="sub-menu">
                
                <li class="{{ $request->segment(2) == 'roles' ? 'active active-sub' : '' }}">
                        <a href="{{ route('roles.index') }}">
                            <i class="fa fa-briefcase"></i>
                            <span class="title">
                                @lang('quickadmin.roles.title')
                            </span>
                        </a>
                    </li>
                <li class="{{ $request->segment(2) == 'users' ? 'active active-sub' : '' }}">
                        <a href="{{ route('users.index') }}">
                            <i class="fa fa-user"></i>
                            <span class="title">
                                @lang('quickadmin.users.title')
                            </span>
                        </a>
                    </li>
                </ul>
            </li>
            @endif
            <li>
                <a href="#logout" onclick="$('#logout').submit();">
                    <i class="fa fa-arrow-left"></i>
                    <span class="title">@lang('quickadmin.logout')</span>
                </a>
            </li>
        </ul>
    </div>
</div>
{!! Form::open(['route' => 'logout', 'style' => 'display:none;', 'id' => 'logout']) !!}
<button type="submit">@lang('quickadmin.logout')</button>
{!! Form::close() !!}