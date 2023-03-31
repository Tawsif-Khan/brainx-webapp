@extends('app')

@section('content')


<style>

    .img-profile img{
        border-radius: 50%;
    position: relative;
    width: 150px;
    height: 150px;
    border: 4px solid #E0E0E0;
    top: 0%;
    right: 0%;
    }
    
    .modal-lg{
        width: 1000px;
    }
    
    .border{
        border-radius: .45rem!important;
    }
    </style>
    <div class="container" style="height: 100%;">

    <div class="content">
        <div class="container-fluid">
    <div class="row">
        <div class="col-md-12">

            <h4 class="mb-5 text-center text-primary">Your profile is pending for review</h4>
            <div class="row m-5">
                <div class="col-md-3 ">
                    <div class="img-profile">
    
                    <img class="avatar-img" src="{{ $user->talent->photo }}" alt="">
                    </div>
                </div>
                <div class="col-md-9">
                    <h2 id="name">{{ $user->name }}</h2>
                    <h3 id="position">{{ $user->talent->standout_job_title }}</h3>
                    <div class="row">
                        <div class="col-md-6 p-2">
                            
                            <i class="material-icons mb-1">business_center</i> <span id="experience">{{ $user->talent->experience }}</span> years in AI
                        </div>
                        <div class="col-md-6 p-2">
                            <i class="material-icons mb-1">payments</i>$<span id="hourly_rate">{{ $user->talent->hourly_rate }}</span>/hour
                        </div>
                        <div class="col-md-6 p-2">
    
                            
                            <i class="material-icons mb-1">schedule</i> <span id="hours_of_week">{{ $user->talent->hours_per_week }}</span> hours/week
                        </div>
                        <div class="col-md-6 p-2">
    
                            <i class="material-icons mb-1">location_on</i> <span id="country">{{ $user->talent->country }}</span>
                        </div>
                    </div>
                </div>
            </div>
    <section>
    
            <div class="row border rounded m-5">
                <div class="col-md-12 p-5">
                    <h4>Bio</h4>
                    <p id="bio" class="p-2">
                        {{ $user->talent->brief_summary }}
                    </p>
                </div>
            </div>
        </section>
    
            <section>
                <div class="row border m-5">
                    <div class="col-md-12 p-5">
                        <h4>Strength points</h4>
                        <div class="col-md-12 p-2">
                                @php
                                    foreach ($user->talent->skill as  $skill) {
                                        $skills[$skill->skill->category->category_name][] = $skill->skill->skill_name;
                                    }
                                    
                                @endphp
                            <ul class="row">
                                @foreach ($skills as $key => $items)
                                <li class="col mt-3">
                                    <h5>{{ $key }}</h5>
                                    <ul id="skill-lists" class="list-inline">
                                        @foreach ($items as $item)
                                        <li class="btn btn-rounded btn-outline-primary list-inline-item">
                                            {{ ($item) }}
                                        </li>
                                        @endforeach
                                    </ul>
                                </li>
                                @endforeach                                
                            </ul>

                        </div>
                    </div>
                    
                </div>
            </section>

            <section>
                <div class="row border m-5">
                    <div class="col-md-12 p-5">
                        <h4>
                            Experience
                        </h4>
                        <div class="ms-3">
                        {{-- @foreach ($data['Experience'] as $item)
                                
                            {{ $item }} <br/>
                        @endforeach --}}
                        </div>
                    </div>
                </div>
            </section>

            <section>
                <div class="row border m-5">
                    <div class="col-md-12 p-5">
                <h4>
                    Education
                </h4>
                <div class="ms-3">

                {{-- @foreach ($data['Education'] as $item)
                    
                    {{ $item }} <br/>
                @endforeach --}}
            </div>

        </div>
                    
    </div>
            </section>
    
        </div>
    </div>

        </div>    
    </div>
    
</div>

    
    
    

@endsection