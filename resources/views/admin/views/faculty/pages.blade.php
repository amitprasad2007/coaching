welcome faclty

  <div class="pull-right">
                  <a href="{{route('logout')}}"class="btn btn-default btn-flat" onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">{{ __('Logout') }} </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;"> @csrf</form>
                </div>