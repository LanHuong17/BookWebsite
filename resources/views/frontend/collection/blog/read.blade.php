@extends('layouts.layout')
@section('books')

<style>
    .section-read {
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
 <!-- content section starts-->
@foreach ($blogs as $item => $blog)
    


 <section class="content-section" style="width: 70%; margin-left: 15%; line-height: 1cm;
    ">
    
    <div class="title">
       <h1>{{ $blog->title }}</h1>
    </div>
    <div class="image-container" style="display:flex;justify-content:center;">
        <img src="{{ url('uploads/blog/'.$blog->image) }}" alt="" srcset="" style="max-width: 80%;">
    </div>

    <div class="doc">
        <div class="mt-40" style="text-align: justify;">
            <p >
                {!!nl2br($blog->content);!!}
            </p>    
        </div>
    </div>
    <div style="width: 100%; height: 3cm; ">
    @if ($prev)
    <a href="{{ url('blog/'.$prev->IDblog) }}" type="button" class="button-74">&laquo; Previous post</a>
    @endif

    @if ($next)
        <a href="{{ url('blog/'.$next->IDblog) }}" type="button" class="button-74 float-end">Next post &raquo;</a>
    @endif
</div>
 </section>
 

@endforeach
 

 <!-- content section ends-->

@endsection