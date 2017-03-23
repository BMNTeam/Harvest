<nav>
   <div class="main-menu">
   <div class="main-menu">
       <ul>
           <li class="{{ Request::path() ==  '/' ? 'active' : ''  }}"><a href="{{ route('users') }}">Покупатели</a></li>
           <li class="{{ Request::path() ==  'cultures' ? 'active' : ''  }}"><a href="{{ route('cultures') }}">Культуры</a></li>
           <li class="{{ Request::path() ==  'applications' ? 'active' : ''  }}"><a href="{{ route('applications') }}">Склад</a></li>
           <li class="{{ Request::path() ==  'orders' ? 'active' : ''  }}"><a href="{{ route('orders') }}">Заявки</a></li>
       </ul>
   </div>
</nav>