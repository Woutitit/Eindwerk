@extends('layouts.app')

@section('content')
<v-tabs>
	<v-tab label="Mijn spullen" selected>
		<v-container v-cloak>
			<v-button href="{{ url('item/create') }}">Materiaal toevoegen</v-button>
		</v-container>
	</v-tab>
	<v-tab label="Instellingen">
		<v-container v-cloak>
			<h1>Mijn instellingen</h1>
		</v-container
	</v-tab>
</v-tabs>
@endsection