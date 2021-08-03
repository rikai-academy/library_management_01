<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3"> {{__('message.title_logo')}} <sup>2</sup></div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item">
        <a class="nav-link" href="index.html">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>{{__('message.dashboard')}}</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Addons
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapse1" aria-expanded="true"
            aria-controls="collapse1">
            <i class="fas fa-fw fa-folder"></i>
            <span>{{__('message.page')}}</span>
        </a>
        <div id="collapse1" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">{{__('message.page_manager')}}:</h6>
                <a class="collapse-item" href="blank.html">{{__('message.waiting_book')}}</a>
            </div>
        </div>
    </li>

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapse2" aria-expanded="true"
            aria-controls="collapse2">
            <i class="fas fa-fw fa-folder"></i>
            <span>{{__('message.page1')}}</span>
        </a>
        <div id="collapse2" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">{{__('message.page_manager')}}:</h6>
                <a class="collapse-item" href="{{route('user.index')}}">{{__('message.list_user')}}</a>
                <a class="collapse-item" href="{{route('user.create')}}">{{__('message.add_user')}}</a>
            </div>
        </div>
    </li>

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapse3" aria-expanded="true"
            aria-controls="collapse3">
            <i class="fas fa-fw fa-folder"></i>
            <span>{{__('message.page2')}}</span>
        </a>
        <div id="collapse3" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">{{__('message.page_manager')}}:</h6>
                <a class="collapse-item" href="blank.html">{{__('message.list_cate')}}</a>
                <a class="collapse-item" href="blank.html">{{__('message.add_cate')}}</a>
            </div>
        </div>
    </li>

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapse4" aria-expanded="true"
            aria-controls="collapse4">
            <i class="fas fa-fw fa-folder"></i>
            <span>{{__('message.page3')}}</span>
        </a>
        <div id="collapse4" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">{{__('message.page_manager')}}:</h6>
                <a class="collapse-item" href="blank.html">{{__('message.list_book')}}</a>
                <a class="collapse-item" href="blank.html">{{__('message.add_book')}}</a>
            </div>
        </div>
    </li>


    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapse5" aria-expanded="true"
            aria-controls="collapse5">
            <i class="fas fa-fw fa-folder"></i>
            <span>{{__('message.page4')}}</span>
        </a>
        <div id="collapse5" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">{{__('message.page_manager')}}:</h6>
                <a class="collapse-item" href="blank.html">{{__('message.list_book')}}</a>
                <a class="collapse-item" href="blank.html">{{__('message.add_book')}}</a>
            </div>
        </div>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="#" data-toggle="collapse" data-target="#collapse7" aria-expanded="true"
            aria-controls="collapse7">
            <i class="fas fa-fw fa-folder"></i>
            <span>{{__('message.page5')}}</span>
        </a>
        <div id="collapse7" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">{{__('message.page_manager')}}:</h6>
                <a class="collapse-item" href="blank.html">{{__('message.list_publisher')}}</a>
                <a class="collapse-item" href="blank.html">{{__('message.add_publisher')}}</a>
            </div>
        </div>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>