<nav>
   <div class="main-menu">
       <ul>
           <li class="{{ Request::path() ==  '/' ? 'active' : ''  }}"><a href="{{ route('users') }}">Покупатели</a></li>
           <li class="{{ Request::path() ==  'applications' ? 'active' : ''  }}"><a href="{{ route('applications') }}">Заявки</a></li>
           <li><a href="">пункт меню</a></li>
           <li><a href="">пункт меню</a></li>
       </ul>
   </div>
</nav>