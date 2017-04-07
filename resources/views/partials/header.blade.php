            <header class="main-header">
                <div class="container">     
                    <a class="branding" href="{{ url('/') }}">
                        TravelShare
                    </a>   
                    <div class="search-container">
                      <div class="inner-search-container">
                        {!! Form::open(['url' => 'foo/bar']) !!}
                        {!! Form::text('search-box', null, array('placeholder'=>'Zoeken op TravelShare')) !!}
                        {{Form::button('Q', array('type' => 'submit', 'class' => ''))}}
                        {!! Form::close() !!} 
                    </div>
                </div>

                <!-- Right Side Of Navbar -->
                <ul class="primary-nav list-inline">
                    <!-- Authentication Links -->
                    <li><a href="{{ url('/register') }}">Categorie</a></li>
                    <li><a href="{{ url('/login') }}">Aanmelden</a></li>
                </ul>
            </div>
        </header>