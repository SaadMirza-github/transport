@extends('layouts.innerpages')

@section('template_title')
    Register
@endsection

@section('content')
    <!-- Row -->
    @include('partials.mainsite_pages.return_function')
    <div class="row">
        <div class="col-12">
            @if(session('flash_message'))
                <div class="alert alert-success">
                    {{session('flash_message')}}
                </div>
            @endif
            <!--div-->
            <div class="card">
                <div class="card-header">
                    <div class="card-title"><a type="button" href="{{url('issues_add')}}"
                          class="btn btn-icon btn-primary"><i class="fe fe-plus"></i>Add Issues</a>
					</div>
                </div>
                <div class="card-body">
                    <div class="">
                        <div class="table-responsive">
                            <table id="example" class="table table-bordered text-nowrap key-buttons">
                                <thead>
                                <tr>
                                    <th class="border-bottom-0">ISSUE ID</th>
									<th class="border-bottom-0">CREATED DATE</th>
                                    <th class="border-bottom-0">SUBJECT</th>
                                    <th class="border-bottom-0">ISSUE WITH</th>
                                    <th class="border-bottom-0">ISSUE DETAIL</th>
									<th class="border-bottom-0">STATUS</th>
									<th class="border-bottom-0">Result Penalty To</th>
                                    
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($issues as $issue)
                                    <tr>
                                        <td>{{$issue->id}}</td>
                                        <td>{{ date('d-m-Y H:i:s',strtotime($issue->created_at))}}</td>
                                        <td>{{$issue->subject}}</td>
										@php
										  $issuewithid=explode(',',$issue->issuewithuserId);
										@endphp
										
                                        <td>
										@foreach($issuewithid as $issueuser)
										 @foreach($users as $user) 
										  @if($user->id==$issueuser)
										  {{ $user->name }} ,
										  @endif
										 @endforeach  
										@endforeach
										</td>
										<td>{{$issue->detail}}</td>
                                       <td>{{  $issue->status    }}</td>
									   <td>
									   
									    @foreach($penaltyusers as $penaltyuser)
										   @foreach($users as $user)
										     @if($penaltyuser->id==$issue->id)
											  @php $userpenalty=explode(',',$penaltyuser->penaltyusers); @endphp
											  @foreach($userpenalty as $userp)
											    @if($user->id==$userp)
												 {{  $user->name  }}-{{ $issue->penalty }} </br>
												@endif
											  @endforeach
											 @endif
										   @endforeach
										@endforeach
									   </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!--/div-->

        </div>
    </div>
    <!-- /Row -->



@endsection

@section('extraScript')


@endsection

