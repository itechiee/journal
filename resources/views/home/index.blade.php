@extends('layouts.master')

@section('content')

    <!-- <div class="panel-body">
        <h1>Hello 123</h1>
    </div> -->

<div class="container-fluid text-center">
  <div class="row content">

  

  <div class="col-sm-2 sidenav">
          <p>Contents</p>
              
              <div class="panel-group">
                <div class="panel panel-default">
                  <div class="panel-heading">
                    <h4 class="panel-title">
                      <a data-toggle="collapse" href="#2016">2016</a>
                    </h4>
                  </div>
                  <div id="2016" class="panel-collapse collapse">
                    <ul class="list-group">
                      <p>
                        <a data-toggle="collapse" href="#issue1">Issue 1</a>
                        <div id="issue1" class="panel-collapse collapse">
                          <ul class="list-group">
                            <p><a href="#issue1">Vol 1</a></p>
                            <p><a href="#issue1">Vol 2</a></p>
                            <p><a href="#issue1">Vol 3</a></p>
                          </ul>
                        </div>
                      </p>

                      <p>
                      <a data-toggle="collapse" href="#issue2">Issue 2</a>
                      <div id="issue2" class="panel-collapse collapse">
                          <ul class="list-group">
                            <p><a href="#issue2">Vol 1</a></p>
                            <p><a href="#issue2">Vol 2</a></p>
                            <p><a href="#issue2">Vol 3</a></p>
                          </ul>
                        </div>
                      </p>
                      <p>
                      <a data-toggle="collapse" href="#issue3">Issue 3</a>

                        <div id="issue3" class="panel-collapse collapse">
                          <ul class="list-group">
                            <p><a href="#issue3">Vol 1</a></p>
                            <p><a href="#issue3">Vol 2</a></p>
                            <p><a href="#issue3">Vol 3</a></p>
                          </ul>
                        </div>
                      </p>
                    </ul>
                  </div>

                  

                </div>
              </div>

    </div>

  <?php if($filesData) { ?>
    <div class="col-sm-2 sidenav">
          <p>Contents</p>
          <?php foreach($filesData as $file) { ?>
              <p><a href="#">{{ $file['title'] }}</a></p>
          <?php } ?>
    </div>
<?php } ?>

    <div class="col-sm-7 text-left">
      <h1>Welcome</h1>
      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
      <hr>
      <h3>Today Journal</h3>
      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
      <hr>
      <h3>What's New</h3>
      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
    </div>

    <div class="col-sm-3 sidenav">
          <p>Indexing Information</p>
          <div class="well">
            <p>ADS</p>
          </div>
          <div class="well">
            <p>ADS</p>
          </div>
    </div>
  </div>
</div>


@stop