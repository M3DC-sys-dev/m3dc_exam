@extends('layouts.layoutindex')

@section('content')

	<div class="container">
		<div class="container-component">

        	<div class="pageWrap">
                <div class="panel panel-primary">
                    <div class="panel-heading text-center">
                        <span class="h3">{{ config('defaultcfg.defaultcfg.M3DC_SEMINAR_TITLE') }}</span>
                    </div>
                    <div class="panel-body">
                        <pre class="list-unstyled">日程：{{ config('defaultcfg.defaultcfg.SEMI_INFO_DATE') }}<br>演題：{{ config('defaultcfg.defaultcfg.SEMI_INFO_TITLE') }}<br>演者：{{ config('defaultcfg.defaultcfg.SEMI_INFO_PROF') }}</pre>

                        <div class="text-center">
                        	<!-- iframe コード入力 -->
                            <iframe id="mediaframe" src="img/m3dc_logo.png" width="500" height="550"></iframe>
                        </div>

                    </div>
                    <div class="panel-footer">
                        <p class="glyphicon glyphicon-warning-sign text-danger">　PCでご視聴の場合はVPNを切断しご覧ください</p>
                    </div>
                </div>

                <div class="col-sm-12 contactBox">
                	<a target="_blank" href="{{ config('defaultcfg.defaultcfg.INQUIRY_URL') }}">接続に関する技術的な質問等ございましたら、こちらからお問い合わせ下さい。</a>
            	</div>
	        </div>

        </div>
    </div>

@endsection
