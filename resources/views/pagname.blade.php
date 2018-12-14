@extends('layouts.app')

@section('content')
<style type="text/css">
    .hide{
        display: none;
    }
    .error_message {
        font-size: 14px;
        color: #F00;
        margin-bottom: 10px;
    }
</style>
<div class="container">
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div><br />
@endif

<!-- new code add for design -->

<div class="container">
  <h2>Stucare Solution pvt. ltd</h2>
  <form method="post" enctype="multipart/form-data" id="alldata" class="form-horizontal">
    <div class="form-group">
        <input type="hidden" value="{{csrf_token()}}" name="_token" />
        <label class="control-label col-sm-2" for="name">name:</label>
        <div class="col-sm-6">
        <input type="text" class="form-control" name="name" id="username"/>
        <span class="error_message hide" ></span>
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-sm-2" for="name">Date of birth:</label>
        <div class="col-sm-6">
        
        <input type="text" id="datepicker" name="date_of_birth" onchange="myFunction(this)" class="form-control">
        <span class="error_message hide" ></span>
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-sm-2" for="name">age count:</label>
        <div class="col-sm-6">
        <input type="text" name="agecount" value="" id="agecountnew" class="form-control">
        <span class="error_message hide" ></span>
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-sm-2" for="department">select department:</label>
        <div class="col-sm-6">
        <select class="leave_response form-control" name="department" id="departmentnew">
          <option value="">select anyone</option>  
          <option value="1">cse</option>
          <option value="2">electrical</option>
        </select> 
        <span class="error_message hide" ></span>
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-sm-2" for="name">designation:</label>
        <div class="col-sm-6">
        <input type="text" id="designationnw" name="designation" value="" class="form-control">
        <span class="error_message hide" ></span>
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-sm-2" for="name">salary:</label>
        <div class="col-sm-6">
        <input type="text" id="salary" name="salarynew" value="" class="form-control">
        <span class="error_message hide" ></span>
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-sm-2" for="name">image:</label>
        <div class="col-sm-6">
        <input type="file" id="images" name="image" class="form-control">
        <span class="error_message hide" ></span>
        </div>
    </div>
    <div class="form-group">        
      <div class="col-sm-offset-2 col-sm-10">
        <button type="button" class="btn btn-primary createing">Create</button>
      </div>
    </div>

  </form>
</div>
<!-- end -->
    <!-- <div class="row">
        <div class="col-md-12">
            <form method="post" enctype="multipart/form-data" id="alldata">
        <div class="form-group">
            <input type="hidden" value="{{csrf_token()}}" name="_token" />
            <label for="title">Name:</label>
            <input type="text" class="form-control" name="name" id="username"/>
            <span class="error_message hide" ></span>
        </div>
        <div class="form-group">
            <label for="dateofbirth">Date of Birth:</label>
            <input type="text" id="datepicker" name="date_of_birth" onchange="myFunction(this)">
            <span class="error_message hide" ></span>
        </div>
        <div class="form-group">
            <label for="agecount">age count</label>
            <input type="text" name="agecount" value="" id="agecountnew">
            <span class="error_message hide" ></span>
        </div>
        <div class="form-group">
        <label for="agecount">select department</label>
        <select class="leave_response" name="department" id="departmentnew">
          <option value="">select anyone</option>  
          <option value="1">cse</option>
          <option value="2">electrical</option>
          
        </select> 
         <span class="error_message hide" ></span>  
        </div>
        
        <div class="form-group">
            <label for="designation">designation</label>
            <input type="text" id="designationnw" name="designation" value="">
            <span class="error_message hide" ></span>
        </div>
        
        <div class="form-group">
            <label for="salary">salary</label>
            <input type="text" id="salary" name="salarynew" value="">
            <span class="error_message hide" ></span>
        </div>
        
         <div class="form-group">
            <label for="image">image</label>
            <input type="file" id="images" name="image">
            <span class="error_message hide" ></span>
        </div>
        
        <button type="button" class="btn btn-primary createing">Create</button>
    </form>
    </div> -->
        <div class="fetchalldata">
            
        </div>
        <!-- just for test -->
        
        <div class="usersearch"></div>
        <!-- end -->
    </div>
</div>
@endsection