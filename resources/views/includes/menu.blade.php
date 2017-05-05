<nav>
   <div class="main-menu">
   <div class="main-menu">
       <ul>
           <li class="{{ Request::path() ==  '/' ? 'active' : ''  }}"><a href="{{ route('users') }}"> <i class="fa fa-id-card-o" aria-hidden="true"></i>   Покупатели</a></li>
           <li class="{{ Request::path() ==  'cultures' ? 'active' : ''  }}"><a href="{{ route('cultures') }}"><i class="fa fa-plus" aria-hidden="true"></i>    Культуры</a></li>
           <li class="{{ Request::path() ==  'applications' ? 'active' : ''  }}"><a href="{{ route('applications') }}"><i class="fa fa-cubes" aria-hidden="true"></i>    Склад</a></li>
           <li class="{{ Request::path() ==  'orders' ? 'active' : ''  }}"><a href="{{ route('orders') }}"><i class="fa fa-handshake-o" aria-hidden="true"></i>    Заявки</a></li>
           <li class="{{ Request::path() ==  'default_farms' ? 'active' : ''  }}"><a href="{{ route('default_farms') }}"><i class="fa fa-bar-chart" aria-hidden="true"></i>    Базовые хоз-ва</a></li>
       </ul>
   </div>
</nav>