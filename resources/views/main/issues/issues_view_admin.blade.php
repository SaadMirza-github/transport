@extends('layouts.innerpages')

@section('template_title')
    Register
@endsection

@section('content')


    <div class="page-header">
        <div class="page-leftheader">
            <h4 class="page-title mb-0">Issue Commented by Users</h4>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#"><i class="fe fe-layers mr-2 fs-14"></i>Pages</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page"><a href="#">Issue Commented by Users</a></li>
            </ol>
        </div>
        <div class="page-rightheader">
            <div class="btn btn-list">
                <a href="#" class="btn btn-info"><i class="fe fe-settings mr-1"></i> General Settings </a>
                <a href="#" class="btn btn-danger"><i class="fe fe-printer mr-1"></i> Print </a>
                <a href="#" class="btn btn-warning"><i class="fe fe-shopping-cart mr-1"></i> Buy Now </a>
            </div>
        </div>
    </div>
    <!--End Page header-->
    <!-- Row -->
    <form action="" id="form" method="POST">
        <input type="hidden" name="_token" value="{{ csrf_token()}}">
        <div class="row">
            <div class="col-xl-12 col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">Issue Commented by Users</div>
                    </div>
                    <div class="card-body">
                        <div class="card-title font-weight-bold"></div>
						@foreach ($users as $user)
                        <div class="row">
						<div class="col-sm-3 col-md-3">
                                <div class="form-group">
                                    <label class="form-label">User Id</label>
                                    <input type="text" readonly name="userid" value="{{ $user->id }}" class="form-control"
                                           placeholder="" />
                                </div>
                            </div>
                          
                            <div class="col-sm-3 col-md-3">
                                <div class="form-group">
                                    <label class="form-label">User Name</label>
                                    <input type="text" readonly name="username" value="{{ $user->name }}" class="form-control"
                                           placeholder="" />
                                </div>
                            </div>
                          @php
						    $penalty="";
						  @endphp
						  @foreach($issues as $issue)
						    @php 
							        $issueidvalue=$issue->id; 
									$penalty=$issue->penalty;
							@endphp
							
                            @foreach($issuescomments as $issuescomment)
							 @if($issuescomment->issueId==$issue->id && $issuescomment->userId==$user->id)
                              <div class="col-sm-3 col-md-3">
                                <div class="form-group">
                                    <label class="form-label">Comments</label>
                                     <textarea readonly class="form-control" id="comments" name="comments" 
									 placeholder="My comments..." maxlength="500" required>{{   $issuescomment->comments       }}</textarea>
                               </div>
                             </div>
							 @endif
						    @endforeach	
						  @endforeach
                        </div>
						@endforeach
					  @if($penalty=="")	
						<div class="row">
						<div class="col-sm-3 col-md-3">
                                <div class="form-group">
                                    <label class="form-label">Select User(s)</label>
                                    <select multiple="multiple"  name="penaltyusers[]" class="multiselect" required>
									@foreach($users as $user)
									  @foreach($issues as $issue)
                                       @if($user->id==$issue->createduserId)                                       
									   <option value="{{ $user->id }}"> {{ $user->name   }} </option>
									   @endif
									  @endforeach 
									 @endforeach  
									 
                                     @foreach($users as $user)
									  @foreach($issuesId as $issueid)
                                       @if($user->id==$issueid)                                       
									   <option value="{{ $user->id }}"> {{ $user->name   }} </option>
									   @endif
									  @endforeach 
									 @endforeach 
                                    </select>
                                </div>
                            </div>
                          
                            
						 </div>
						 
						<div class="row">
						 <div class="col-sm-3 col-md-3">
                           <div class="form-group">
                              <label class="form-label">Penalty</label>
						      <input type="text" required name="penalty" value="{{ $penalty }}" class="form-control"
                                           placeholder="penalty..." />
						  </div>
						 </div> 
						</div> 
						
                    </div>
                    <div class="card-footer text-center">
                        <button id="sv_btn" type="submit" class="btn  btn-primary">SAVE</button>
                    </div>
					@endif
					 @if($penalty<>"")	
						<div class="row">
						<div class="col-sm-3 col-md-3">
                                <div class="form-group">
                                    <label class="form-label">Penalty to User(s)</label>
                                   
									
									 
                                     @foreach($users as $user)
									  @foreach($penaltyusers as $penaltyuser)
                                       @if($user->id==$penaltyuser)                                       
									    {{ $user->name   }} -- 
									   @endif
									  @endforeach 
									 @endforeach 
                                    
                                </div>
                            </div>
                          
                            
						 </div>
						 
						<div class="row">
						 <div class="col-sm-3 col-md-3">
                           <div class="form-group">
                              <label class="form-label">Penalty</label>
						      <input readonly type="text" required name="penalty" value="{{ $penalty }}" class="form-control"
                                           placeholder="penalty..." />
						  </div>
						 </div> 
						</div> 
						
                    </div>
                    
					@endif
                </div>
            </div>
        </div>
        <!-- End Row-->
		<input type="hidden" name="issueId" value="{{ $issue->id  }}" />
    </form>


    <div class="modal" id="modaldemo4">
        <div class="modal-dialog modal-dialog-centered text-center " role="document">
            <div class="modal-content tx-size-sm">
                <div class="modal-body text-center p-4">
                    <button aria-label="Close" class="close" data-dismiss="modal" type="button"><span
                            aria-hidden="true">&times;</span></button>
                    <i class="fe fe-check-circle fs-100 text-success lh-1 mb-5 d-inline-block"></i>
                    <h4 class="text-success tx-semibold" id="success"></h4>
                </div>
            </div>
        </div>
    </div>

    <div class="modal" id="modaldemo5">
        <div class="modal-dialog modal-dialog-centered text-center" role="document">
            <div class="modal-content tx-size-sm">
                <div class="modal-body text-center p-4">
                    <button aria-label="Close" class="close" data-dismiss="modal" type="button"><span
                            aria-hidden="true">&times;</span></button>
                    <i class="fe fe-x-circle fs-100 text-danger lh-1 mb-5 d-inline-block"></i>
                    <h4 class="text-danger" id="not_success"></h4>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('extraScript')
    <script>

        $(document).ready(function (e) {
            $("#form").on('submit', (function (e) {
                e.preventDefault();
                $.ajax({
                    url: "/issue_penalty_store",
                    type: "POST",
                    data: new FormData(this),
                    contentType: false,
                    cache: false,
                    processData: false,
                    beforeSend: function () {

                    },
                    success: function (data) {

                        // view uploaded file.
                        //$("#preview").html(data).fadeIn();

                        let test = data.toString();
                        let test2 = $.trim(test);
                        let text = "SUCCESS";
                        if (test2 == text) {
                            $('#success').html(data);
                            $('#modaldemo4').modal('show');
                            window.location.href = "/admin_issues";
                        } else {
                            $('#not_success').html(data);
                            $('#modaldemo5').modal('show');
                        }
                    },
                    error: function (e) {
                        $("#err").html(e).fadeIn();
                    }
                });
            }));
        });

    </script>

@endsection

