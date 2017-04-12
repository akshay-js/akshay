<?php
namespace Akshay\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\View\View;
use Akshay\Location\ip2locationlite;

class AnalyticsReportsController extends AppController
{
	
	public function beforeFilter(Event $event)
    {		
        parent::beforeFilter($event);
        $this->Auth->allow(array('index','viewRecords'));
    }
	
    public function index()
    {
		$unique_user		=	$this->request->session()->read('unique_user');
		if(empty($unique_user)){
			$this->request->session()->write('unique_user',time());
			$unique_user	=	time();
		}
		
		$locations	=	'';
		
		$unique_locations		=	$this->request->session()->read('unique_locations');
		if(empty($unique_locations)){
			$ipLite 	= 	new ip2locationlite();
			$ipLite->setKey('d7765453a630ca3e9031bde33ec45d2c87afc8807c840fa6a03c6c5ed1c50a1e');
			
			$locations 			= 	$ipLite->getCity($this->request->query['ip']);
			
			$this->request->session()->write('unique_locations',$locations);
			$unique_locations	=	$locations;
		}
		
		$data['ip']			=	$this->request->query['ip'];
		$data['load_time']	=	$this->request->query['load_time'];
		$data['curr_url']	=	$this->request->query['curr_url'];
		$data['page_title']	=	$this->request->query['page_title'];
		$data['height']		=	$this->request->query['height'];
		$data['width']		=	$this->request->query['width'];
		$data['ref']		=	$this->request->query['ref'];
		$data['unique_user']=	$unique_user;
		$data['location']	=	json_encode($unique_locations);
		$data['country']	=	isset($unique_locations['countryCode']) ? $unique_locations['countryCode'] : '';
		if(!empty($unique_locations['countryCode'])){
			$analyticsReport = $this->AnalyticsReports->newEntity();
			
			$analyticsReport = $this->AnalyticsReports->patchEntity($analyticsReport, $data);
			$this->AnalyticsReports->save($analyticsReport);
		}
		$data = 'data:image/gif;base64,R0lGODlhAQABAID/AP///wAAACwAAAAAAQABAAACAkQBADs=';
		
		list($type, $data) = 	explode(';', $data);			
		$type			   = 	explode('/', $type);			
		list(, $data)      = 	explode(',', $data);			
		$data 			   =	base64_decode($data);
		header("Content-type: image/png");
		header('Content-Length: ' . strlen($data));
		echo $data;		
		exit;
    }
	
	public function viewRecords()
    { 
		$currMonth			=	Date('m');
		$userByMonth		=	array();
		$userByDay			=	array();
		$userUniqCount		=	$this->AnalyticsReports->find('all');
		$totalCount			=	$userUniqCount->group('AnalyticsReports.ip')->count();
		
		$userCountry		=	$this->AnalyticsReports->find('all')->select(['location','ip','country','count' => $userUniqCount->func()->count('*')])->group('AnalyticsReports.ip')->having(['count >' => 0]);
		
		
		$reffererUser		=	$this->AnalyticsReports->find('all')->select(['location','curr_url','ref','country','count' => $userUniqCount->func()->count('*')])->where(['ref !=' => ''])->group('AnalyticsReports.ref')->having(['count >' => 0])->order(['count' => 'desc']);
		
		
		$userUniqCount		=	$userUniqCount->select(['unique_user','count' => $userUniqCount->func()->count('*')])->group('AnalyticsReports.unique_user')->having(['count >' => 1])->count();
		
		
		$first  = strtotime('first day this month');
		$months = array();
		
		$weekVisit		=	0;
		for ($i = 6; $i >= 0; $i--) {			
			$month	=	 date('Y-m',  strtotime("-$i month", $first));
			$month1	=	 date('M',  strtotime("-$i month", $first));			
			$count	=	$this->AnalyticsReports->find('all')->where([
							'created LIKE' => '%'.$month.'%'
						])->group('AnalyticsReports.ip')->count();
			
			$userByMonth[$month1]	=	$count;
			
			$a		=	$i+1;
			$day	=	 date('Y-m-d',  strtotime("-$a day", $first));
			$day1	=	 date('D',  strtotime("-$a day", $first));			
			$dCount	=	$this->AnalyticsReports->find('all')->where([
							'created LIKE' => '%'.$day.'%'
						])->group('AnalyticsReports.ip')->count();
			$weekVisit			=	$weekVisit+$dCount;	
			$userByDay[$day1]	=	$dCount;
			if($i == 0){
				$totalMonthCount	=		$userByMonth[$month1];
				$todayCount			=		$userByDay[$day1];
			}
		}
		
		$countryList	=	array();
		$count			=	0;
		foreach($userCountry as $res){
			$location		=	json_decode($res->location);
			$countryCode 	=	$res->country;
			$countryName 	=	isset($location->countryName) ? $location->countryName : '';			
			
			$count		 	=	isset($countryList[$countryCode]['count']) ? $countryList[$countryCode]['count']+1 : 1;			
			
			$countryList[$countryCode]	=	array('count' => $count,'name' => $countryName);
		}
		$this->viewBuilder()->layout('admin');
		$this->set(compact('userByMonth','totalCount','userUniqCount','countryList','userByDay','totalMonthCount','todayCount','weekVisit','reffererUser'));
    }
}

