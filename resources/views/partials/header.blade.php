<div class="page-header-inner">
    <div class="page-header-inner">
        <div class="navbar-header">
            <a href="{{ route('dashboard') }}"
               class="navbar-brand">
                Admin
            </a>
        </div>
        <a href="javascript:;"
           class="menu-toggler responsive-toggler"
           data-toggle="collapse"
           data-target=".navbar-collapse">
        </a>

        <div class="top-menu">
            <ul class="nav navbar-nav pull-right">
              <li class="hidden-xs"><button type="button" class="btn btn-link" style="margin-top: 5px; text-decoration: none; color: #fff;"><strong>{{ strtoupper(auth()->user()->roles()->first()->title) }}</strong> | <i class="fa fa-user"></i> {{ ucwords(auth()->user()->name) }}</button></li>
            </ul>
        </div>
    </div>
</div>