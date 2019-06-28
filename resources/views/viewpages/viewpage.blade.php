@extends('layouts.layoutindex')

@section('content')

	<div class="container">
		<div class="container-component">

        	<div class="pageWrap">
                <div class="panel panel-primary">
                    <div class="panel-heading text-center">{{$seminar_title}}</div>
                    <div class="panel-body">
                        <pre class="list-unstyled ">                                    	
                        <dl><dd>{{$info_date}}</dd><dd>{{$info_title}}</dd><dd>{{$info_prof}}</dd></dl>
                        </pre>

                        <div>
                        	<!-- iframe コード入力 -->
                            {!!$iframe_html!!}
                        </div>

                    </div>
                    <div class="panel-footer">
                        <p class="glyphicon glyphicon-warning-sign text-danger">　PCでご視聴の場合はVPNを切断しご覧ください</p>
                    </div>
                </div>

                <div class="col-sm-12 contactBox">
                	<a target="_blank" href="{!!$url!!}">接続に関する技術的な質問等ございましたら、こちらからお問い合わせ下さい。</a>
            	</div>
	        </div>

        </div>
    </div>

@endsection
