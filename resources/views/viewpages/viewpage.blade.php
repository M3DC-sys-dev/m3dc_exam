@extends('layouts.layoutindex')

@section('content')

	<div class="container">
		<div class="container-component">

        	<div class="pageWrap">
                <div class="panel panel-primary">
                    <div class="panel-heading text-center">{{ $panel_title }}</div>
                    <div class="panel-body">
						<pre class="list-unstyled">
{{ $semi_info['date'] }}
{{ $semi_info['title'] }}
{{ $semi_info['prof'] }}</pre>
                        <div class="text-center">
							<iframe src="./img/m3dc_logo.png" width="490" height="533" scrolling="no">
							</iframe>
                        </div>

                    </div>
                    <div class="panel-footer">
                        <p class="glyphicon glyphicon-warning-sign text-danger">　PCでご視聴の場合はVPNを切断しご覧ください</p>
                    </div>
                </div>

                <div class="col-sm-12 contactBox">
                	<a target="_blank" href="{{ $inquiry_url }}">接続に関する技術的な質問等ございましたら、こちらからお問い合わせ下さい。</a>
            	</div>
	        </div>

        </div>
    </div>

@endsection
