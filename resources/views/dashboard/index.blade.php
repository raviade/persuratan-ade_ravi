@extends('layouts.app')
@section('title', 'Dashboard')
@section('content')
    <div class="container">
        <div class="row">
            <div class="row">
                @if(auth()->user()->role == 'operator')
                    <div class="card bg-wel-purp">
                        <div class="card-body text-center col" >
                            <span style="font-size: 20px;">
                                <link rel="dns-prefetch" href="//fonts.bunny.net">
                                <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
                                <b>Haloo {{Auth::user()->username}}! Silakan tulis suratmu di</b>
                            </span>
                            <br>
                            <a href="{{url('dashboard/surat')}}" class="text-decoration-none">
                                <img src="{{asset('Bersurat_Logo.png')}}" alt="bersurat logo" width="370" class="m-1">
                            </a>
                        </div>
                    </div>
                @endif
                @if(auth()->user()->role == 'admin')
                <div class="card">
                    <div class="card-body text-center col">
                        <span style="font-size: 20px;">
                            <link rel="dns-prefetch" href="//fonts.bunny.net">
                            <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
                            <b>Woi {{Auth::user()->username}} cakep! Ayo semangat kerjanya! </b>
                        </span>
                        <br>
                        <a href="{{url('dashboard/surat')}}" class="text-decoration-none">
                            <img src="{{asset('Bersurat_Logo.png')}}" alt="bersurat logo" width="370" class="m-1">
                        </a>
                    </div>
                </div>
            @endif
            </div>
            @if(auth()->user()->role == 'admin')
                <div class="col-3">
                    <a href="{{url('dashboard/user')}}" class="text-decoration-none">
                        <div class="card bg-c-lilac ">
                            <div class="card-body text-white">
                                <h1 class="text-right"><i class="bi bi-person-fill-gear"></i><span
                                        class="f-right">{{$user}}</span></h1>
                                <h2>User</h2>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-3">
                    <a href="{{url('dashboard/surat/jenis')}}" class="text-decoration-none">
                        <div class="card bg-c-bluesea">
                            <div class="card-body text-white">
                                <h1 class="text-right"><i class="bi bi-envelope-paper-fill"></i><span
                                        class="f-right">{{$jenis_surat}}</span></h1>
                                <h2>Jenis Surat</h2>
                            </div>
                        </div>
                    </a>
                </div>
            @endif
            <div class="col-3">
                <a href="{{url('dashboard/surat')}}" class="text-decoration-none">
                    <div class="card bg-c-bluesky">
                        <div class="card-body text-white">
                            <h1 class="text-right"><i class="bi bi-chat-left-text-fill"></i><span
                                    class="f-right">{{$surat}}</span>
                            </h1>
                            <h2>Surat</h2>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-3">
                <a href="{{url('dashboard/log')}}" class="text-decoration-none">
                    <div class="card bg-c-deeppurple">
                        <div class="card-body text-white">
                            <h1 class="text-right"><i class="bi bi-file-earmark-bar-graph-fill"></i><span class="f-right">{{$log}}</span>
                            </h1>
                            <h2>Log</h2>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    <div class="row">
        <div class="col bg-white">
            <div class="card">
                <div class="card-body">
                    {!! $jsChart->container() !!}
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card">
                <div class="card-body">
                    {!! $suratChart->container() !!}
                </div>
            </div>
        </div>
        
        {{-- <div class="col">
            <div class="card">
                <div class="card-body">
                    {!! $userChart->container() !!}
                </div>
            </div>
        </div> --}}
    </div>
    </div>
@endsection
@section('footer')
    <script src="{{ $suratChart->cdn() }}"></script>

    {{ $suratChart->script() }}
    <script src="{{ $jsChart->cdn() }}"></script>

    {{ $jsChart->script() }}
    
    {{-- <script src="{{ $userChart->cdn() }}"></script>

    {{ $userChart->script() }} --}}

    {{-- <p style="margin: ;">Copyright Ade Ravi Punya @2023</p> --}}
@endsection
