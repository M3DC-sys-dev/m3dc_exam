<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class InputController extends Controller
{
    public function index()
    {
        //表示データ取得
        $data["title"]         = config('defaultcfg.defaultcfg.PAGE_TITLE');
        $data["logo"]          = config('defaultcfg.defaultcfg.M3DC_LOG_TXT');
        $data["seminar_title"] = config('defaultcfg.defaultcfg.M3DC_SEMINAR_TITLE');
        $data["date_time"]     = config('defaultcfg.defaultcfg.SEMI_INFO_DATE');
        $data["subject"]       = config('defaultcfg.defaultcfg.SEMI_INFO_TITLE');
        $data["speaker"]       = config('defaultcfg.defaultcfg.SEMI_INFO_PROF');
        $data["prefs"]         = config('defaultcfg.pref');
        return view('viewpages.input', $data);
    }
    
    public function displayview(Request $request)
    {
        //変数の初期化
        $todohuken = '';
        $fname = '';
        $lname = '';
        $viewcnt = 0;

        //表示データ取得
        $data["title"]         = config('defaultcfg.defaultcfg.INPUT_TITLE');
        $data["logo"]          = config('defaultcfg.defaultcfg.M3DC_LOG_TXT');
        $data["seminar_title"] = config('defaultcfg.defaultcfg.M3DC_SEMINAR_TITLE');
        $data["info_date"]     = config('defaultcfg.defaultcfg.VIEW_INFO_DATE');
        $data["info_title"]    = config('defaultcfg.defaultcfg.VIEW_INFO_TITLE');
        $data["info_prof"]     = config('defaultcfg.defaultcfg.VIEW_INFO_PROF');
        $data["url"]           = config('defaultcfg.defaultcfg.INQUIRY_URL');
        //埋め込みデータ取得
        $data["iframe_html"]   = '<iframe src="http://localhost/m3dc_exam/public/img/m3dc_logo.png" width="500" height="530"></iframe>';

        //フォームデータ取得
        if ($request->has('todohuken')) $todohuken = $request->input('todohuken'); //都道府県
        if ($request->has('fname')) $fname = $request->input('fname'); //姓
        if ($request->has('lname')) $lname = $request->input('lname'); //名
        if ($request->has('viewcnt')) $viewcnt = $request->input('viewcnt'); //人数

        //制御文字削除と文字のサイズの調整
        $fname = mb_strimwidth(preg_replace('/[\x00-\x1F\x7F]/', '', $fname), 0, 10, "", "UTF-8" );
        $lname = mb_strimwidth(preg_replace('/[\x00-\x1F\x7F]/', '', $lname), 0, 15, "", "UTF-8" );

        //環境情報取得
        $ip_addr = $request->ip(); //IPアドレス
        $referer = $request->server('HTTP_REFERER'); //リファラー
        $usr_agent = $request->header('User-Agent'); //User-Agent

        //ログに出力
        Storage::disk('logs')->put( date("Y_m_d_H:i:s"), sprintf("%s,%s,%s,%s,%d,%s,%s,%s", date("Y-m-d h:i:s"), $todohuken, $fname, $lname, $viewcnt, $ip_addr, $referer, $usr_agent));
        //exam_logsに入れ込み
        DB::insert('insert into exam_logs (crnt_date,todohuken, fname, lname, viewcnt, ip_addr, referer, usr_agent) values (?, ?, ?, ?, ?, ?, ?, ?)', [date("Y-m-d H:i:s"), $todohuken, $fname, $lname, $viewcnt, $ip_addr, $referer, $usr_agent]);

        return view('viewpages.viewpage', $data);
    }
}
