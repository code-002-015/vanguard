
<ul class="primary-menu-list">
    @php
        $menu = \App\Menu::where('is_active', 1)->first();
    @endphp


    @foreach ($menu->parent_navigation() as $item)
        @include('theme.'.env('THEME_FOLDER').'.layout.menu-item', ['item' => $item])
    @endforeach
</ul>
