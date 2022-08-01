<!--top-Header-menu-->
<div id="user-nav" class="navbar navbar-inverse">
  <ul class="nav">
    <li  class="dropdown" id="profile-messages" >
      <a title="" href="#" data-toggle="dropdown" data-target="#profile-messages" class="dropdown-toggle">
        <i class="icon icon-user"></i>
        <span class="text">{{Auth::user()->name}}</span>
        <b class="caret"></b>
      </a>
      <ul class="dropdown-menu">
        <li>
          <a href="{{ route('auth.user_profile.index') }}">
            <i class="icon-user"></i> My Profile
          </a>
        </li>
        <li class="divider"></li>
        <li class="divider"></li>
        <li>
          <a href="{{ url('/logout') }}"onclick="event.preventDefault();document.getElementById('logout-form').submit();">
            <i class="icon-key"></i> Log Out
          </a>
          <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
              <input type="hidden" name="panel" value="teacher">
          {{ csrf_field() }}
          </form>
        </li>
      </ul>
    </li>
    <li class="">
      <a href="{{ url('/logout') }}"onclick="event.preventDefault();document.getElementById('logout-form').submit();">
            <i class="icon-key"></i> Log Out
          </a>
          <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
          {{ csrf_field() }}
          <input type="hidden" name="panel" value="teacher">
          </form>
    </li>
  </ul>
</div>
<!--close-top-Header-menu-->
