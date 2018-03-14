


    @if(count($errors)> 0)
        <ul class="list-group">
            @foreach($errors->all() as $error)
                <div class="alert alert-danger">

                    <li class="list-group-item">
                        {{$error}}
                    </li>

                </div>
            @endforeach
        </ul>
    @endif
