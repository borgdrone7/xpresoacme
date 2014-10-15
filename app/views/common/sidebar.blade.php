<!-- BEGIN SIDEBAR -->
<div class="page-sidebar-wrapper">
<!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
<!-- DOC: Change data-auto-speed="200" to adjust the sub menu slide up/down speed -->
<div class="page-sidebar navbar-collapse collapse">
<!-- BEGIN SIDEBAR MENU -->
<ul class="page-sidebar-menu" data-auto-scroll="true" data-slide-speed="200">
    @foreach ($menu as $m)
        <li class="">
            <a href="{{ $m->url }}">
                <i class="{{ $m->icon }}"></i>
                <span class="title">{{ $m->title }}</span>
                @if ($m->isSub())
                    <span class="arrow "></span>
                @endif
            </a>
            @if ($m->isSub())
                <ul class="sub-menu">
                    @foreach ($m->submenus as $sm)
                    <li>
                        <a href="{{ $sm->url }}">
                            {{ $sm->title }}
                        </a>
                    </li>
                    @endforeach
                </ul>
            @endif
        </li>
    @endforeach
</ul>
<!-- END SIDEBAR MENU -->
</div>
</div>
<!-- END SIDEBAR -->