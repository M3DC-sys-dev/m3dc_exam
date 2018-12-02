<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\exam_log;

class InputController extends Controller
{
    public function index()
    {
        $prefs = array(
            '北海道', 
            '青森県', 
            '岩手県', 
            '宮城県',
            '秋田県', 
            '山形県', 
            '福島県', 
            '茨城県',
            '栃木県', 
            '群馬県', 
            '埼玉県', 
            '千葉県',
            '東京都', 
            '神奈川県', 
            '新潟県', 
            '富山県',
            '石川県', 
            '福井県', 
            '山梨県', 
            '長野県', 
            '岐阜県', 
            '静岡県', 
            '愛知県', 
            '三重県',
            '滋賀県', 
            '京都府', 
            '大阪府', 
            '兵庫県',
            '奈良県', 
            '和歌山県', 
            '鳥取県', 
            '島根県',
            '岡山県', 
            '広島県', 
            '山口県', 
            '徳島県',
            '香川県',
            '愛媛県',
            '高知県', 
            '福岡県',
            '佐賀県', 
            '長崎県', 
            '熊本県', 
            '大分県',
            '宮崎県', 
            '鹿児島県', 
            '沖縄県'
          );

        return view('viewpages.input')->with(['prefs' => $prefs]);
    }
    
    public function displayview()
    {
        return view('viewpages.viewpage');
    }

    public function store(Request $request)
    {
        \Request::setTrustedProxies(['10.0.0.0/8']);

        $exam_log = new exam_log;
        $exam_log->crnt_data = date('Y-m-d H:i:s');
        $exam_log->todohuken = $request->todohuken;
        $exam_log->fname = $request->fname;
        $exam_log->lname = $request->lname;
        $exam_log->viewcnt = $request->viewcnt;
        $exam_log->ip_addr = \Request::ip();
        $exam_log->referer = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : error;
        $exam_log->usr_agent = $_SERVER['HTTP_USER_AGENT'];
        $exam_log->save();

        $filename = storage_path().'/logs/'.date('Y_m_d_H:i:s').'.csv';
        $array = array(
            $exam_log->crnt_data, 
            $exam_log->todohuken, 
            $exam_log->fname,
            $exam_log->lname,
            $exam_log->viewcnt,
            $exam_log->ip_addr,
            $exam_log->referer,
            $exam_log->usr_agent,
            );
        $file = fopen($filename, "w");    
        if( $file ){
            fputcsv($file, $array);
        }
        fclose($file);

        return redirect('viewpage');
    }
}
