@extends('layouts.layout')
@section('books')

<style>
    .section-read {
        margin-top: -2cm;
        background-color: antiquewhite;
        
    }
    .section-read .read-content {
        margin:0 20% 0 20%
    }

    .section-read .read-content .content-container h1{
        text-align: center
    }

    .button-74 {
        background-color: #fbeee0;
        border: 2px solid #422800;
        border-radius: 30px;
        box-shadow: #422800 4px 4px 0 0;
        color: #422800;
        cursor: pointer;
        display: inline-block;
        font-weight: 600;
        font-size: 18px;
        padding: 0 18px;
        line-height: 50px;
        text-align: center;
        text-decoration: none;
        user-select: none;
        -webkit-user-select: none;
        touch-action: manipulation;
        }

        .button-74:hover {
        background-color: #fff;
        }

        .button-74:active {
        box-shadow: #422800 2px 2px 0 0;
        transform: translate(2px, 2px);
        }

        @media (min-width: 768px) {
        .button-74 {
            min-width: 120px;
            padding: 0 25px;
        }
        }
</style>


<section class="section-read">
    <div>

    </div>
    @foreach ($chapters as $key => $chapter)
    
    <div class="read-content">
        <div class="content-container" style="color: black">
            <div class="" style="">
                <br>
            </div>
            <h1 style="font-family: serif; margin-top: 1cm">
                {{ $chapter->chapname }}
            </h1>

            <p style="font-family: serif;">
                
                <div class="mt-40" style="text-align: justify;">
                    <p >
                        {!!nl2br($chapter->content);!!}
                    </p>    
                </div>

            </p>

            <div style="width: 100%; height: 3cm; background-color:antiquewhite ">
                @if ($prev)
                <a href="{{ url('book/'.$chapter->IDbook.'/chapter/'.$prev->IDchap) }}" type="button" class="button-74">&laquo; {{ $prev->chapname }}</a>
                @endif

                @if ($next)
                    <a href="{{ url('book/'.$chapter->IDbook.'/chapter/'.$next->IDchap) }}" type="button" class="button-74 float-end">{{ $next->chapname }} &raquo;</a>
                @endif
                <div class="table-content" style="margin-top: 13px; width: 30%">
                    <select class="form-select" aria-label="Default select example" onchange="location = this.value;">
                        <option selected>Table of chapters</option>
                        @foreach ($table_content as $key => $chap)
                            <option value="{{ url('book/'.$chap->IDbook.'/chapter/'.$chap->IDchap) }}">{{ $chap->chapname }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
                
                
            {{-- @if ($chapter->IDchap)
                 @if ($next_id)
                <li class="next"><a href="{{ url('book/'.$chapter->IDbook.'/'.$next_id->slug) }}">Next</a></li>
                @endif
            @endif
            @if ($chapter->IDchap)
                @if ($prev_id)
                <li class="previous"><a href="{{ url('book/'.$chapter->IDbook.'/'.$prev_id->slug) }}">Previous</a></li>
                @endif
            @endif --}}
            
            
        </div>
        
    </div>
        
    
    
    <section style="background-color: #eee; border-top: #422800 solid">
       
        <div class="container my-5 py-5">
          <div class="row d-flex justify-content-center">
              
            <div class="col-md-12 col-lg-10 col-xl-8" style="margin-top: -2cm">
                <h3 style="color: #422800;">Leave a comment below</h3>
              <div class="card">
                @if (Auth::check())
                   {{--  display --}}
                   @foreach ($cmts as $item => $comment)
                       
                            <div class="card-body">
                                <div class="d-flex flex-start align-items-center">
                                    <img src="{{ asset('public/frontend/img/icons8-user-64.png') }}" alt="profile"/>
                                    <div>
                                         <h6 class="fw-bold text-primary mb-1">{{$comment->name}}</h6>
                                        {{-- @foreach ($cmts as $item => $name)
                                        @endforeach --}}
                                    <p class="text-muted small mb-0">
                                        {{ $comment->created_at }}
                                    </p>
                                    </div>
                                </div>
            
                                <p class="mt-3 mb-4 pb-2" style="color: #422800">
                                    {{ $comment->cmt }}
                                </p>
            
                                
                                </div>

                                
                     @endforeach
                     {{ $cmts->links('pagination::bootstrap-5') }}
                    {{-- comment --}}
                            <form action="{{ url('/comment') }}" method="POST">
                                @csrf
                                <input type="hidden" name="IDbook" value="{{ $chapter->IDbook }}" />
                                <div class="card-footer py-3 border-0" style="background-color: #f8f9fa;">
                                <div class="d-flex flex-start w-100">
                                    <img style="height: 60px" src="{{ asset('public/frontend/img/icons8-user-64.png') }}" alt="profile"/>
                                    <div class="form-outline w-100">
                                    <textarea class="form-control" id="textAreaExample" name="cmt" rows="4"
                                        style="background: #fff;"></textarea>
                                        
                                    <label class="form-label" for="textAreaExample"></label>
                                    </div>
                                </div>
                                <div class="float-end mt-2 pt-1">
                                    <input type="submit" class="btn btn-success" value="Add Comment" />
                                    <button type="button" class="btn btn-primary">Cancel</button>
                                </div>
                                </div>
                            </form>
                                
                @else 
                   
                    <div class="card-footer py-3 border-0" style="background-color: #f8f9fa;">
                        
                        <div class="d-flex flex-start w-100">
                            <img style="height: 60px" src="{{ asset('public/frontend/img/icons8-user-64.png') }}" alt="profile"/>
                            <div class="form-outline w-100">
                            <textarea class="form-control" id="textAreaExample" rows="4"
                                style="background: #fff;">Login first</textarea>
                                
                            <label class="form-label" for="textAreaExample">Message</label>
                            </div>
                        </div>
                        <div class="float-end mt-2 pt-1">
                            <button type="button" class="btn btn-primary btn-sm">Post comment</button>
                            <button type="button" class="btn btn-outline-primary btn-sm">Cancel</button>
                        </div>
                        </div>
                @endif
                
              </div>
            </div>
          </div>
        </div>
      </section>
</section>
@endforeach
@endsection

