<li class="nav-item">
    <a href="{{ route('posts.index') }}"
       class="nav-link {{ Request::is('posts*') ? 'active' : '' }}">
        <p>Posts</p>
    </a>
</li>
<li class="nav-item">
    <a href="{{ route('categories.index') }}"
       class="nav-link {{ Request::is('categories*') ? 'active' : '' }}">
        <p>Categories</p>
    </a>
</li>
<li class="nav-item">
    <a href="{{ route('tags.index') }}"
       class="nav-link {{ Request::is('tags*') ? 'active' : '' }}">
        <p>Tags</p>
    </a>
</li>


