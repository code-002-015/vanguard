<ul>
    @php
        $menu = \App\Menu::where('is_active', 1)->first();
    @endphp
    @foreach ($menu->parent_navigation() as $item)
        @include('theme.sysu.layout.menu-item', ['item' => $item])
    @endforeach

    <!-- <li><a href="about.htm"><div>About</div></a></li>
    <li><a href="services.htm"><div>Services</div></a></li>
    <li><a href="careers-list.htm"><div>Careers</div></a></li>
    <li><a href="news-list.htm"><div>News</div></a></li>
    <li><a href="contact.htm"><div>Contact</div></a></li> -->
</ul>
