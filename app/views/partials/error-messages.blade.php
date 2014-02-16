<!-- Display Alert messages -->
<div class="container">
  <div class="row">
    <div class="col-xs-12">
      @if(Session::get('success_message'))
      <div class="alert alert-success alert-dismissable">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <i class="fa fa-check-square-o fa-lg"></i> {{ Session::get('success_message') }}
      </div>
      @endif

      @if(Session::get('info_message'))
      <div class="alert alert-info alert-dismissable">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <i class="fa fa-bullhorn fa-lg"></i> {{ Session::get('info_message') }}
      </div>
      @endif

      @if(Session::get('warning_message'))
      <div class="alert alert-warning alert-dismissable">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <i class="fa fa-exclamation-triangle fa-lg"></i>{{ Session::get('warning_message') }}
      </div>
      @endif

      @if(Session::get('error_message'))
      <div class="alert alert-danger alert-dismissable">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <i class="fa fa-exclamation-circle fa-lg"></i> {{ Session::get('error_message') }}
      </div>
      @endif
    </div>
  </div>
</div>