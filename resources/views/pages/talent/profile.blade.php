@extends('app')

@section('content')


<style>

    .img-profile img{
        border-radius: 50%;
    position: relative;
    width: 200px;
    height: 200px;
    border: 4px solid #E0E0E0;
    top: 0%;
    right: 0%;
    }
    
    .modal-lg{
        width: 1000px;
    }
    
    </style>
    <div class="container" style="height: 100%;">

    <div class="content">
        <div class="container-fluid">
    <div class="row">
        <div class="col-md-12">

            <h4 class="mb-5 text-center text-primary">Your profile is pending for review</h4>
            <div class="row">
                <div class="col-md-5 text-center">
                    <div class="img-profile">
    
                    <img class="avatar-img" src="https://media.licdn.com/dms/image/D5603AQHaDemYa2QfJw/profile-displayphoto-shrink_100_100/0/1673269388874?e=1684368000&v=beta&t=StBD1GxNI5Y5UpB_NQ1UQoCbywIw0W9K-t1usX80W-s" alt="">
                    </div>
                </div>
                <div class="col-md-7">
                    <h2 id="name">{{ $user->name }}</h2>
                    <h3 id="position">{{ $user->talent->standout_job_title }}</h3>
                    <div class="row">
                        <div class="col-md-6 p-2">
                            
                            <i class="material-icons mb-1">business_center</i> <span id="experience">{{ $user->talent->experience }}</span> years of experience
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
    
            <div class="row">
                <div class="col-md-12 p-5">
                    <h4>Bio</h4>
                    <p id="bio" class="p-2">
                        {{ $user->talent->brief_summary }}
                    </p>
                </div>
            </div>
        </section>
    
            <section>
                <div class="row">
                    <div class="col-md-12 p-5">
                        <h4>Skills</h4>
                        <div class="col-md-12 p-2">
                            <ul id="skill-lists" class="list-inline">
                                @foreach ($user->talent->skill as $skill)
                                    <li class="btn btn-dark list-inline-item">
                                        {{ ($skill->skill->skill_name) }}
                                    </li>
                                @endforeach
                            </ul>
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