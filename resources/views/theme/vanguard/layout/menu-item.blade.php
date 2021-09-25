@php $page = $item->page; @endphp
@if (!empty($page) && $item->is_page_type() && $page->is_published())
    <li @if(url()->current() == $page->get_url() || ($page->id == 1 && url()->current() == env('APP_URL'))) class="current" @endif @if ($item->has_sub_menus()) class="sub-menu" @endif>
        <a href="{{ $page->get_url() }}" @if($page->get_url() == env('APP_URL').'/contact-us')) class="button button-custom button-large nomargin clearfix d-flex align-items-center nav-last-item" @endif>
            <div>
                @if (!empty($page->label))
                    {{ $page->label }} 
                @else
                    {{ $page->name }} 
                @endif
            </div>
        </a>
        @if ($item->has_sub_menus())
            <ul>
                @foreach ($item->sub_pages as $subItem)
                    @include('theme.'.env('THEME_FOLDER').'.layout.menu-item', ['item' => $subItem])
                @endforeach
            </ul>
        @endif
    </li>
@elseif ($item->is_external_type())
    <li>
        <a href="{{ $item->uri }}" target="{{ $item->target }}"><div>{{ $item->label }}</div></a>
        @if ($item->has_sub_menus())
            <ul>
                @foreach ($item->sub_pages as $subItem)
                    @include('theme.'.env('THEME_FOLDER').'.layout.menu-item', ['item' => $subItem])
                @endforeach
            </ul>
        @endif
    </li>
@endif
