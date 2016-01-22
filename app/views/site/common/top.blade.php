<!-- Static navbar -->
<nav class="navbar navbar-default navbar-static-top">
	<div class="container">
		<div class="row">
			<div class="col-sm-3">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
					<span class="sr-only">Menu</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="logo" href="{{ action('SiteIndexController@index') }}">
					<img src="{{ url('/assets/images/logo.png') }}" />
				</a>
			</div>
			<div class="col-sm-9">
				<div id="navbar" class="navbar-collapse collapse">
					<ul class="nav navbar-nav navbar-right">
						<li {{ checkActive() }}><a href="{{ action('SiteIndexController@index') }}">{{ trans('captions.home') }}</a></li>
						<li {{ checkActive(LaravelLocalization::transRoute('routes.about')) }}><a href="{{ action('AboutController@index') }}">{{ trans('captions.aboutus') }}</a></li>
						@foreach(getTypeLanguage($viTypes, $enTypes) as $type)
							<li {{ checkActive($type->slug) }}>
								<a href="{{ action('SiteTypeController@showSlug', $type->slug) }}">{{$type->name}}</a>
							</li>
						@endforeach
						<li {{ checkActive(LaravelLocalization::transRoute('routes.contact')) }}><a href="{{ action('ContactController@index') }}">{{ trans('captions.contact') }}</a></li>
					</ul>
				</div>
				<div class="language_bar_chooser">
				    @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
			            <a rel="alternate" hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode) }}">
			                {{{ $properties['native'] }}}
			            </a>
				    @endforeach
				</div>
			</div>
		</div>
	</div>
</nav>