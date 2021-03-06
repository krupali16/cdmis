@extends('layouts.adminlayout')
@section('title')
Manage User Types
@endsection

@section('content')

<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row bg-title">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">Manage User Type</h4> </div>                    
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="white-box">
                            <h3 class="box-title">View User Type</h3>
                            <div class="scrollable">
                                <div class="table-responsive">
                                    <table id="demo-foo-addrow" class="table m-t-30 table-hover contact-list" data-page-size="10">
                                        <thead>
                                            <tr>
												<th>ID</th>
                                                <th>User Type</th>
                                                <th>IsActive</th>
                                                <th>Update</th>
												<th>Delete</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @isset($userTypes)
                                                @foreach($userTypes as $userType)
                                                    <tr>
                                                        <td id="userTypeId" value="">{{ $userType->id }}</td>
                                                        <td id="userType" value="">{{ $userType->typeName }}</td>
                                                        <td id="isActive" value="">{{ $userType->isVisible }}</td>
                                                        <td>
                                                            <button class="btn btn-block btn-sm btn-info btn-rounded" data-toggle="modal" data-target="#updateUserType{{ $userType->id }}">
                                                                <i class="fa fa-edit fa-fw"></i> Update
                                                            </button>	
                                                        </td>
                                                        <td style="text-align:center;">
                                                        <button class="btn btn-block btn-sm btn-danger btn-rounded" onclick="event.preventDefault();
                                                     document.getElementById('delete-form-{{ $userType->id }}').submit();">
                                                                <i class="fa fa-remove fa-fw"></i> Delete
                                                        </button>
                                                            <form id="delete-form-{{ $userType->id }}" action="/userType/{{ $userType->id }}" method="POST" style="display: none;">
                                                                <input type="hidden" name="_method" value="DELETE" />
                                                                {{ csrf_field() }}
                                                            </form>
                                                        </td>
                                                    </tr>	                                                    
											<div id="updateUserType{{ $userType->id }}" class="modal fade in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                            <form class="form-horizontal form-material" action="/userType/{{ $userType->id }}" method="POST" >        
                                                <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="mdi mdi-close"></i></button>
                                                                <h4 class="modal-title" id="myModalLabel">Update User Type</h4> </div>
                                                            <div class="modal-body">                                                                
                                                                    {{ csrf_field() }}
                                                                    <input type="hidden" name="_method" value="PUT" />
                                                                    <div class="form-group">
																		<div class="col-md-12 m-b-20">
                                                                            <input type="text" class="form-control" name="id" disabled="true" placeholder="{{ $userType->id }}"> 
																		</div>
                                                                        <div class="col-md-12 m-b-20">
                                                                            <input type="text" class="form-control" name="typeName" value="{{ $userType->typeName }}" placeholder="{{ $userType->typeName }}"> 
																		</div>																		
                                                                        <div class="col-md-12 m-b-20">
																			<select id="soflow" name="isVisible">
																				<option value="Null" selected disabled>IsActive</option>
																				<option value="1" id="yes">Yes</option>
																				<option value="0" id="no">No</option>														  
																			</select> 
																		</div>
                                                                    </div>                                                                
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="Submit" class="btn btn-info waves-effect">Submit</button>
                                                                <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Cancel</button>
                                                            </div>
                                                        </div>
                                                        <!-- /.modal-content -->
                                                    </div>												
                                                    <!-- /.modal-dialog -->
                                                    </form>
                                                </div>	
                                                @endforeach
                                            @endisset											
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <td colspan="2">
                                                    <button type="button" class="btn btn-info btn-rounded" data-toggle="modal" data-target="#addUserType">Add User Type</button>
                                                </td>
												
                                                <div id="addUserType" class="modal fade in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                                    <form class="form-horizontal form-material" action="/userType" method="POST">    
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="mdi mdi-close"></i></button>
                                                                    <h4 class="modal-title" id="myModalLabel">Add User Type</h4>
                                                                </div>
                                                                <div class="modal-body">                                                                
                                                                        <div class="form-group">
                                                                            <div class="col-md-12 m-b-20">
                                                                                <input type="text" class="form-control" name="typeName" placeholder="Admin" /> 
                                                                            </div>
                                                                        <div class="col-md-12 m-b-20">
                                                                                <select id="soflow" name="isVisible">
                                                                                    <option value="Null" selected disabled>IsActive</option>
                                                                                    <option value="1" id="yes">Yes</option>
                                                                                    <option value="0" id="no">No</option>														  
                                                                                </select> 
                                                                        </div>
                                                                        </div>
                                                                        {{ csrf_field() }}                                                                
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="submit" class="btn btn-info waves-effect">Submit</button>
                                                                    <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Cancel</button>
                                                                </div>                                                        
                                                        </div>
                                                            <!-- /.modal-content -->
                                                        </div>												
                                                        <!-- /.modal-dialog -->
                                                    </form>
                                                </div>
                                                <td colspan="7">
                                                    <div class="text-right">
                                                        {{ $userTypes->links() }}
                                                    </div>
                                                </td>
                                            </tr>
                                        </tfoot>										
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /row -->
            </div>
        </div>

@endsection