<div>
    @include('Layout.Elements.style_notify')
    <li class="nav-item dropdown no-arrow mx-1">
        <a class="nav-link dropdown-toggle" href="#" id="dropdownMenuButton" role="button" data-toggle="dropdown"
            aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-bell fa-fw"></i>
            <!-- Counter - Alerts -->
            @livewire('count-notify')
        </a>
        <!-- Dropdown - Alerts -->
        <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
            aria-labelledby="dropdownMenuButton">
            <h6 class="dropdown-header">
                {{ __('message.notify') }}
            </h6>
            @foreach ($data as $notify)
                <a class="dropdown-item d-flex align-items-center" data-size="{{ $notify->status }}"
                    wire:click="updateStatus({{ $notify->id }})" href="{{ route('borrow.index', 2) }}">
                    <div class="mr-3">
                        <div class="icon-circle bg-primary">
                            <i class="fas fa-file-alt text-white"></i>
                        </div>
                    </div>
                    <div >
                        <div class="small text-gray-500">{{ $notify->created_at }}</div>
                        <span class="font-weight-bold">{{ $notify->User->name }}</span>
                        <span class="font">{{ $notify->title }}</span>
                    </div>
                </a>
            @endforeach
            <a class="dropdown-item text-center small text-gray-500" href="{{route('notify.index')}}">{{__('message.all_notify')}}</a>
        </div>
    </li>
</div>
