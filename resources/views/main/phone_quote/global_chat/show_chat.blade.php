@foreach($data as $val)
    @if($val->touserId == Auth::user()->id || $val->fromuserId == Auth::user()->id)
        @if($val->fromuserId == Auth::user()->id)
            <div class="message-feed media">
                <div class="media-body">
                    <div class="mf-content">
                        {{$val->description}}
                    </div>
                    <small class="mf-date"><i class="fa fa-clock-o"></i>{{$val->created_at}}</small>
                </div>
            </div>
        @else
            <div class="message-feed right ">
                <div class="media-body">
                    <div class="mf-content">
                        {{$val->description}}
                    </div>
                    <small class="mf-date"><i class="fa fa-clock-o"></i> {{$val->created_at}}</small>
                </div>
            </div>
        @endif
    @endif

@endforeach
<div style="display:none " id="her"></div>


