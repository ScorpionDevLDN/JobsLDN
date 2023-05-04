@php $menu = 'myJobs';@endphp
@extends('frontend.app.parts.layout')
@section('content')
    <!-- Start Horizontal bar -->
    @include('frontend.app.parts.job_seeker_horizental')
    <!-- Start Profile Content -->
    <section class="profile-content created-jobs-content" id="created-jobs-content">
        <div class="container">
            <div class="d-flex justify-content-between align-items-center">
                <div class="section-heading mb-0">
                    <h1>Jobs</h1>
                </div>
                <div>
                    <a href="{{route('company-post-job.index')}}" class="button">Post a job</a>
                </div>
            </div>
            @include('frontend.partial.flash')

            <div class="row mt-5">
                <div class="col-12 col-xxl-3">
                    <div class="account-col mb-5 mb-xxl-0">
                        <h3>{{$posts->total()}} Jobs Created</h3>
                        <p>The number of jobs you have created.</p>
                    </div>
                </div>
                <div class="col-12 col-xxl-9">
                    <div class="row jobs-boxes">
                        @if($posts->count() > 0)
                            @foreach($posts as $post)
                                <div class="col-12">
                                    <!-- Start Job Box -->
                                    <div class="job-box wow animate animate__fadeInDown animation-delay-{{$post->id}}">
                                        <div class="job-info">
                                            <a href="{{route('job_details',[$post->id,\Str::slug($post->title)])}}">
                                                <h3 class="position">{{$post->title}}
                                                    <span> ({{$post->views_count}} views)</span></h3>
                                            </a>
                                            <div class="icons">
                                                <div class="icon-box">
                                                    <div class="icon location">
                                                        <img src="{{asset('frontend/images/icons/ic-contact-map-pin.svg')}}"
                                                             alt="Location">
                                                    </div>
                                                    <span class="content">{{$post->city->name}}</span>
                                                </div>
                                                <div class="icon-box">
                                                    <div class="icon salary">
                                                        <img src="{{asset('frontend/images/icons/ic-shopping-wallet.svg')}}"
                                                             alt="Salary">
                                                    </div>
                                                    <span class="content">{{$post->currency->symbol}}{{$post->salary}} / <span>{{$post->per->per}}</span></span>
                                                </div>
                                                <div class="icon-box">
                                                    <div class="icon time">
                                                        <img src="{{asset('frontend/images/icons/ic-furniture-light.svg')}}"
                                                             alt="Time">
                                                    </div>
                                                    <span class="content">{{$post->type->name}}</span>
                                                </div>
                                                <div class="icon-box">
                                                    <div class="icon published-time">
                                                        <img src="{{asset('frontend/images/icons/time.svg')}}"
                                                             alt="Time">
                                                    </div>
                                                    <span class="content">{{$post->created_at->diffForHumans()}}</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="job-actions">
                                            <!-- <div class="button applications-sent">30 Applications Sent</div> -->
                                            <div class="open">

                                                <a href="{{route('job_details',[$post->id,\Str::slug($post->title)])}}"
                                                   class="button d-flex gap-1">open
                                                    <img src="{{asset('frontend/images/icons/arrow-right.svg')}}"
                                                         alt="">
                                                </a>
                                            </div>
                                            <a href="{{route('company-jobs.edit',$post->id)}}" class="edit-box">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="19.919" height="21.863"
                                                     viewBox="0 0 19.919 21.863">
                                                    <g id="Group_351" data-name="Group 351"
                                                       transform="translate(-4528.297 -4541.127)">
                                                        <path id="Path_15" data-name="Path 15"
                                                              d="M22.714,13.115v6.812a2.39,2.39,0,0,1-2.39,2.39H8.11a2.39,2.39,0,0,1-2.39-2.39V4.39A2.39,2.39,0,0,1,8.11,2h7.051"
                                                              transform="translate(4523.327 4539.923)" fill="none"
                                                              stroke="#2132f5" stroke-linecap="round"
                                                              stroke-linejoin="bevel"
                                                              stroke-width="1.5"/>
                                                        <path id="Path_17" data-name="Path 17"
                                                              d="M19.3,2.25a1,1,0,0,0-1.42,0l-6,6h0l-.1,3a.21.21,0,0,0,.23.22l3-.1h0l6-6A1,1,0,0,0,21,4Z"
                                                              transform="translate(4526.102 4539.923)" fill="none"
                                                              stroke="#2132f5" stroke-linecap="round"
                                                              stroke-linejoin="round"
                                                              stroke-width="1.5"/>
                                                    </g>
                                                </svg>
                                            </a>
                                            <a href="#" class="delete-box" data-bs-toggle="modal"
                                               data-bs-target="#delete-box{{$post->id}}">
                                                <svg id="ic-actions-trash" xmlns="http://www.w3.org/2000/svg" width="24"
                                                     height="24" viewBox="0 0 24 24">
                                                    <g id="ic-actions-trash-2" data-name="ic-actions-trash"
                                                       transform="translate(3 1.81)">
                                                        <line id="Line_53" data-name="Line 53" x1="6" y1="6"
                                                              transform="translate(6 9.39)" fill="none" stroke="#e0302e"
                                                              stroke-linecap="round" stroke-linejoin="bevel"
                                                              stroke-width="1.5"/>
                                                        <line id="Line_54" data-name="Line 54" x1="6" y2="6"
                                                              transform="translate(6 9.39)" fill="none" stroke="#e0302e"
                                                              stroke-linecap="round" stroke-linejoin="bevel"
                                                              stroke-width="1.5"/>
                                                        <rect id="Rectangle_15" data-name="Rectangle 15" width="18"
                                                              height="4"
                                                              rx="1" fill="none" stroke="#e0302e" stroke-linecap="round"
                                                              stroke-linejoin="bevel" stroke-width="1.5"/>
                                                        <path id="Path_41" data-name="Path 41"
                                                              d="M19,5.81V20.19a2,2,0,0,1-2,2H7a2,2,0,0,1-2-2V5.81"
                                                              transform="translate(-3 -1.81)" fill="none"
                                                              stroke="#e0302e"
                                                              stroke-linecap="round" stroke-linejoin="bevel"
                                                              stroke-width="1.5"
                                                              fill-rule="evenodd"/>
                                                    </g>
                                                </svg>
                                            </a>
                                        </div>
                                    </div>
                                    <!-- End Job Box -->
                                </div>

                            @endforeach
                        @endif
                    </div>
                    <!-- Start Jobs Pagination -->
                    {{ $posts->links('vendor.pagination.custom') }}
                    <!-- End Jobs Pagination -->
                </div>

            </div>
        </div>
    </section>

    @foreach($posts as $post)
        <div class="modal fade" id="delete-box{{$post->id}}" tabindex="-1" aria-labelledby="deleteLabel"
             aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h6 class="modal-title" id="deleteLabel">Delete {{$post->title}}</h6>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                            <ion-icon name="close-outline"></ion-icon>
                        </button>
                    </div>
                    <form action="{{route('company-jobs.destroy',$post->id)}}" method="post">
                        @csrf
                        @method('delete')
                        <div class="modal-body">
                            <h5 class="text-center"> Are you sure you want to delete this?</h5>
                        </div>
                        <div class="modal-footer">
                            <button class="button mx-auto" type="submit">Yes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endforeach
@endsection
