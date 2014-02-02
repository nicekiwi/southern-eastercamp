@section('content')

<div class="row">
	<div class="small-12 columns">
		<h2>Create Page</h2>

		{{ Form::open([ 'method' => 'POST', 'route' => 'admin.pages.store' ]) }}

		{{ Form::label('order', 'Order:') }}
		{{ Form::text('order'); }}

		{{ Form::label('slug', 'Meta Slug:') }}
		{{ Form::text('slug'); }}

		{{ Form::label('meta_title', 'Meta Title:') }}
		{{ Form::text('meta_title'); }}

		{{ Form::label('meta_desc', 'Meta Description:') }}
		{{ Form::textarea('meta_desc'); }}

		{{ Form::label('content', 'Page Contents:') }}
		{{ Form::textarea('content', $value = null, ['class' => 'content-editor']); }}
		<div id="content-editor"></div>

		{{ Form::submit('Create Page') }}
		    
		{{ Form::close() }}
	</div>
</div>



@stop