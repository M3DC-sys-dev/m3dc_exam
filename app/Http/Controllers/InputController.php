<?php

namespace App\Http\Controllers;

use Exception;
use Carbon\Carbon;
use App\ExamLog;
use Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class InputController extends Controller
{
    public function index(Request $req)
    {
		if ($req->isMethod('post')) {

			$inputs = $req->all();
			$now = Carbon::now();

			try {
				$data = ExamLog::create([
					'crnt_date' => $now,
					'todohuken' => $inputs['todohuken'],
					'fname' => $inputs['fname'],
					'lname' => $inputs['lname'],
					'viewcnt' => $inputs['part_num'],
					'ip_addr' => $req->ip(),
					'usr_agent' => $req->userAgent(),
					'referer' => $req->headers->get('referer'),
				]);

				$res = $this->record_log($now, $data);

			} catch(Exception $e) {
				Log::error($e->getMessage());
				return redirect()->back()->withErrors(['error' => $e->getMessage()])->withInput();
			}
			return redirect('viewpage');

		} else {
			$cfg = config('defaultcfg.defaultcfg');
			$semi_info = array(
				'date' => $cfg['SEMI_INFO_DATE'],
				'title' => $cfg['SEMI_INFO_TITLE'],
				'prof' => $cfg['SEMI_INFO_PROF'],
			);

			return view('viewpages.input', [
				'title' => $cfg['PAGE_TITLE'],
				'input_title' => $cfg['INPUT_TITLE'],
				'logo_brand' => $cfg['M3DC_LOG_TXT'],
				'panel_title' => $cfg['M3DC_SEMINAR_TITLE'],
				'semi_info' => $semi_info,
				'pref_list' => $this->get_pref_list(),
			]);
		}
    }


    public function displayview()
    {
		$cfg = config('defaultcfg.defaultcfg');
		$semi_info = array(
			'date' => $cfg['VIEW_INFO_DATE'],
			'title' => $cfg['VIEW_INFO_TITLE'],
			'prof' => $cfg['VIEW_INFO_PROF'],
		);

		return view('viewpages.viewpage', [
			'title' => $cfg['PAGE_TITLE'],
			'logo_brand' => $cfg['M3DC_LOG_TXT'],
			'panel_title' => $cfg['M3DC_SEMINAR_TITLE'],
			'semi_info' => $semi_info,
			'inquiry_url' => $cfg['INQUIRY_URL'],
		]);
    }

	private function record_log($d, $log)
	{
		$log_dir = "../logs/";
		if (!file_exists($log_dir)) {
			mkdir($log_dir, 0777);
		}

		$data = $log->crnt_date . ","
			. $log->todohuken . ","
			. $log->lname . ","
			. $log->fname . ","
			. $log->viewcnt . ","
			. $log->ip_addr . ","
			. $log->referer . ","
			. "'" . $log->usr_agent . "'"
			;
		$file_name = $d->format("Y-m-d_H:i:s");
		return file_put_contents($log_dir . $file_name, $data, FILE_APPEND);
	}

	private function get_pref_list()
	{
		return array(
			"北海道",
			"青森県",
			"岩手県",
			"宮城県",
			"秋田県",
			"山形県",
			"福島県",
			"茨城県",
			"栃木県",
			"群馬県",
			"埼玉県",
			"千葉県",
			"東京都",
			"神奈川県",
			"新潟県",
			"富山県",
			"石川県",
			"福井県",
			"山梨県",
			"長野県",
			"岐阜県",
			"静岡県",
			"愛知県",
			"三重県",
			"滋賀県",
			"京都府",
			"大阪府",
			"兵庫県",
			"奈良県",
			"和歌山県",
			"鳥取県",
			"島根県",
			"岡山県",
			"広島県",
			"山口県",
			"徳島県",
			"香川県",
			"愛媛県",
			"高知県",
			"福岡県",
			"佐賀県",
			"長崎県",
			"熊本県",
			"大分県",
			"宮崎県",
			"鹿児島県",
			"沖縄県",
		);

	}

}
