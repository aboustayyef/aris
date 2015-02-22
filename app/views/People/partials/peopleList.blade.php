<ul>
	@foreach ($people as $key => $person)
		<li>
			<a href="/people/{{$person->id}}">{{$person->lastname}}, {{$person->firstname}}</a> {{$person->designation	}}
			@if(Auth::Check())
				<a class="admin" href="{{route('people.edit',$person->id)}}?from={{Request::path()}}">Edit Details</a>
			@endif
		</li>
	@endforeach
</ul>