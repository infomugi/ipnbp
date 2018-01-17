<?php
class ReminderController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
			);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow',
				'actions'=>array('notification','index'),
				'users'=>array('*'),
				),		
			array('deny',
				'users'=>array('*'),
				),
			);
	}

	public function actionIndex()
	{
		$this->render('index',array(
			'notification'=>$this->loadNotificationSetting(),
			));
	}

	public function loadNotificationSetting()
	{
		$model=RequestNotificationSetting::model()->findByPk(1);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}	

	public function actionNotification($type){
		$name = $this->nameReminder($type);
		$setReminder = $this->dueReminder($type);

		if($type==1){
			$this->notifDisposition($type,$name,$setReminder);
		}elseif($type==2){
			$this->notifResponse($type,$name,$setReminder);
		}elseif($type==3){
			$this->notifResponseApprove($type,$name,$setReminder);
		}elseif($type==4){
			$this->notifReport($type,$name,$setReminder);
		}elseif($type==5){
			$this->notifReportCustomer($type,$name,$setReminder);
		}elseif($type==6){
			$this->notifReportSend($type,$name,$setReminder);
		}else{
			echo "Unknow";
		}

	}

	public function notifText($code,$name,$jumlahhari,$status,$message,$button,$id,$date){	
		if($status==1){

			echo "<tr> <td class='user-avatar cell-detail user-info'><img src='".YII::app()->theme->baseUrl."/admin/assets/img/avatar".rand(1,6).".png' alt='Avatar'><span>".$message."</span><span class='cell-detail-description'>Reminder (".$name.") #".$code."</span></td> <td class='cell-detail'> <span>".$code."</span><span class='cell-detail-description'>Tipe</span></td> <td class='cell-detail'><span>".$jumlahhari." Hari</span><span class='cell-detail-description'>".$date."</span></td> <td class='text-right'> <div class='btn-group btn-hspace'> <a href='".YII::app()->baseUrl."/request/view/id/".$id."' class='btn btn-default'>".$this->nameReminder($button)."</a></div> </td> </tr>";

		}
	}


	// Kirim Reminder ke Admin apabila dalam 1 minggu belum mengunggah file disposisi dan mengirimkan ke balai
	public function notifDisposition($type,$name,$setReminder){
		foreach (Request::ReminderDisposition($setReminder) as $data) {
			$jumlahhari = $this->countDate($data['date']);
			$email = $this->checkReminder($jumlahhari,$setReminder);

			if($email=="Kirim Email"){
				$this->notifText($data['code'],$name,$jumlahhari,1,"Sudah (".$jumlahhari.")  Hari terhitung dari ".Request::model()->date($data['date']).", Anda Belum Upload Surat Disposisi",$type,$data['id'],Request::model()->date($data['date']));
			}
		}

	}

	// Kirim Reminder apabila dalam jangka 2 minggu belum merespon / memberikan surat jawaban kepada Pelanggan
	public function notifResponse($type,$name,$setReminder){
		foreach (Response::Reminder($setReminder) as $data) {
			$jumlahhari = $this->countDate($data['date']);
			$email = $this->checkReminder($jumlahhari,$setReminder);

			if($email=="Kirim Email"){
				$this->notifText($data['code'],$name,$jumlahhari,1,"Sudah (".$jumlahhari.")  Hari terhitung dari ".Request::model()->date($data['date']).", Anda Belum Mengirimkan Surat Tanggapan",$type,$data['id'],Request::model()->date($data['date']));
			}
		}

	}	


	// Kirim Reminder apabila status surat tanggapan = diterima dan jangka waktu > 3 hari, harus membuat dan mengirim invoice 
	public function notifResponseApprove($type,$name,$setReminder){
		foreach (Response::ReminderResponse($setReminder) as $data) {
			$jumlahhari = $this->countDate($data['date']);
			$email = $this->checkReminder($jumlahhari,$setReminder);

			if($email=="Kirim Email"){

				$this->notifText($data['code'],$name,$jumlahhari,1,"Sudah (".$jumlahhari.")  Hari terhitung dari ".Request::model()->date($data['date']).", Anda Harus Mengirim Invoice & SPK",$type,$data['id'],Request::model()->date($data['date']));

			}
		}

	}	


	// Kirim Reminder apabila Jadwal Terakhir di pengujian telah selesai, dan belum membuat laporan
	public function notifReport($type,$name,$setReminder){
		// foreach (RequestReport::ReminderRequest() as $request) {

		foreach (RequestReport::Reminder() as $data) {
			// if($data['date']!=NULL){

			$jumlahhari = $this->countDate($data['date']);
			$email = $this->checkReminder($jumlahhari,$setReminder);

			if($email=="Kirim Email"){

				$this->notifText($data['code'],$name,$jumlahhari,1,"Sudah (".$jumlahhari.") Hari terhitung dari ".Request::model()->date($data['date']).", Anda Belum Membuat Laporan",$type,$data['id'],Request::model()->date($data['date']));

			}
			// }
		}

		// }

	}	

	// Kirim Reminder apabila balai sudah memberikan laporan hasil pengujian kepada pelanggan dan jangka waktu >= 1 hari, memberitahu kepada pelanggan apakah mau dikirim via email atau diambil ke balai 
	public function notifReportCustomer($type,$name,$setReminder){
		foreach (RequestReport::ReminderReport($setReminder) as $data) {
			if($data['date']!=NULL || $data['date']!="1970-01-01"){
				$jumlahhari = $this->countDate($data['date']);
				$email = $this->checkReminder($jumlahhari,$setReminder);

				if($email=="Kirim Email"){
					$this->notifText($email,$data['code'],$name,$jumlahhari,$setReminder,1);
					// $this->EmailCustomer($data['id'],$data['report_id'],$type,"Laporan Hasil ","Silahkan <b>konfirmasi melalui tombol</b> dibawah ini apakah Laporan dikirim ke Perusahaan atau akan di ambil di PUSKIM ?");
				}
			}

		}	
	}	


	// Kirim Reminder apabila laporan sudah diisi dan disimpan oleh admin dan jangka waktu >= 3 hari
	public function notifReportSend($type,$name,$setReminder){
		foreach (RequestReport::ReminderSend($setReminder) as $data) {
			if($data['date']!=NULL || $data['date']!="1970-01-01"){
				$jumlahhari = $this->countDate($data['date']);
				$email = $this->checkReminder($jumlahhari,$setReminder);

				if($email=="Kirim Email"){

					$this->notifText($data['code'],$name,$jumlahhari,1,"Sudah (".$jumlahhari.")  Hari terhitung dari ".Request::model()->date($data['date']).", Anda belum Mengirimkan Laporan kepada Pelanggan",$type,$data['id'],Request::model()->date($data['date']));

				}
			}
		}

	}	

	public function loadRequest($id)
	{
		$model=Request::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	public function loadCompany($id)
	{
		$model=Company::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}


	public function loadReport($id)
	{
		$model=RequestReport::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}


	public function loadReminder()
	{
		$model=RequestNotificationSetting::model()->findByPk(1);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}		


	public function loadGreeting(){
		date_default_timezone_set("Asia/Jakarta");
		$b = time();
		$hour = date("G",$b);

		if ($hour>=0 && $hour<=11)
		{
			return "Selamat Pagi";
		}
		elseif ($hour >=12 && $hour<=14)
		{
			return "Selamat Siang";
		}
		elseif ($hour >=15 && $hour<=17)
		{
			return "Selamat Sore";
		}
		elseif ($hour >=17 && $hour<=18)
		{
			return "Selamat Petang";
		}
		elseif ($hour >=19 && $hour<=23)
		{
			return "Selamat Malam";
		}
	}


	public function Email($id,$type,$message,$message_footer){
		$request=$this->loadRequest($id);
		$reminder = $this->loadReminder();
		Yii::import('ext.yii-mail.YiiMailMessage');
		$email = new YiiMailMessage;

		//Send Mail
		$message_title = "Reminder ".$this->nameReminder($type);
		$message_confirm = "Silahkan klik tombol dibawah untuk ".$message_footer.".</p>";
		$message_content = "<p>".$this->loadGreeting()." Admin, ".$message." <b>" . $request->letter_subject ."</b> dengan Nama Perusahaan <b>".$request->Company->name . "</b> " .$message_confirm;
		$message_link = Yii::app()->request->hostInfo."/ipnbp/request/view/id/".$id;
		$message_button = $this->nameReminder($type);

		//Send Email
		$email->subject = "Reminder ".$this->nameReminder($type). " - " . $request->letter_subject ." - ".$request->Company->name;
		$email->addTo($reminder->email);
		$email->setFrom(array('pnbp@pu.go.id' => 'PNBP Reminder'));

		$message_template = $this->renderPartial('/email/informasi',
			array(
				'email'=>"infomugi@gmail.com",
				'title'=>$message_title,
				'message'=>$message_content,
				'link'=>$message_link,
				'button'=>$message_button
				),TRUE);

		$email->setBody($message_template, 'text/html');
		if(Yii::app()->mail->send($email)){
			RequestNotification::model()->log($message_content,$type,$request->id_request);
			echo "Email Terkirim";
		}


	}

	public function EmailCustomer($id,$reportid,$type,$message,$message_footer){
		$request=$this->loadRequest($id);
		$report=$this->loadReport($reportid);

		Yii::import('ext.yii-mail.YiiMailMessage');
		$email = new YiiMailMessage;

		//Send Mail
		$message_title = "Reminder ".$this->nameReminder($type);
		$message_confirm = $message_footer.".</p>";
		$message_content = "<p>".$this->loadGreeting()." Bapak / Ibu Perwakilan Perusahaan ".$request->Company->name.", ".$message." <b>(" . $request->letter_subject .")</b> telah tersedia. ".$message_confirm;
		$message_link1 = Yii::app()->request->hostInfo."/ipnbp/send/".$report->token;
		$message_link2 = Yii::app()->request->hostInfo."/ipnbp/take/".$report->token;
		$message_button1 = "Kirim ke Perusahaan";
		$message_button2 = "Ambil di PUSKIM";

		//Send Email
		$email->subject = "Reminder ".$this->nameReminder($type). " - " . $request->letter_subject ." - ".$request->Company->name;
		$email->addTo("infomugi@gmail.com");
		$email->setFrom(array('pnbp@pu.go.id' => 'PNBP Reminder'));

		$message_template = $this->renderPartial('/email/informasi_pelanggan',
			array(
				'email'=>"infomugi@gmail.com",
				'title'=>$message_title,
				'message'=>$message_content,
				'link1'=>$message_link1,
				'link2'=>$message_link2,
				'button1'=>$message_button1,
				'button2'=>$message_button2
				),TRUE);

		$email->setBody($message_template, 'text/html');
		if(Yii::app()->mail->send($email)){
			RequestNotification::model()->log($message_content,$type,$request->id_request);
			echo "Email Terkirim";
		}


	}

	public function countDate($date){
		return Request::model()->countMinute($date,date('Y-m-d'));
	}

	public function checkReminder($jumlahhari,$limit){
		if($jumlahhari>=$limit){
			return "Kirim Email";
		}else{
			return "Tidak Kirim";
		}
	}

	public function nameReminder($type){
		if($type==1){
			return "Disposisi";
		}else if($type==2){
			return "Surat Tanggapan";
		}else if($type==3){
			return "Invoice & SPK";
		}else if($type==4){
			return "Upload Laporan";
		}else if($type==5){
			return "Info Laporan";
		}else if($type==6){
			return "Kirim Laporan";
		}else{
			return "Tidak di Set";
		}
	}

	public function dueReminder($type){
		$model = $this->loadReminder();
		if($type==1){
			return $model->disposition_reminder;
		}else if($type==2){
			return $model->response_reminder;
		}else if($type==3){
			return $model->invoice_reminder;
		}else if($type==4){
			return $model->report_reminder;
		}else if($type==5){
			return $model->report_info_reminder;
		}else if($type==6){
			return $model->report_send_reminder;
		}else{
			return "Tanggal Jatuh Tempo tidak Di Set";
		}
	}	

	public function sendEmail(){
		$model = $this->loadReminder();
		if($model->email==1){
			return 1;
		}else{
			return 0;
		}
	}	

}
