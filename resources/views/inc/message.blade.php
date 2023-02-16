@if ($errors->any())
    <div id="defaultAlert" class="alert alert-danger col-lg-12 collapse ">
            <a href="#" class="close" id="alertLinkClose">&times;</a>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@if (session('success'))
    <div id="defaultAlert" class="alert alert-success col-lg-12 collapse">
            <a href="#" class="close" id="alertLinkClose">&times;</a>
            <ul>
                {{ session('success') }}
            </ul>
    </div>
@endif

@if (session('error'))
    <div id="defaultAlert" class="alert alert-danger col-lg-12 collapse">
        <a href="#" class="close" id="alertLinkClose">&times;</a>
            <ul>
                {{ session('error') }}
            </ul>
    </div>
@endif

@if (session('warning'))
    <div id="defaultAlert" class="alert alert-warning col-lg-12 collapse">
        <a href="#" class="close" id="alertLinkClose">&times;</a>
            <ul>
                {{ session('warning') }}
            </ul>
    </div>
@endif

@if (session('special'))
    <div id="specialAlert" class="alert alert-warning col-lg-12 collapse">
        <ul>
            {!! session('special') !!}
        </ul>
    </div>
@endif