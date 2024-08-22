@if($errors->all())
    @foreach($errors->all() as $message)
                <p class="alert alert-warning alert-dismissible">
                    {{ $message }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </p>
    @endforeach

@elseif(session()->has('message'))
            <p class="alert alert-success alert-dismissible">
                {{ session()->get('message') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </p>
    
@elseif(session()->has('error'))
            <p class="alert alert-danger alert-dismissible">
                {{ session()->get('error') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </p>
   
@endif