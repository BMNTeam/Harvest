<div class="top-menu--wrapper">
    <div class="top-menu--background clearfix">
        <div class="sniish-logo--image"></div>
        <div class="sniish-logo--name"><p>Отдел семеноводства</p></div>
        <div class="current-user--top">
            <div class="user-info--section">
                <i class="fa fa-user-circle-o"></i> <p class="text-uppercase">Добро пожаловать</p>
                <a href="#">
                    @if(\Illuminate\Support\Facades\Auth::guest())
                        Гость
                    @else
                    {{ \Illuminate\Support\Facades\Auth::user()->name }}
                    @endif
                </a>
                / <a href="{{ route('logOut') }}">выход</a></div>
        </div>

    </div>
    <div class="sniish-logo--corn-image">

    </div>

</div>