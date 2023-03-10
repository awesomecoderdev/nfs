<?php
App::uses( 'AppController', 'Controller' );
App::import( 'Vendor', 'fpdf',     array( 'file' => 'fpdf17/fpdf.php' ) );

class DienstplanController extends AppController
{
	public $uses = array( 'Webmodul',
		'Modul',
		'User',
		'Firma',
		'DienstplanUserProps',
		'DienstplanUser',
		'DienstplanConfig',
		'DienstplanBooked',
		'DienstplanVacation',
		'DienstplanLeitstelleLog',
		'DienstplanContact'
	);
	public $components = array('AccessControl', 'AjaxReply', 'Paginator');
	public $helpers = array('Form', 'Paginator');
	public $name = 'Dienstplan';
	public $needWm = false;

	public function __construct( $request = null, $response = null ) {

		parent::__construct( $request, $response );
	}

	public function beforeFilter()
	{
		parent::beforeFilter();

		if( $this->request->clientIp() == '194.99.108.38' ||
			$this->request->clientIp() == '194.99.108.45' ||
			$this->request->clientIp() == '194.99.108.11' ||
			$this->request->clientIp() == '85.132.222.48' ||
			$this->request->clientIp() == '85.132.222.49' ||
			$this->request->clientIp() == '85.132.222.50' ||
			$this->request->clientIp() == '85.132.222.51' ||
			$this->request->clientIp() == '80.147.177.186' ||
			/*my ip*/$this->request->clientIp() == '::1' )
		{
			$this->webmodul_id = 439;
		}
		else if( /*$this->request->clientIp() == '141.90.9.62'*/ $this->request->clientIp() == '213.157.31.194' || $this->request->clientIp() == '194.127.205.2' || $this->request->clientIp() == '87.129.237.211' )
		{
			$this->webmodul_id = 440;
		}
		else if( $this->request->clientIp() == '213.188.107.58' )
		{
			$this->webmodul_id = 441;
		}
		if(isset($_GET['k']) && $_GET['k'] == 'bmZzb2RlbndhbGQ=')
		{
		    $this->webmodul_id = 442;
		}
		if( $this->Session->read('User.id') )
		{
			$user = $this->DienstplanUser->find('first', array( 'conditions' => array(
				'DienstplanUser.id' => $this->Session->read('User.id')
			) ));
			if( $user )
			{
				$this->webmodul_id = $user['DienstplanProps']['wid'];
			}
		}

		if( $this->AccessControl->acl_check( 'system','admin' ) )
		{
			//$this->Session->write( 'User.DienstplanProps.is_maintainer', 1 );
			//$this->Session->write( 'User.DienstplanProps.is_admin', 1 );
			if( isset($_GET['wid']) && $_GET['wid'] != '' )
			{
				$this->Session->write( 'User.DienstplanProps.adminWID', intval($_GET['wid']) );
			}
			else if( !$this->Session->read( 'User.DienstplanProps.adminWID' ) && $this->action != 'change_wid' )
			{
				$this->Session->write( 'User.DienstplanProps.adminWID', 439 );
				$this->redirect('/dienstplan/change_wid');
			}

			if( $this->Session->read( 'User.DienstplanProps.adminWID' ) )
				$this->webmodul_id = $this->Session->read( 'User.DienstplanProps.adminWID' );
		}
		$this->set('dienstplanConfig', $this->DienstplanConfig->find('first', array(
			'conditions' => array('id'=>$this->webmodul_id)
		)));
		$this->set('wid',$this->webmodul_id);
	}

	private function isSuperAdmin()
	{
		if( $this->AccessControl->acl_check( 'system','admin' ) )
			return true;

		if( !$this->isAdmin() )
			return false;

		$du = $this->DienstplanUser->find( 'first', array( 'conditions' => array(
			'DienstplanUser.id' => $this->Session->read('User.id'),
			'DienstplanProps.wid' => $this->webmodul_id
		) ) );
		if( !$du )
			return false;

		if( $du['DienstplanProps']['is_maintainer'] != '1' )
			return false;

		if( $du['DienstplanProps']['dienstplan_access'] == 0 )
		{
			return false;
		}

		return true;
	}

	private function isAdmin()
	{
		if( $this->AccessControl->acl_check( 'system','admin' ) )
			return true;

		if( !$this->isWorker() )
			return false;

		$du = $this->DienstplanUser->find( 'first', array( 'conditions' => array(
			'DienstplanUser.id' => $this->Session->read('User.id'),
			'DienstplanProps.wid' => $this->webmodul_id
		) ) );
		if( !$du )
			return false;

		if( $du['DienstplanProps']['is_admin'] != '1' )
			return false;

		if( $du['DienstplanProps']['dienstplan_access'] == 0 )
		{
			return false;
		}

		return true;
	}

	private function isContactMaintainer()
	{
		if( $this->AccessControl->acl_check( 'system','admin' ) )
			return true;
		if( $this->isAdmin() )
			return true;
		$userProps = $this->DienstplanUserProps->find( 'first', array(
				'conditions' => array( 'user_id' => $this->Session->read('User.id') ),
			) );

		return $this->isWorker() && !empty($userProps) && $userProps['DienstplanUserProps']['contact_maintainer'] == 1;
	}

	private function isWorker()
	{
		if( $this->AccessControl->acl_check( 'system','admin' ) )
			return true;
		$userProps = $this->DienstplanUserProps->find( 'first', array(
				'conditions' => array( 'user_id' => $this->Session->read('User.id') ),
			) );

		return !empty($userProps) && $userProps['DienstplanUserProps']['dienstplan_access'] == 1;
		/*
		if( $this->AccessControl->acl_check( 'system','admin' ) )
			return true;
		*/
		//return $this->AccessControl->acl_check( 'webmoduls', 'access', 'dienstplan', $this->webmodul_id );
	}

	private function canViewHourOverview()
	{
		if( $this->AccessControl->acl_check( 'system','admin' ) )
			return true;
		$userProps = $this->DienstplanUserProps->find( 'first', array(
				'conditions' => array( 'user_id' => $this->Session->read('User.id') ),
			) );

		return !empty($userProps) && $userProps['DienstplanUserProps']['hour_overview_access'] == 1;
	}

	private function adminOnly()
	{
		if( !$this->AccessControl->authenticated )
		{
			$this->AccessControl->authenticate();
		}else
		{
			if( !$this->isAdmin() )
				$this->redirect('/');
		}
	}

	private function contactMaintainerOnly()
	{
		if( !$this->AccessControl->authenticated )
		{
			$this->AccessControl->authenticate();
		}else
		{
			if( !$this->isContactMaintainer() )
				$this->redirect('/');
		}
	}

	private function workerOnly()
	{
		if( !$this->AccessControl->authenticated )
		{
			$this->AccessControl->authenticate();
		}else
		{
			if( !$this->isAdmin() && !$this->isWorker() )
			{
				$this->redirect('/');
			}
		}
	}

	private function hourOverviewAccessOnly()
	{
		if( !$this->AccessControl->authenticated )
		{
			$this->AccessControl->authenticate();
		}else
		{
			if( !$this->canViewHourOverview() )
			{
				$this->redirect('/');
			}
		}
	}

	public function change_wid()
	{
		if( !$this->AccessControl->acl_check( 'system','admin' ) )
			$this->redirect('/');

		if( $this->request->is('post') )
		{
			$wid = intval( $this->request->data('wid') );
			$this->Session->write( 'User.DienstplanProps.adminWID', $wid );
			$this->webmodul_id = $wid;
			$this->set('success', 1);
			$this->redirect('/dienstplan/months');
		}

		$dienstplan_db = $this->Webmodul->find( 'all', array(
			'conditions' => array('modul_id' => 20)
		) );
		$dienstplan_ids = array();
		foreach( $dienstplan_db as $dienstplan )
			$dienstplan_ids[] = $dienstplan['Webmodul']['id'];
		$this->set('dienstplan_ids', $dienstplan_ids);
		$this->set('wid', $this->webmodul_id);
	}

	public function debugV()
	{
		$this->adminOnly();
		print_r( $this->Session->read() );
		if( $this->isWorker() ) echo "<p>IS WORKER</p>";
		if( $this->isSuperAdmin() ) echo "<p>IS SUPERADMIN</p>";
		if( $this->isAdmin() ) echo "<p>IS ADMIN</p>";
		if( $this->Session->read('User.DienstplanProps.is_admin') ) echo "is admin";
		if( $this->Session->read('User.DienstplanProps.is_maintainer') ) echo "is maintainer";
	}

	public function removeDoubles()
	{
		$this->adminOnly();
		$events = $this->DienstplanBooked->find('all', array('conditions' => array('wid' => $this->webmodul_id)));
		$removeTotal = 0;
		foreach($events as $event)
		{
			$equalEvents = $this->DienstplanBooked->find( 'all', array('conditions' => array(
				'wid' => $this->webmodul_id,
				'maintainer' => $event['DienstplanBooked']['maintainer'],
				'start' => $event['DienstplanBooked']['start'],
				'duration' => $event['DienstplanBooked']['duration'],
				'col' => $event['DienstplanBooked']['col']
			)) );
			$remove = count($equalEvents)-1;
			for( $i = 0; $i < $remove; $i = $i+1 )
			{
				$this->DienstplanBooked->delete($equalEvents[$i]['DienstplanBooked']['id']);
			}
			$removeTotal += $remove;
		}
		echo "".$removeTotal." Doubles removed.";
	}


	/**
	 * Der Administrator kann eine Liste aller Benutzer des Dienstplans einsehen.
	 */
	public function admin($sort=2)
	{
		$this->adminOnly();

		$order = array();
		if($sort == 1)
			$order = array(
				'DienstplanUser.vorname',
				'DienstplanUser.nachname'
			);
		if($sort == 2)
			$order = array(
				'DienstplanUser.nachname',
				'DienstplanUser.vorname'
			);
		if($sort == 3)
			$order = array(
				'DienstplanUser.email'
			);
		if($sort == 4)
			$order = array(
				'DienstplanUser.plz',
				'DienstplanUser.ort',
				'DienstplanUser.strasse',
				'DienstplanUser.hausnummer'
			);
		if($sort == 5)
			$order = array(
				'DienstplanUser.telefon'
			);
		if($sort == 6)
			$order = array(
				'DienstplanProps.pager'
			);
		if($sort == 7)
			$order = array(
				'DienstplanUser.mobil'
			);
		if($sort == 8)
			$order = array(
				'DienstplanUser.username'
			);
		if($sort == 9)
			$order = array(
				'DienstplanUser.strasse'
			);
		if($sort == 10)
			$order = array(
				'DienstplanUser.plz'
			);
		if($sort == 11)
			$order = array(
				'DienstplanUser.ort'
			);
		if($sort == 12)
			$order = array('DienstplanProps.funktion');


		$this->set('superAdmin', $this->isSuperAdmin());

		$users = $this->DienstplanUser->find('all',
			array(
				'conditions' => array(
					'DienstplanProps.wid' => $this->webmodul_id
				),
				'order' => $order
			)
		);
		$config = $this->DienstplanConfig->findById( $this->webmodul_id );
		if( !$config['DienstplanConfig']['show_passwords'] )
			foreach( $users as &$user )
			{
				if( $user['DienstplanUser']['id'] != $this->Session->read('User.id') )
					$user['DienstplanUser']['plain'] = '*******';
			}

		$this->set( 'wid', $this->webmodul_id );
		$this->set( 'users', $users );
	}
	public function admin_kontakte($sort=2)
	{
		$this->isContactMaintainer();

		$order = array();

		if($sort == 1)
			$order = array(
				'DienstplanContact.vorname',
				'DienstplanContact.nachname'
			);
		if($sort == 2)
			$order = array(
				'DienstplanContact.nachname',
				'DienstplanContact.vorname'
			);
		if($sort == 3)
			$order = array(
				'DienstplanContact.email'
			);
		if($sort == 4)
			$order = array(
				'DienstplanContact.plz',
				'DienstplanContact.ort',
				'DienstplanContact.strasse'
			);
		if($sort == 5)
			$order = array(
				'DienstplanContact.telefon'
			);
		if($sort == 6)
			$order = array(
				'DienstplanContact.telefon_priv'
			);
		if($sort == 7)
			$order = array(
				'DienstplanContact.mobil'
			);
		if($sort == 8)
			$order = array(
				'DienstplanContact.notmobil'
			);
		if($sort == 9)
			$order = array(
				'DienstplanContact.strasse'
			);
		if($sort == 10)
			$order = array(
				'DienstplanContact.plz'
			);
		if($sort == 11)
			$order = array(
				'DienstplanContact.ort'
			);
		if($sort == 12)
			$order = array('DienstplanContact.funktion');

		$this->set('superAdmin', $this->isSuperAdmin());

		$contacts = $this->DienstplanContact->find('all',
			array(
				'conditions' => array(
					'DienstplanContact.wid' => $this->webmodul_id
				),
				'order' => $order
			)
		);

		$this->set( 'wid', $this->webmodul_id );
		$this->set( 'contacts', $contacts );
	}

	public function createContact()
	{
		$this->isContactMaintainer();
		if(!empty($this->data))
		{
			$data = $this->data;
			$data['DienstplanContact']['wid'] = $this->webmodul_id;
			if(!$this->DienstplanContact->save($data))
			{
				$this->Session->setFlash('Fehler: Der Datensatz konnte nicht angelegt werden.');
			} else
			{
				$this->redirect('/dienstplan/admin_kontakte');
			}
		}
	}

	public function deleteVacation($id=null)
	{
		$this->workerOnly();
		$v = null;
		if($id)
		{
			$v = $this->DienstplanVacation->findById($id);
			if( $v['DienstplanVacation']['wid'] == $this->webmodul_id )
			{
				if( $this->isAdmin() || $this->Session->read('User.id') ==
											$v['DienstplanVacation']['user_id'] )
					$this->DienstplanVacation->delete($id);
			}
		}
		$this->redirect('/dienstplan/vacation/'.$v['DienstplanVacation']['user_id']);
	}

	public function vacation($uid=null)
	{
		$this->workerOnly();
		$users = $this->DienstplanUser->find('all', array(
			'conditions' => array(
				'DienstplanProps.wid' => $this->webmodul_id
			),
			'order' => array(
				'DienstplanUser.nachname',
				'DienstplanUser.vorname'
			)
		));
		if($this->isAdmin())
		{
			$this->set('users', $users);
		}
		if(!$this->isAdmin() || $uid == null)
		{
			$uid = $this->Session->read('User.id');
		} else
		{
			$validUid = false;
			foreach( $users as $user )
			{
				if( $uid == $user['DienstplanUser']['id'] )
				{
					$validUid = true;
					break;
				}
			}
			if(!$validUid)
				$uid = $this->Session->read('User.id');
		}
		$this->set('uid',$uid);
		$errors = array();

		if( !empty($this->data) )
		{
			$vacation = $this->data;
			$pStart = DateTime::createFromFormat('d.m.Y', $vacation['DienstplanVacation']['start']);
			$pEnd = DateTime::createFromFormat('d.m.Y', $vacation['DienstplanVacation']['end']);
			if($pStart->getTimestamp() > $pEnd->getTimestamp())
			{
				$t = $pStart;
				$pStart = $pEnd;
				$pEnd = $t;
			}
			$pStart->setTime(0 ,0, 0);
			$pEnd->setTime(23, 59, 59);
			$vacation['DienstplanVacation']['start'] = $pStart->getTimestamp();
			$vacation['DienstplanVacation']['end'] = $pEnd->getTimestamp();

			$vacation['DienstplanVacation']['user_id'] = $uid;
			$vacation['DienstplanVacation']['wid'] = $this->webmodul_id;
			$duration = $vacation['DienstplanVacation']['end'] - $vacation['DienstplanVacation']['start'];
			$vacation['DienstplanVacation']['duration'] = $duration;


			// echo '<pre>';
			// print_r($vacation);
			// var_dump($this->DienstplanVacation->isBookable($vacation));
			// echo '</pre>';
			// die;


			// if( !$this->DienstplanVacation->mergeWithExisting($vacation) )
			// 	$errors[] = 'Urlaub/Auszeit konnte nicht gespeichert werden';
			// else
			// {
			// 	$this->data = array();
			// }

			if( !$this->DienstplanVacation->isBookable($vacation) )
			{
				$errors[] = 'Bei der gew&auml;hlten Urlaubszeit kommt es zu &Uuml;berschneidungen mit bereits gebuchten Bereitschaftszeiten.';
			} else
			{
				if( !$this->DienstplanVacation->mergeWithExisting($vacation) )
					$errors[] = 'Abwesenheit konnte nicht gespeichert werden';
				else
				{
					$this->data = array();
				}
			}
		}

		// get vacations
		$vacations = $this->DienstplanVacation->find('all', array(
			'conditions' => array(
				'wid' => $this->webmodul_id,
				'user_id' => $uid,
				'type' => 0,
				'end >' => time()
			),
			'order' => array(
				'start ASC',
				'end ASC'
			)
		));
		// get outtimes
		$outtimes = $this->DienstplanVacation->find('all', array(
			'conditions' => array(
				'wid' => $this->webmodul_id,
				'user_id' => $uid,
				'type' => 1,
				'end >' => time()
			),
			'order' => array(
				'start ASC',
				'end ASC'
			)
		));
		// get fortbildungs
		$fortbildungs = $this->DienstplanVacation->find('all', array(
			'conditions' => array(
				'wid' => $this->webmodul_id,
				'user_id' => $uid,
				'type' => 2,
				'end >' => time()
			),
			'order' => array(
				'start ASC',
				'end ASC'
			)
		));
		// get kranks
		$kranks = $this->DienstplanVacation->find('all', array(
			'conditions' => array(
				'wid' => $this->webmodul_id,
				'user_id' => $uid,
				'type' => 3,
				'end >' => time()
			),
			'order' => array(
				'start ASC',
				'end ASC'
			)
		));
		// get Sonstiges
		$sonstiges = $this->DienstplanVacation->find('all', array(
			'conditions' => array(
				'wid' => $this->webmodul_id,
				'user_id' => $uid,
				'type' => 4,
				'end >' => time()
			),
			'order' => array(
				'start ASC',
				'end ASC'
			)
		));

		$this->includeJs('jquery/jquery1.10.2/jquery');
		$this->includeJs('jquery/ui-1.11.4/jquery-ui.min');
		$this->includeCss('jquery/jquery-ui-1.11.4.custom/jquery-ui.min');
		$this->includeCss('jquery/jquery-ui-1.11.4.custom/jquery-ui.structure.min');
		$this->includeCss('jquery/jquery-ui-1.11.4.custom/jquery-ui.theme.min');
		$this->includeCss('dienstplan_vacation');
		$this->set('vacations', $vacations);
		$this->set('outtimes', $outtimes);
		$this->set('fortbildungs', $fortbildungs);
		$this->set('kranks', $kranks);
		$this->set('sonstiges', $sonstiges);
		$this->set('errors', $errors);
	}

	public function queryVacation($from=false, $to=false)
	{
		$this->layout=false;
		$this->workerOnly();
		$pStart = DateTime::createFromFormat('d.m.Y', $from);
		$pEnd = DateTime::createFromFormat('d.m.Y', $to);
		if($pStart > $pEnd)
		{
			$tmp = $pStart;
			$pStart = $pEnd;
			$pEnd = $tmp;
		}
		if(!$pStart)
		{
			$pStart = new DateTime();
		}
		if(!$pEnd)
		{
			$pEnd = clone $pStart;
			$pEnd->add(new DateInterval('P31D'));
		}
		$pStart->setTime(0 ,0, 0);
		$pEnd->setTime(23, 59, 59);
		$start = $pStart->getTimestamp();
		$end = $pEnd->getTimestamp();
		$this->Paginator->settings = array(
			'conditions' => array(
				'wid' => $this->webmodul_id,
				'NOT' => array(
					'OR' => array(
						'end <' => $start,
						'start >' => $end
					)
				)
			),
			'order' => array(
				'start' => 'ASC',
				'DienstplanUser.nachname' => 'ASC',
				'DienstplanUser.vorname' =>  'ASC'
			),
			'limit' => $this->DienstplanVacation->find('count')
		);
		$res = $this->Paginator->paginate('DienstplanVacation');

		$is_admin = ($this->isSuperAdmin() || $this->isAdmin()) ? true : false;
		$this->set('is_admin', $is_admin);
		$this->set('vacations', $res);
		$this->set('start', $start);
		$this->set('end', $end);
	}

	/**
	 * Der Administrator kann eine Liste aller Benutzer des Dienstplans einsehen.
	 */
	public function user_view($sort=2)
	{
		$this->workerOnly();

		$order = array();
		$order2 = array();
		if($sort == 1)
			$order = array(
				'DienstplanUser.vorname',
				'DienstplanUser.nachname'
			);
		if($sort == 2)
			$order = array(
				'DienstplanUser.nachname',
				'DienstplanUser.vorname'
			);
		if($sort == 3)
			$order = array(
				'DienstplanUser.email'
			);
		if($sort == 4)
			$order = array(
				'DienstplanUser.plz',
				'DienstplanUser.ort',
				'DienstplanUser.strasse',
				'DienstplanUser.hausnummer'
			);
		if($sort == 5)
			$order = array(
				'DienstplanUser.telefon'
			);
		if($sort == 6)
			$order = array(
				'DienstplanProps.pager'
			);
		if($sort == 7)
			$order = array(
				'DienstplanUser.mobil'
			);
		if($sort == 12)
			$order = array('DienstplanProps.funktion');



		$this->set( 'users', $this->DienstplanUser->find('all',
			array(
				'conditions' => array(
					'DienstplanProps.wid' => $this->webmodul_id,
					'DienstplanProps.dienstplan_access' => 1
				),
				'order' => $order
			)
		) );

		$this->set( 'contacts', $this->DienstplanUser->find('all',
			array(
				'conditions' => array(
					'DienstplanProps.wid' => $this->webmodul_id,
					'DienstplanProps.dienstplan_access' => 1
				),
				'order' => $order
			)
		) );
	}

	private function usernameAllreadyInAnyDienstplanModule( $username, $ignoid=null )
	{
		$modul = $this->Modul->find('first', array( 'conditions' => array('model' => 'dienstplan') ));
		if( $modul )
		{
			$mid = $modul['Modul']['id'];
			// find webmodul ids
			$webmoduls = $this->Webmodul->find( 'all', array('conditions' => array( 'modul_id' => $mid )) );
			foreach( $webmoduls as $webmodul )
			{
				$fid = $webmodul['Webmodul']['firma_id'];
				$users = $this->User->find( 'all', array( 'conditions' => array( 'firma_id' => $fid, 'username' => $username ) ) );
				if( !empty($users) )
					if(!$ignoid)
						return true;
					else
					{
						foreach( $users as $user )
							if( $user['User']['id'] != $ignoid )
								return true;
					}
			}
		}
		return false;
	}

	private function nachsorgeAccessAdmin($user)
	{
		$config = $this->DienstplanConfig->findById($this->webmodul_id);
		$firma = $this->Firma->findById($this->firma_id);
		$isNachsorge = $isNachsorge | $this->AccessControl->getGacl()->acl_check( 'webmoduls', 'config',
        					$firma['Firma']['section'], $user['DienstplanUser']['username'],
       		 				'aktuell', $config['DienstplanConfig']['akt_intern_2'] );
       	return $isNachsorge;
	}

	private function nachsorgeAccessNormal($user)
	{
		$config = $this->DienstplanConfig->findById($this->webmodul_id);
		$firma = $this->Firma->findById($this->firma_id);
		$isNachsorge = $isNachsorge | $this->AccessControl->getGacl()->acl_check( 'webmoduls', 'access',
        					$firma['Firma']['section'], $user['DienstplanUser']['username'],
       		 				'aktuell', $config['DienstplanConfig']['akt_intern_2'] );
       	return $isNachsorge;
	}

	private function nachsorgeAccess($user)
	{
        return $this->nachsorgeAccessAdmin($user) | $this->nachsorgeAccessNormal($user);
	}

	private function setWebmodulsAccess( $user )
	{
		$config = $this->DienstplanConfig->findById($this->webmodul_id);
		if( $config['DienstplanConfig']['akt_intern'] != 0 )
		{
			if( $user['DienstplanUserProps']['is_maintainer'] || $user['DienstplanUserProps']['is_admin'] )
			{
				$this->AccessControl->addAcl( $user['DienstplanUser']['id'],
														'webmoduls',
														'config',
														$config['DienstplanConfig']['akt_intern'] );
			}
			$this->AccessControl->addAcl( $user['DienstplanUser']['id'],
													'webmoduls',
													'access',
													$config['DienstplanConfig']['akt_intern'] );

		}
		if( $config['DienstplanConfig']['akt_intern_allg'] != 0 )
		{
			if( $user['DienstplanUserProps']['is_maintainer'] || $user['DienstplanUserProps']['is_admin'] )
			{
				$this->AccessControl->addAcl( $user['DienstplanUser']['id'],
														'webmoduls',
														'config',
														$config['DienstplanConfig']['akt_intern_allg'] );
			}
			$this->AccessControl->addAcl( $user['DienstplanUser']['id'],
													'webmoduls',
													'access',
													$config['DienstplanConfig']['akt_intern_allg'] );
		}
		if( $config['DienstplanConfig']['simplemessages'] != 0 )
		{
			if( $user['DienstplanUserProps']['is_maintainer'] || $user['DienstplanUserProps']['is_admin'] )
			{
				$this->AccessControl->addAcl( $user['DienstplanUser']['id'],
														'webmoduls',
														'config',
														$config['DienstplanConfig']['simplemessages'] );
			}
			$this->AccessControl->addAcl( $user['DienstplanUser']['id'],
													'webmoduls',
													'access',
													$config['DienstplanConfig']['simplemessages'] );
		}
	}

	private function removeWebmodulsAccess( $user )
	{
		$config = $this->DienstplanConfig->findById($this->webmodul_id);
		$firma = $this->Firma->findById($this->firma_id);
		$gacl = new gacl_api();
		foreach ($gacl->search_acl(false, false,
			        					$firma['Firma']['section'],
			        					 $user['DienstplanUser']['username'], false, false, false, false) as $acl_id)
		{
			$acl = $gacl->get_acl($acl_id);
			if( isset($acl['axo']['aktuell']) && ($acl['axo']['aktuell'][0] == $config['DienstplanConfig']['akt_intern'] ||
				$acl['axo']['aktuell'][0] == $config['DienstplanConfig']['akt_intern_allg']) )
			{
				$gacl->del_acl( $acl_id );
			}
			if( isset($acl['axo']['simplemessages']) && $acl['axo']['simplemessages'][0] == $config['DienstplanConfig']['simplemessages'] )
			{
				$gacl->del_acl( $acl_id );
			}
		}
	}

	private function setNachsorgeAccess( $user )
	{
		$config = $this->DienstplanConfig->findById($this->webmodul_id);
		$firma = $this->Firma->findById($this->firma_id);
		if( $config['DienstplanConfig']['akt_intern_2'] == 0 )
		{
			return;
		}
		if( ($user['DienstplanUserProps']['is_maintainer'] || $user['DienstplanUserProps']['is_admin']) &&
			!$this->nachsorgeAccessAdmin($user) )
		{
			$this->AccessControl->addAcl( $user['DienstplanUser']['id'],
						    						'webmoduls',
						    						'config',
						    						$config['DienstplanConfig']['akt_intern_2'] );
		}
		if( !$this->nachsorgeAccessNormal($user) )
			$this->AccessControl->addAcl( $user['DienstplanUser']['id'],
													'webmoduls',
													'access',
													$config['DienstplanConfig']['akt_intern_2'] );
	}

	private function removeNachsorgeAccess( $user )
	{
		$config = $this->DienstplanConfig->findById($this->webmodul_id);
		$firma = $this->Firma->findById($this->firma_id);
		$gacl = new gacl_api();
		if( $config['DienstplanConfig']['akt_intern_2'] == 0 )
		{
			return;
		}
		foreach ($gacl->search_acl(false, false,
			        					$firma['Firma']['section'],
			        					 $user['DienstplanUser']['username'], false, false, false, false) as $acl_id)
		{
			$acl = $gacl->get_acl($acl_id);
			if( isset($acl['axo']['aktuell']) && $acl['axo']['aktuell'][0] == $config['DienstplanConfig']['akt_intern_2'] )
			{
				$gacl->del_acl( $acl_id );
			}
		}
	}

	/*
	 * Legt einen neuen DienstplanUser an
	 */
	public function createUser()
	{
		$this->adminOnly();
		if( $this->request->is('post') )
		{
			$data = $this->request->data;
			// Weitere Benutzerinformationen hinzufügen
			$data['DienstplanUser']['firma_id'] = $this->firma_id;

			$data['DienstplanUser']['is_maintainer'] = 0;
			if( !$this->isSuperAdmin() )
			{
				$data['DienstplanUser']['is_admin'] = 0;
				unset($data['DienstplanUser']['hour_overview_access']);
			}
			if( $this->usernameAllreadyInAnyDienstplanModule( $data['DienstplanUser']['username'] ) )
			{
				$this->Session->setFlash('Fehler: Benutzername existiert bereits.');
				$this->DienstplanUser->validationErrors['username'] = 'Benutzername existiert bereits';
			} else
			{
				$userID = $this->addUserToGACL();
				if( $userID )
				{

					$this->DienstplanUser->create();
					$data['DienstplanUser']['id'] = $userID;
					$data['DienstplanUser']['email_confirmed'] = 1;
					if( $this->DienstplanUser->save( $data ) )
					{
						$data['DienstplanUserProps']['wid'] = $this->webmodul_id;
						$data['DienstplanUserProps']['user_id'] = $data['DienstplanUser']['id'];

						$this->DienstplanUserProps->create();
						if( $this->DienstplanUserProps->save( $data ) )
						{
							$this->setWebmodulsAccess($data);
							if( $data['DienstplanUser']['nachsorge_access'] )
							{
								$this->setNachsorgeAccess($data);
							}
							$this->Session->setFlash( 'Benutzer angelegt' );
							$this->redirect( '/dienstplan/admin' );
						} else
						{
							$this->User->delete( $data['DienstplanUser']['id'] );
						}
					} else
					{
						$this->deleteUserFromGACL( $data['DienstplanUser']['username'] );
						$this->User->delete( $data['DienstplanUser']['id'] );
						$this->Session->setFlash('Benutzer konnte nicht angelegt werden.');
					}
				} else
				{
					$this->Session->setFlash( 'Fehlgeschlagen! Sollte dieses Problem weiterhin bestehen wenden sie sich an den Administrator.' );
					$this->redirect( '/dienstplan/admin' );
				}
			}
		}
		$this->set('superAdmin', $this->isSuperAdmin());
	}

	/*
	 * Legt einen neuen DienstplanUser an
	 */
	public function editUser( $id = null )
	{
		$config = $this->DienstplanConfig->findById( $this->webmodul_id );
		if( $id != $this->Session->read('User.id') )
			$this->adminOnly();
		else
		{
			if( !$config['DienstplanConfig']['editable_profile'] )
				$this->redirect('/dienstplan/viewUser/'.$id);
			$this->workerOnly();
		}

		if( $this->request->is('post') )
		{
			$old_user = $this->DienstplanUser->findById($id);
			$data = $this->request->data;
			$data['DienstplanUser']['is_maintainer'] = 0;
			if( !$this->isSuperAdmin() )
			{
				$data['DienstplanUser']['is_admin'] = 0;
				unset($data['DienstplanUser']['hour_overview_access']);
			}
			if( $this->usernameAllreadyInAnyDienstplanModule( $data['DienstplanUser']['username'], $id ) )
			{
				$this->Session->setFlash('Fehler: Benutzername existiert bereits.');
			} else
			{
				$props = $this->DienstplanUserProps->find( 'first', array( 'conditions' => array( 'user_id' => $id ) ) );

				$data['DienstplanUser']['id'] = $id;
				$data['DienstplanUserProps']['id'] = $props['DienstplanUserProps']['id'];
				$data['DienstplanUserProps']['wid'] = $this->webmodul_id;
				$data['DienstplanUserProps']['user_id'] = $id;
				$data['DienstplanUser']['credential'] = $this->AccessControl->hash( $data['DienstplanUser']['plain'] );

				// check for username change
				$changedUsernameSafe = true;
				if($old_user['DienstplanUser']['username'] != $data['DienstplanUser']['username'])
				{
					$firma = $this->Firma->findById($this->firma_id);
					$changedUsernameSafe = $this->AccessControl->aclUserChangeAro($firma['Firma']['section'],
						$old_user['DienstplanUser']['username'] , $data['DienstplanUser']['username'], $id );
				}

				//$this->DienstplanUser->id = $id;
				if( $changedUsernameSafe && $this->DienstplanUser->save( $data ) && $this->DienstplanUserProps->save( $data ) )
				{
					$this->removeWebmodulsAccess($data);
					$this->removeNachsorgeAccess($data);
					$this->setWebmodulsAccess($data);
					if( $data['DienstplanUser']['nachsorge_access'] )
					{
						$this->setNachsorgeAccess($data);
					}
					$this->Session->setFlash( 'Die Daten wurden erfolgreich &uuml;bernommen' );
					if($id == $this->Session->read('User.id') &&
						$old_user['DienstplanUser']['username'] != $data['DienstplanUser']['username'])
					{
						$this->AccessControl->logout();
						$this->redirect('/');
					}
					if($this->isAdmin())
						$this->redirect( '/dienstplan/admin' );
					else
						$this->redirect('/dienstplan/viewUser/'.$id);
				} else
				{
					$this->Session->setFlash( 'Einige Daten konnten nicht &uuml;bernommen werden.' );
				}
			}
		}

		$user = $this->DienstplanUser->findById($id);
		$firma = $this->Firma->findById($this->firma_id);


		$this->set('user', $user);
		$this->set('isNachsorge', $this->nachsorgeAccess($user));
		$this->set('superAdmin', $this->isSuperAdmin());
	}

	public function deleteContact($id = null)
	{
		$this->contactMaintainerOnly();
		if(id==null)
			$this->redirect('/');
		$user = $this->DienstplanContact->findById($id);
		if(empty($user) || $user['DienstplanContact']['wid']!=$this->webmodul_id)
			$this->redirect('/');

		$this->DienstplanContact->delete($id);
		$this->redirect('/dienstplan/admin_kontakte');
	}

	public function editContact( $id = null )
	{
		$this->contactMaintainerOnly();
		$user = $this->DienstplanContact->findById($id);
		if(empty($user) || $user['DienstplanContact']['wid']!=$this->webmodul_id)
			$this->redirect('/');

		$contact = $this->DienstplanContact->findById($id);
		$this->set('contact',$contact);

		if( $this->request->is('post') )
		{
			$data = $this->request->data;
			$data['DienstplanContact']['id'] = $id;
			//$this->DienstplanUser->id = $id;
			if( !$this->DienstplanContact->save($data) )
			{
				die('error');
				$this->Session->setFlash( 'Die Daten konnten nicht &uuml;bernommen werden.' );
			} else
			{
				$this->redirect('/dienstplan/admin_kontakte');
			}
		}
	}

	public function viewUser( $id=NULL )
	{
		if( $id != $this->Session->read('User.id') )
			$this->adminOnly();
		else
			$this->workerOnly();
		if( $id )
		{
			$this->set('user', $this->DienstplanUser->findById($id));
		}
	}

	public function deleteUser( $id=NULL )
	{
		$this->adminOnly();
		if( $id != NULL )
		{
			$du = $this->DienstplanUser->findById( $id );
			if( !$du )
			{
				$this->Session->setFlash( 'Benutzer, der gelöscht werden soll, wurde nicht gefunden.' );
				$this->redirect( '/dienstplan/admin' );
			}

			$username = $du['DienstplanUser']['username'];
			$this->deleteUserFromGACL( $username );

			$userProps = $this->DienstplanUserProps->find( 'first', array( 'conditions' => array( 'user_id' => $du['DienstplanUser']['id'] ) ) );

			$this->DienstplanUserProps->delete( $userProps['DienstplanUserProps']['id'] );

			$this->User->delete( $du['DienstplanUser']['id'] );
			$this->DienstplanBooked->deleteAll( array('maintainer' => $du['DienstplanUser']['id']) );

			$this->Session->setFlash( 'Der Benutzer wurde erfolgreich entfernt.' );
			$this->redirect( '/dienstplan/admin' );
		}
	}

	/*
	 * Fügt die Benutzerdaten, die mittels POST übertragen wurden, zu
	 * GACL hinzu.
	 */
	private function addUserToGACL()
	{
		$username = $this->data['DienstplanUser']['username'];
		$pw = $this->data['DienstplanUser']['password'];
		$firma_section = $this->User->Firma->field( 'section', array( 'id' => $this->firma_id) );
		$id = $this->AccessControl->addUser( $firma_section, $username, $pw);
		if( $id )
		{
			/*
			$this->AccessControl->addAcl( intval($id),
		        'webmoduls', 'access', $this->webmodul_id );
			*/
			return intval($id);
		}
		return false;
	}

	/**
	 * Löschen GACL-Daten eines Benutzers
	 */
	private function deleteUserFromGACL( $username )
	{
		$firma_section = $this->User->Firma->field( 'section', array( 'id' => $this->firma_id) );
		$gacl = new gacl_api();
		$aro_id = $gacl->get_object_id( $firma_section, $username, 'aro');
		$gacl->del_object( $aro_id, 'aro', true );
	}

	public function week( $date = null )
	{
		$this->workerOnly();
		$this->importJSForWeekView();

		$Webmodul = new Webmodul();
		$Webmodul->id = $this->webmodul_id;
		$webmodul = $Webmodul->read();
		$this->set('webmodulData', $webmodul);

		$time = null;
        if( $date === null ) {
            $time = time();
        } else {
            try {
                $zdate = new DateTime( $date );
                $time = $zdate->getTimestamp();
            } catch (Exception $e) {
                $time = time();
            }
        }

        $kw = date('W', $time);
        $year = date('Y', $time);


        $intTime = $from = strtotime( 'midnight', strtotime('monday this week', $time) );

		// Buchbare Bereiche und Termine für diese Woche auslesen
		$lastTime = strtotime('midnight', strtotime('monday next week', $time));
		$booked = $this->DienstplanBooked->find( 'all', array( 'conditions' => array(
			'wid' => $this->webmodul_id,
			'OR' => array(
				array(
					'start >=' => $intTime,
					'start <' => $lastTime
				),
				array(
					'end >=' => $intTime,
					'end <' => $lastTime
				)
			)
		) ) );
		$this->set( 'booked', $booked );
		// Urlaubszeiten für diese Woche auslesen
		$vacations = $this->DienstplanVacation->find('all', array(
			'fields' => array(
				'DienstplanUser.nachname',
				'DienstplanUser.vorname',
				'start',
				'end',
				'type'
			),
			'conditions' => array(
				'wid' => $this->webmodul_id,
				'end >=' => time()
			),
			'order'=> array(
				'start',
				'end',
				'DienstplanUser.nachname',
				'DienstplanUser.vorname'
			)));
		$this->set('vacations', $vacations);

		$lastWeek = strtotime( 'midnight', strtotime('monday last week', $time) );
		// String für vor/zurück setzen
        $date_next = date('Y-m-d', $lastTime);
        $date_prev = date('Y-m-d', $lastWeek);

		$this->set( 'kw', $kw);
		$this->set( 'year', $year);
		$this->set( 'date_next', $date_next );
		$this->set( 'date_prev', $date_prev );
		$this->set( 'intTime', $intTime );

		// Spalten-Daten aus der Datenbank parsen und an
		// View weiterreichen
		$config = $this->DienstplanConfig->findById( $this->webmodul_id );
		$jobs = array();
		if( $config['DienstplanConfig']['col_a'] == 1 )
		{
			if( $this->webmodul_id == 441 )
				$jobs[] = array(0, 'A');
			else
				$jobs[] = array(0, 'A');
		}
		if( $config['DienstplanConfig']['col_b'] == 1 )
		{
			if( $this->webmodul_id == 441 )
				$jobs[] = array(1, 'B');
			else
				$jobs[] = array(1, 'B');
		}
		if( $config['DienstplanConfig']['col_c'] == 1 )
		{
			if( $this->webmodul_id == 441 )
				$jobs[] = array(2, 'C');
			elseif($this->webmodul_id == 442)
				$jobs[] = array(2, 'H');
			else
				$jobs[] = array(2, 'H');
		}
		if( $config['DienstplanConfig']['col_d'] == 1 )
		{
			if( $this->webmodul_id == 441 )
				$jobs[] = array(3, 'H');
			else if($this->webmodul_id == 442)
				$jobs[] = array(3, 'D');
			else
				$jobs[] = array(3, 'S');
		}
		$this->set( 'jobs', $jobs );

		$this->set( 'mode', 'book' );
		if( $this->isAdmin() )
		{
			$this->set( 'mode', 'set' );
			$this->set( 'is_admin', 1 );
		}

		$this->set( 'timeAtom', $config['DienstplanConfig']['dienst_time_h'] );
		$this->set( 'delete_mode', $config['DienstplanConfig']['delete_mode'] );
		$this->set( 'delete_border', $config['DienstplanConfig']['delete_border'] );
		$this->set( 'delete_date', $config['DienstplanConfig']['delete_date'] );
		$this->set( 'dienstmode', $config['DienstplanConfig']['dienstmode'] );
		$this->set( 'startCycle24', $config['DienstplanConfig']['start_cycle_24h'] );
		$this->set( 'midCycle24', $config['DienstplanConfig']['mid_cycle_24h'] );
		$this->set( 'apply_week', $config['DienstplanConfig']['apply_week'] );
		$this->set( 'bergstrasse_special', $this->webmodul_id == 441 );

		// Liste mit Benutzern und id ans View weiterreichen

		$user = $this->DienstplanUser->find( 'all', array(
			'fields' => array(
				'DienstplanUser.id',
				'DienstplanUser.vorname',
				'DienstplanUser.nachname',
				'DienstplanUser.telefon',
				'DienstplanUser.mobil',
				'DienstplanProps.is_maintainer',
				'DienstplanProps.pager'
			),
			'conditions' => array(
				'DienstplanProps.wid' => $this->webmodul_id
			),
			'order' => array(
				'DienstplanUser.nachname',
				'DienstplanUser.vorname'
			)
		) );

		$this->set( 'users', $user );
		$this->set( 'userID', $this->Session->read('User.id') );

		$is_admin = ($this->isSuperAdmin() || $this->isAdmin()) ? true : false;
		$this->set('is_admin', $is_admin);
	}

	private function splitEventsByDays( $eventsRaw, $startStamp=null, $endStamp=null )
	{
		$events = array();
		// events, die über mehrere Tage gehen
		// werden in mehrere events zerlegt
		foreach( $eventsRaw as $event )
		{
			if( date( 'z', $event['DienstplanBooked']['start'] ) !=
				date( 'z', $event['DienstplanBooked']['end'] ) )
			{
				$currentDate = new DateTime();
				$endDate = new DateTime();
				$currentDate->setTimestamp($event['DienstplanBooked']['start']);
				$endDate->setTimestamp($event['DienstplanBooked']['end']);
				do
				{
					$nextDayStart = new DateTime();
					$nextDayStart->setTimestamp($currentDate->getTimestamp());
					$nextDayStart->modify('+1 day');
					$nextDayStart->setTime(0, 0);

					$newEvent = $event;
					$newEvent['DienstplanBooked']['start'] = $currentDate->getTimestamp();
					if( $nextDayStart->getTimestamp() < $endDate->getTimestamp() ) {
						$newEvent['DienstplanBooked']['end'] = $nextDayStart->getTimestamp();
					}
					$newEvent['DienstplanBooked']['duration'] =
						$newEvent['DienstplanBooked']['end']-$newEvent['DienstplanBooked']['start'];

					if( !$startStamp || !$endStamp )
					{
						$events[] = $newEvent;
					} else
					{
						if( $newEvent['DienstplanBooked']['start'] >= $startStamp &&
							$newEvent['DienstplanBooked']['end'] <= $endStamp )
							$events[] = $newEvent;
					}
					$currentDate->setTimestamp($nextDayStart->getTimestamp());
				} while( $currentDate->getTimestamp() < $endDate->getTimestamp() );
			} else
			{
				if( !$startStamp || !$endStamp )
				{
					$events[] = $newEvent;
				} else
				{
					if( $event['DienstplanBooked']['start'] >= $startStamp &&
							$event['DienstplanBooked']['end'] <= $endStamp )
						$events[] = $event;
				}
			}
		}
		return $events;
	}

	public function months($startDate=null)
	{
		$this->workerOnly();
        $this->includeCss('sokudi/color');
        $this->includeCss('jquery/jquery-jcal-dienstplan');
        $this->includeJs('jquery/jquery-1.3.2');
        $this->includeJs('jquery/jquery-jcal');
        $this->includeJs('jquery/jquery-jcal-dienstplan');
        $this->includeJs('bookmarkbubble/iphone/bookmark_bubble');

		$config = $this->DienstplanConfig->find('first', array( 'conditions' => array( 'id' => $this->webmodul_id ) ));
		$numCols = 0;
		if( $config['DienstplanConfig']['col_a'] == 1 )
			$numCols++;
		if( $config['DienstplanConfig']['col_b'] == 1 )
			$numCols++;
		if( $config['DienstplanConfig']['col_c'] == 1 )
			$numCols++;
		if( $config['DienstplanConfig']['col_d'] == 1 )
			$numCols++;

        if ( ! empty($startDate)) {
        	$startTime = strtotime( 'first day of this month', strtotime($startDate) );
        } else {
        	$startTime = strtotime( 'first day of this month', strtotime( 'midnight', time() ));
        }

		$from = $startTime;
		$to = strtotime('+5 month', $from)-1;
        $this->set('start', $from);

		$config = $this->DienstplanConfig->find('first', array( 'conditions' => array( 'id' => $this->webmodul_id ) ));

		// START freie Zeiten berechnen
		$completeBooked = array();
		$mostlyBooked = array();
		for( $actual = $from; $actual < $to; $actual = strtotime('+1 day', $actual) )
		{
			$startStamp = $actual;
			$endStamp = strtotime( '+1 day', $actual );
			$conds = array(
				'OR' => array(
					array(
						'OR' => array(
							array(
								array('start >=' => $startStamp),
								array('start <=' => $endStamp)
							),
							array(
								array('end >=' => $startStamp),
								array('end <=' => $endStamp)
							)
						)
					),
					array(
						array('start <=' => $startStamp),
						array('end >=' => $endStamp)
					)
				),
				'wid' => $this->webmodul_id
			);
			$booksForDayRaw = $this->DienstplanBooked->find( 'all', array(
				'conditions' => $conds
			) );
			$booksForDay = $this->splitEventsByDays($booksForDayRaw, $startStamp, $endStamp);
			$durationSum = 0;
			foreach($booksForDay as $event)
			{
				$durationSum += $event['DienstplanBooked']['duration'];
			}


			if( $durationSum > 0 )
			{
				if( $durationSum >= 24*60*60*$numCols )
					$completeBooked[] = $actual;
				else if( $durationSum > 0 )
					$mostlyBooked[] = $actual;
			}
		}
		// END freie Zeiten berechnen

		$this->set('completeBooked', $completeBooked);
        $this->set('mostlyBooked', $mostlyBooked);
		$this->set('wid', $this->webmodul_id);
    }

	private function importJSForWeekView()
	{
		$this->set('importSokudiWeekJsTool', true);
		$this->includeCss( 'sokudi/style' );
		$this->includeCss( 'sokudi/color' );
		$this->includeCss( 'MessageBox' );

		$this->includeCss( 'jquery/custom-theme/jquery-ui-1.8rc3.custom');
		$this->includeCss( 'jquery/jquery-dienstplan-week-min' );

		$this->includeJs('jquery/1.5.1/jquery');
		$this->includeJs('jquery/1.5.1/ui.core');
		$this->includeJs('jquery/1.5.1/ui.widget');
		$this->includeJs('jquery/1.5.1/ui.button');
		$this->includeJs('jquery/1.5.1/ui.mouse');
		$this->includeJs('jquery/1.5.1/ui.resizable');
		$this->includeJs('jquery/1.5.1/ui.draggable');
		$this->includeJs('jquery/1.5.1/ui.droppable');
		$this->includeJs('jquery/1.5.1/ui.selectable');
		$this->includeJs('jquery/1.5.1/ui.position');
		$this->includeJs('jquery/1.5.1/ui.dialog');
		$this->includeJs('jquery/1.5.1/ui.progressbar');
		$this->includeJs('jquery/1.5.1/ui.tabs');
		$this->includeJs('jquery/1.5.1/effect.core');
		$this->includeJs('jquery/1.5.1/effect.clip');
		$this->includeJs('jquery/1.5.1/effect.pulsate');
		$this->includeJs('jquery/jquery-dienstplan-week-min');
		$this->includeJs('jquery/jquery.mobile.custom.min');
	}

	public function add_bookable()
	{
		$this->workerOnly();
		if( $this->RequestHandler->isAjax() )
		{
			$this->autoRender = false;
			if( !isset($_GET['start']) || !isset($_GET['duration']) || !isset($_GET['technician']) || !isset($_GET['maintainer']) )
			{
				$this->AjaxReply->setError('Der buchbare Bereich konnte nicht angelegt werden.');
			} else
			{
				$time = intval($_GET['start']);
				$duration = intval($_GET['duration']);
				$col = intval($_GET['technician']);
				$maintainer = intval($_GET['maintainer']);

				if( !$this->isAdmin() )
					$maintainer = $this->Session->read('User.id');

				$ignoreVacation = true;
				if($this->Session->read('User.id') == $maintainer)
					$ignoreVacation = false;

				$this->DienstplanBooked->create();
				$this->DienstplanBooked->set( array(
					'wid' => $this->webmodul_id,
					'col' => $col,
					'start' => $time,
					'duration' => $duration,
					'maintainer' => $maintainer,
					'creator_id' => $this->Session->read('User.id')
				) );
				if( $this->DienstplanBooked->isBookable(false, $ignoreVacation) )
				{
					if( !$this->DienstplanBooked->save() )
					{
						$this->AjaxReply->setError('Der buchbare Bereich konnte nicht in die Datenbank übertragen werden.');
					} else
					{
						$this->AjaxReply->setData(array(
							'id' => intval($this->DienstplanBooked->getLastInsertId()),
							'maintainer' => intval($maintainer),
						));
					}
				} else
				{
					$this->AjaxReply->setError('Es kam zu Überschneidungen mit anderen Bereitschafts- oder Urlaubszeiten. Die Bereitschaftszeit wurde nicht angelegt.');
				}
			}
            $this->AjaxReply->output(false);
		}
		die();
	}

	public function del_bookable()
	{
		$this->workerOnly();
		if( $this->RequestHandler->isAjax() )
		{
			if( !isset($_GET['id']) )
			{
				$this->AjaxReply->setError('Der buchbare Bereich konnte nicht gelöscht werden.');
			} else
			{
				$db = $this->DienstplanBooked->findById( intval($_GET['id']) );
				if( $this->isAdmin() || $this->Session->read('User.id') == $db['DienstplanBooked']['maintainer'] )
				{
					if( !$this->DienstplanBooked->delete( intval($_GET['id']) ) )
					{
						$this->AjaxReply->setError('Der buchbare Bereich konnte nicht gelöscht werden.');
					}
				} else
				{
					$this->AjaxReply->setError('Keine Berechtigung.');
				}
			}
			$this->AjaxReply->output(false);
		}
		die();
	}

	public function edit_bookable()
	{
		$this->adminOnly();
		if( $this->RequestHandler->isAjax() )
		{
			if( !isset($_GET['id']) || !isset($_GET['user']) )
			{
				$this->AjaxReply->setError('Der buchbare Bereich konnte nicht bearbeitet werden.');
			} else
			{
				$this->DienstplanBooked->create();
				$this->DienstplanBooked->set( array(
					'id' => intval($_GET['id']),
					'maintainer' => intval($_GET['user']),
				) );
				if( !$this->DienstplanBooked->save() )
				{
					$this->AjaxReply->setError('Der buchbare Bereich konnte nicht in die Datenbank übertragen werden.');
				}
			}
            $this->AjaxReply->output(false);
		}
		die();
	}

	public function apply_weeks()
	{
		$this->workerOnly();

		if( $this->RequestHandler->isAjax() )
		{
			$weeks = intval($this->request->data['weeks']);
			$events = json_decode($this->request->data['json']);

			$hadCollisions = false;
			$count = 0;
			$success = 0;

			for( $i = 0; $i < $weeks; $i++ )
			{
				// add one week to every start-time
				for( $j=0; $j < count($events); $j++ )
				{
					$summer = $this->isSummerTime( $events[$j][4] );
					$events[$j][4] = $events[$j][4] + 604800;

					if( $summer == false && ( $this->isSummerTime($events[$j][4]) != $summer ) )
					{
							$events[$j][4] = $events[$j][4] - 3600;
					}
					if( $summer == true && ( $this->isSummerTime($events[$j][4]) != $summer ) )
					{
							$events[$j][4] = $events[$j][4] + 3600;
					}
				}

				foreach( $events as $event )
				{
					$this->DienstplanBooked->create();
					$this->DienstplanBooked->set( array(
						'wid' => $this->webmodul_id,
						'col' => $event[3],
						'start' => $event[4],
						'duration' => $event[5],
						'maintainer' => $event[2],
						'creator_id' => $this->Session->read('User.id')
					) );
					if( $this->isAdmin() || $event[2] == $this->Session->read('User.id') )
					{
						$ignoreVacation = true;
						if( $event[2] == $this->Session->read('User.id') )
							$ignoreVacation = false;
						$rtn = $this->DienstplanBooked->saveAndHandleCollision($ignoreVacation);
						if( $rtn[2] )
							$hadCollisions = true;
						$count += $rtn[0];
						$success += $rtn[1];
					}
				}
			}

			if( $hadCollisions )
			{
				$this->AjaxReply->setError(
					'Es kam zu Überschneidungen mit anderen Bereitschafts- oder Urlaubs-Zeiten. Alle buchbaren Bereitschaftszeiten wurden übernommen.'
				);
			}
			$this->AjaxReply->output(false);
		}
		die();
	}

	private function isSummerTime( $timestamp )
	{
		$str = date( "I", $timestamp );
		if( $str == "1" )
			return true;
		else
			return false;
	}

	public function hourOverview( $_start = null, $_end = null, $_sort=2 )
	{
		$this->hourOverviewAccessOnly();

		$this->includeJs('jquery/jquery1.10.2/jquery');
		$this->includeJs('jquery/ui-1.11.4/jquery-ui.min');
		$this->includeCss('jquery/jquery-ui-1.11.4.custom/jquery-ui.min');
		$this->includeCss('jquery/jquery-ui-1.11.4.custom/jquery-ui.structure.min');
		$this->includeCss('jquery/jquery-ui-1.11.4.custom/jquery-ui.theme.min');


		$start = strtotime( "-30 day", strtotime( "midnight" ) );
		$end = time();

		if( $_start != null )
			$start = intval($_start);
		if( $_end != null )
			$end = strtotime( 'tomorrow', intval($_end) );

		if( $start > $end )
		{
			$tmp = $end;
			$end = $start;
			$start = $tmp;
		}

		$order = array();
		if( abs($_sort) == 1 )
			if( $_sort < 0 )
				$order = array(
					'DienstplanUser.vorname DESC',
					'DienstplanUser.nachname DESC'
				);
			else
				$order = array(
					'DienstplanUser.vorname',
					'DienstplanUser.nachname'
				);
		else if( abs($_sort) == 2 )
			if( $_sort < 0 )
				$order = array(
					'DienstplanUser.nachname DESC',
					'DienstplanUser.vorname DESC'
				);
			else
				$order = array(
					'DienstplanUser.nachname',
					'DienstplanUser.vorname'
				);

		$users = $this->DienstplanUser->find( 'all', array(
			'conditions' => array(
				'wid' => $this->webmodul_id
			),
			'order' => $order
		) );

		$tbl = array();

		foreach( $users as $user )
		{
			$uid = $user['DienstplanUser']['id'];
			$conds = array(
				'OR' => array(
					array(
						'OR' => array(
							array(
								array('start >=' => $start),
								array('start <=' => $end)
							),
							array(
								array('end >=' => $start),
								array('end <=' => $end)
							)
						)
					),
					array(
						array('start <=' => $start),
						array('end >=' => $end)
					)
				),
				'wid' => $this->webmodul_id,
				'maintainer' => $uid
			);
			$events = $this->DienstplanBooked->find( 'all', array(
				'conditions' => $conds
			) );
			$time = 0;
			$events = $this->splitEventsByDays($events, $start, $end);
			foreach( $events as $event )
			{
				$time += $event['DienstplanBooked']['duration'];
			}
			$time = $time / (60*60);
			//print_r($time);
			$col = array( $user['DienstplanUser']['vorname'], $user['DienstplanUser']['nachname'], 0 );
			if( $time )
				$col[2] = $time;
			$tbl[] = $col;
		}

		if( $_sort == 3 )
			uasort($tbl, array('DienstplanController', 'hourOverviewTblSortASC'));
		else if( $_sort == -3 )
			uasort($tbl, array('DienstplanController', 'hourOverviewTblSortDESC'));

		//print_r($tbl);
		$this->set( 'start', $start );
		$this->set( 'end', $end );
		$this->set( 'wid', $this->webmodul_id );
		$this->set( 'tbl', $tbl );
		$this->set( 'sort', $_sort );
	}

	static function hourOverviewTblSortASC($a, $b)
	{
		if($a[2]==$b[2])
			return 0;
		else if($a[2]<$b[2])
			return -1;
		else
			return 1;
	}

	static function hourOverviewTblSortDESC($a, $b)
	{
		if($a[2]==$b[2])
			return 0;
		else if($a[2]>$b[2])
			return -1;
		else
			return 1;
	}

	public function kontakt($_id)
	{
		if(!$this->kontakteLogin())
		{
		    $this->workerOnly();
		}
		$this->includeJs('popper.min');
		$this->includeJs('bootstrap/bootstrap.min');
		$this->includeCss('bootstrap/bootstrap.min');
		$this->layout=false;
		$p = explode('-',$_id);
		$id = intval($p[1]);
		$m = $p[0];
		$contact = array();
		if($m == 'u')
		{
			$u = $this->DienstplanUser->findById($id);
			if(empty($u))
				$this->redirect('/');
			$contact['vorname'] = $u['DienstplanUser']['vorname'];
			$contact['nachname'] = $u['DienstplanUser']['nachname'];
			$contact['email'] = $u['DienstplanUser']['email'];
			$contact['funktion'] = $u['DienstplanProps']['funktion'];
			$contact['telefon'] = $u['DienstplanUser']['telefon'];
			$contact['mobil'] = $u['DienstplanUser']['mobil'];
			$contact['pager'] = $u['DienstplanProps']['pager'];
			$contact['strasse'] = $u['DienstplanUser']['strasse'].' '.$u['DienstplanUser']['hausnummer'];
			$contact['plz'] = $u['DienstplanUser']['plz'];
			$contact['ort'] = $u['DienstplanUser']['ort'];
		}
		else if($m == 'c')
		{
			$u = $this->DienstplanContact->findById($id);
			if(empty($u))
				$this->redirect('/');
			$contact['vorname'] = $u['DienstplanContact']['vorname'];
			$contact['nachname'] = $u['DienstplanContact']['nachname'];
			$contact['email'] = $u['DienstplanContact']['email'];
			$contact['funktion'] = $u['DienstplanContact']['funktion'];
			$contact['telefon'] = $u['DienstplanContact']['telefon'];
			$contact['telefon_priv'] = $u['DienstplanContact']['telefon_priv'];
			$contact['mobil'] = $u['DienstplanContact']['mobil'];
			$contact['pager'] = $u['DienstplanContact']['notmobil'];
			$contact['strasse'] = $u['DienstplanContact']['strasse'];
			$contact['plz'] = $u['DienstplanContact']['plz'];
			$contact['ort'] = $u['DienstplanContact']['ort'];
		}
		else
		{
			$this->redirect('/');
		}
		$this->set('contact', $contact);
	}

	static function nachnameTableSort($s1, $s2)
	{
		return strnatcmp($s1['nachname'].$s1['vorname'], $s2['nachname'].$s2['vorname']);
	}

	static function vornameTableSort($s1, $s2)
	{
		return strnatcmp($s1['vorname'].$s1['nachname'], $s2['vorname'].$s2['nachname']);
	}

	static function ortTableSort($s1, $s2)
	{
		return strnatcmp($s1['ort'].$s1['nachname'].$s1['vorname'], $s2['ort'].$s2['nachname'].$s2['vorname']);
	}

	static function funktionTableSort($s1, $s2)
	{
		return strnatcmp($s1['funktion'].$s1['nachname'].$s1['vorname'], $s2['funktion'].$s2['nachname'].$s2['vorname']);
	}

	public function redirectIfKontakteLoginNotInUrl($login)
	{
	    if(!array_key_exists('KONTAKT_LOGIN', $this->params->query))
	    {
	        $arguments = $this->params->query;
	        $arguments['KONTAKT_LOGIN'] = $login;
	        $url = array_merge(array(
	            'controller' => $this->params['controller'],
	            'action' => $this->params['action'],
	            '?' => $arguments
	        ), $this->params['pass']);
	        //$this->response->header('Location', Router::url($url, true));
			//die();
			$this->redirect(Router::url($url, true));
	    }

	}

	public function kontakteLogin()
	{
	    if($this->AccessControl->acl_check( 'system','admin' ) )
	        return false;

	    if($this->isWorker())
	    {
	        $user = $this->DienstplanUser->findById($this->Session->read('User.id'));
		    if(!empty($user))
		    {
		        $salt = 'fskj/(hf((277ÖÄ';
		        $cookieContent = ''.$this->Session->read('User.id');
		        $cookieContent .= ',';
		        $password = $user['DienstplanUser']['plain'];
                $hash = hash('sha256', $password.$salt);
                $cookieContent .= $hash;
                $this->set('KONTAKT_LOGIN', $cookieContent);
                $this->redirectIfKontakteLoginNotInUrl($cookieContent);
                setcookie('KONTAKT_LOGIN',$cookieContent,time()+3*30*24*60*60, '/');
                return true;
		    }
	    }

	    $cookieString = "";
	    if(array_key_exists('KONTAKT_LOGIN', $_COOKIE))
	    {
	        $cookieString = $_COOKIE['KONTAKT_LOGIN'];
	    }
	    if(array_key_exists('KONTAKT_LOGIN', $this->params->query))
	    {
	        $cookieString = $this->params->query['KONTAKT_LOGIN'];
	    }
	    $cookieLogin = explode(',',$cookieString);
	    $salt = 'fskj/(hf((277ÖÄ';
	    if(count($cookieLogin)==2)
	    {
	        $user = $this->DienstplanUser->findById(intval($cookieLogin[0]));
	        if(!empty($user))
	        {
	            if(isset($user['DienstplanProps']['wid']))
	            {
	                $this->webmodul_id = intval($user['DienstplanProps']['wid']);
	                $password = $user['DienstplanUser']['plain'];
	                $hash = hash('sha256', $password.$salt);
	                if($hash==$cookieLogin[1])
	                {
	                    $this->redirectIfKontakteLoginNotInUrl($cookieString);
	                    setcookie('KONTAKT_LOGIN',$cookieString,time()+3*30*24*60*60, '/');
	                    return true;
	                }
	            }
	        }
	    }
	    return false;
	}

	public function kontakte($sort='nachname',$_choose='all' )
	{
		$this->layout=false;
		if(!$this->kontakteLogin())
		{
		    $this->workerOnly();
		}

		$this->includeJs('popper.min');
		$this->includeJs('bootstrap/bootstrap.min');
		$this->includeCss('bootstrap/bootstrap.min');
		$this->includeJs('bookmarkbubble/bookmark_bubble');

		$this->set('choose', 'all');
		$choose = 'all';
		if(!in_array($_choose,array('all','user','contacts')))
			$_choose = base64_decode($_choose);
		$choose = $_choose;

		$functions = array();
		$contacts = array();

		$conditions1 = array(
				'wid'=>$this->webmodul_id
			);
		$contacts1 = $this->DienstplanUser->find('all', array(
			'conditions'=> $conditions1,
			'order'=>array(
				'DienstplanUser.vorname',
				'DienstplanUser.nachname'
			)));

		foreach($contacts1 as $contact)
		{
			$functions[$contact['DienstplanProps']['funktion']] = 1;
			if($choose != 'contacts')
			{
				if(in_array($choose,array('all','user','contacts'))||
					$contact['DienstplanProps']['funktion'] == $choose)
				{
					$contacts[] = array(
					'id'=>'u-'.$contact['DienstplanUser']['id'],
					'vorname'=>$contact['DienstplanUser']['vorname'],
					'nachname'=>$contact['DienstplanUser']['nachname'],
					'funktion'=>$contact['DienstplanProps']['funktion'],
					'telefon'=>$contact['DienstplanUser']['telefon'],
					'mobil'=>$contact['DienstplanUser']['mobil'],
					'pager'=>$contact['DienstplanProps']['pager'],
					'ort'=>$contact['DienstplanUser']['ort']
					);
				}

			}
		}

		$conditions2 = array(
				'wid'=>$this->webmodul_id
			);
		$contacts2 = $this->DienstplanContact->find('all', array(
			'conditions'=>$conditions2,
			'order'=>array(
				'DienstplanContact.vorname',
				'DienstplanContact.nachname'
			)));

		foreach($contacts2 as $contact)
		{
			$functions[$contact['DienstplanContact']['funktion']] = 1;
			if($choose != 'user')
			{
				if(in_array($choose,array('all','user','contacts'))||
					$contact['DienstplanContact']['funktion'] == $choose)
				{
					$contacts[] = array(
						'id'=>'c-'.$contact['DienstplanContact']['id'],
						'vorname'=>$contact['DienstplanContact']['vorname'],
						'nachname'=>$contact['DienstplanContact']['nachname'],
						'telefon'=>$contact['DienstplanContact']['telefon'],
						'mobil'=>$contact['DienstplanContact']['mobil'],
						'pager'=>$contact['DienstplanContact']['notmobil'],
						'funktion' => $contact['DienstplanContact']['funktion'],
						'ort' => $contact['DienstplanContact']['ort']
					);
				}
			}
		}

		$functions = array_keys($functions);

		uasort($functions, 'strnatcmp');
		$this->set('sort','vorname');
		if(in_array($sort,array('ort','vorname','nachname','funktion')))
		{
			uasort($contacts, array('DienstplanController', $sort.'TableSort'));
			$this->set('sort',$sort);
		}

		if(in_array($choose,array('all','user','contacts'))||
			in_array($choose,$functions))
		{
			$this->set('choose',$choose);
		}

		$this->set('contacts', $contacts);
		$this->set('functions', $functions);
	}

	public function edit_kontakte()
	{
		$this->adminOnly();

		if(!empty($this->request->query['del']))
		{
			$this->DienstplanContact->delete($this->request->query['del']);
		}
		if(!empty($this->data))
		{
			$data = $this->data;
			$data['DienstplanContact']['wid'] = $this->webmodul_id;
			$this->DienstplanContact->save($data);
		}

		$contacts = $this->DienstplanContact->find('all', array(
			'conditions'=>array(
				'wid'=>$this->webmodul_id
			),
			'order'=>array(
				'DienstplanContact.vorname',
				'DienstplanContact.nachname'
			)));

		$this->set('contacts', $contacts);
	}

	private function _aktuell()
	{
	    $ip_view = false;
		if( $this->kontakteLogin() ||
		    $this->isWorker() ||
			$this->request->clientIp() == '213.157.31.194' ||
			$this->request->clientIp() == '194.127.205.2' ||
			$this->request->clientIp() == '194.99.108.38' ||
			$this->request->clientIp() == '213.188.107.58' ||
			$this->request->clientIp() == '194.99.108.11' ||
			$this->request->clientIp() == '87.129.237.211' ||
			$this->request->clientIp() == '194.99.108.45' ||
			$this->request->clientIp() == '85.132.222.48' ||
			$this->request->clientIp() == '85.132.222.49' ||
			$this->request->clientIp() == '85.132.222.50' ||
			$this->request->clientIp() == '85.132.222.51' ||
			$this->request->clientIp() == '80.147.177.186' ||
			/*my ip*/$this->request->clientIp() == '::1' ||
			isset($_GET['k']) && $_GET['k'] == 'bmZzb2RlbndhbGQ=')
		{
		    if(!$this->isWorker())
			{
			    $ip_view = true;
			}
			$this->set('ip_view', $ip_view);
			$table = array();

			$now = time();

			$config = $this->DienstplanConfig->find('first', array( 'conditions' => array( 'id' => $this->webmodul_id ) ));
			$atom = intval($config['DienstplanConfig']['dienst_time_h'])*60*60;

			$events = $this->DienstplanBooked->find( 'all', array(
				'conditions' => array(
					'start <=' => $now,
					'end >' => $now,
					'wid' => $this->webmodul_id
				),
				'order' => array(
					'col'
				)
			) );

			// echo '<pre>';
			// print_r($events);
			// echo '</pre>';

			foreach( $events as $key => $event )
			{
				$user = $this->DienstplanUser->findById($event['DienstplanBooked']['maintainer']);
				// echo "$key<pre>$key";
				// print_r($user);
				// echo '</pre>';

				if( $user )
				{
					$name = $user['DienstplanUser']['nachname'].', '.$user['DienstplanUser']['vorname'];
					$tel = $user['DienstplanUser']['telefon'];
					$pager = $user['DienstplanProps']['pager'];
					$mobil = $user['DienstplanUser']['mobil'];
					$wid =  $this->webmodul_id;



					$timeTableId = intval($event['DienstplanBooked']['col']);
					// echo "timeTableIdtimeTableId".$event['DienstplanBooked']['col']." <br>";
					// echo "timeTableId $timeTableId <br>";

					if($timeTableId == 0){
						$timeTableKey = "a";
					}elseif($timeTableId == 1){
						$timeTableKey = "b";
					}elseif($timeTableId == 2){
						$timeTableKey = "h";
					}elseif($timeTableId == 3){
						$timeTableKey = "d";
					}else{
						$timeTableKey = "unkonwn";
					}
					// for c
					if($wid == 441 && $timeTableId == 2) {
						$timeTableKey = "c";
					}
					// for h
					if($wid != 441 ){
						if($timeTableId == 2){
							$timeTableKey = "h";
						}
					}else{
						if($timeTableId == 3){
							$timeTableKey = "h";
						}
					}
					// for d
					if($wid != 441 && $timeTableId == 3){
						$timeTableKey = "d";
					}
					// for l
					if($wid == 441 && $timeTableId == 4){
						$timeTableKey = "l";
					}

					$table[$timeTableKey]['name'] = $name;
					if( $tel != '' )
						$table[$timeTableKey]['tel'] = $tel;
					if( $pager != '' )
						$table[$timeTableKey]['pager'] = $pager;
					if( $mobil != '' )
						$table[$timeTableKey]['mobil'] = $mobil;


					// $table[$event['DienstplanBooked']['col']]['name'] = $name;
					// if( $tel != '' )
					// 	$table[$event['DienstplanBooked']['col']]['tel'] = $tel;
					// if( $pager != '' )
					// 	$table[$event['DienstplanBooked']['col']]['pager'] = $pager;
					// if( $mobil != '' )
					// 	$table[$event['DienstplanBooked']['col']]['mobil'] = $mobil;
				}
			}

			// echo 'Output<pre>';
			// print_r($table);
			// echo '</pre>';
			// die;

			$filluser = $this->DienstplanUser->findById($config['DienstplanConfig']['filluser']);

			if( $filluser )
			{
				// echo 'filluser<pre>';
				// print_r($filluser);
				// echo '</pre>';

				$name = $filluser['DienstplanUser']['nachname'].', '.$filluser['DienstplanUser']['vorname'];
				$tel = $filluser['DienstplanUser']['telefon'];
				$pager = $filluser['DienstplanProps']['pager'];
				$mobil = $filluser['DienstplanUser']['mobil'];

				// $id = 3;
				// if( $this->webmodul_id == 441 ){
				// 	$id = 4;
				// }

				$id = "l";
				if( $this->webmodul_id == 441 ){
					$id = 4;
				}

				$table[$id]['name'] = $name;
				if( $tel != '' ){
					$table[$id]['tel'] = $tel;
				}
				if( $pager != '' ){
					$table[$id]['pager'] = $pager;
				}
				if( $mobil != '' ){
					$table[$id]['mobil'] = $mobil;
				}
			}

			// echo 'Output filluser<pre>';
			// print_r($table);
			// echo '</pre>';
			// die;

			$this->set( 'time', date('H:i',$now) );
			// this is aktuell table
			$this->set( 'table', $table );
			$config = $this->DienstplanConfig->find('first', array( 'conditions' => array( 'id' => $this->webmodul_id ) ));
			$this->set( 'show_h', $config['DienstplanConfig']['show_h'] );
			$this->set( 'allnumbers', $config['DienstplanConfig']['allnumbers'] );
			$this->set( 'wid', $this->webmodul_id );

			// Leitstellen-Login behandeln und erfolg loggen
			if(!$this->isWorker())
			{
				$log = array();
				$log['DienstplanLeitstelleLog']['wid'] = $this->webmodul_id;
				$log['DienstplanLeitstelleLog']['ip'] = $this->request->clientIp();
				$log['DienstplanLeitstelleLog']['success'] = 1;
				$log['DienstplanLeitstelleLog']['content'] = base64_encode(json_encode([
				    'time'=>$this->viewVars['time'],
				    'table'=>$this->viewVars['table'],
				    'show_h'=>$this->viewVars['show_h'],
				    'allnumbers'=>$this->viewVars['allnumbers']
				]));
				$this->DienstplanLeitstelleLog->create();
				$this->DienstplanLeitstelleLog->save($log);
			}
		} else
		{
			$log = array();
			$log['DienstplanLeitstelleLog']['wid'] = 0;
			$log['DienstplanLeitstelleLog']['ip'] = $this->request->clientIp();
			$log['DienstplanLeitstelleLog']['success'] = 0;
			$log['DienstplanLeitstelleLog']['content'] = "";
			$this->DienstplanLeitstelleLog->save($log);
			$this->redirect('/');
		}
	}

	public function aktuell()
	{
		$this->_aktuell();
	}

	public function aktuell_app()
	{
		$this->layout = false;
		$this->includeJs('popper.min');
		$this->includeJs('bootstrap/bootstrap.min');
		$this->includeCss('bootstrap/bootstrap.min');

		$this->_aktuell();
	}


	public function overview($_start=null, $_end=null, $_currentUserOnly=false)
	{
		$this->workerOnly();
		$this->includeJs('jquery/jquery1.10.2/jquery');
		$this->includeJs('jquery/ui-1.11.4/jquery-ui.min');
		$this->includeCss('jquery/jquery-ui-1.11.4.custom/jquery-ui.min');
		$this->includeCss('jquery/jquery-ui-1.11.4.custom/jquery-ui.structure.min');
		$this->includeCss('jquery/jquery-ui-1.11.4.custom/jquery-ui.theme.min');

		$start = strtotime( "midnight" );
		$end = strtotime( "+1 month", strtotime( "tomorrow" ) );

		if( $_start != null )
			$start = intval($_start);
		if( $_end != null )
			$end = strtotime( "tomorrow", intval($_end) );

		$config = $this->DienstplanConfig->find('first', array( 'conditions' => array( 'id' => $this->webmodul_id ) ));
		//$atom = intval($config['DienstplanConfig']['dienst_time_h'])*60*60;

		$startStamp = $start;
		$endStamp = $end;

		$userIds = array();
		$cols = array();
		$table = array();

		$conds = array(
			'OR' => array(
				array(
					'OR' => array(
						array(
							array('start >=' => $startStamp),
							array('start <=' => $endStamp)
						),
						array(
							array('end >=' => $startStamp),
							array('end <=' => $endStamp)
						)
					)
				),
				array(
					array('start <=' => $startStamp),
					array('end >=' => $endStamp)
				)
			),
			'wid' => $this->webmodul_id
		);
		if($_currentUserOnly && $this->webmodul_id == 441)
			$conds['maintainer'] = $this->Session->read('User.id');

		$userId = $this->Session->read('User.id');

		$eventsRaw = $this->DienstplanBooked->find( 'all', array(
			'conditions' => $conds,
			'order' => array( 'start' )
		) );

		$events = $this->splitEventsByDays($eventsRaw, $startStamp, $endStamp);

		// events zusammenfassen
		$cmpEvents = array();
		$prevEvents = array( '0' => null, '1' => null, '2' => null, '3' => null );
		foreach( $events as $event )
		{
			if( $prevEvents[$event['DienstplanBooked']['col']] )
			{
				$prevEvent = $prevEvents[$event['DienstplanBooked']['col']];
				$centerPre = $prevEvent['DienstplanBooked']['start']+($prevEvent['DienstplanBooked']['duration']/2);
				$centerEv = $event['DienstplanBooked']['start']+($event['DienstplanBooked']['duration']/2);
				if( $prevEvent['DienstplanBooked']['maintainer'] == $event['DienstplanBooked']['maintainer'] &&
					$prevEvent['DienstplanBooked']['end'] == $event['DienstplanBooked']['start'] &&
					date('d', $centerPre) == date('d', $centerEv))
				{
					$prevEvent['DienstplanBooked']['end'] = $event['DienstplanBooked']['end'];
					$prevEvents[$event['DienstplanBooked']['col']] = $prevEvent;
				} else
				{
					$cmpEvents[] = $prevEvents[$event['DienstplanBooked']['col']];
					$prevEvents[$event['DienstplanBooked']['col']] = null;
				}
			}

			if( !$prevEvents[$event['DienstplanBooked']['col']] )
				$prevEvents[$event['DienstplanBooked']['col']] = $event;
		}
		foreach( $prevEvents as $key => $event )
		{
			$cmpEvents[] = $event;
		}

		// events für view vorbereiten
		$localWeekDay = array('1'=>'Mo', '2'=>'Di', '3'=>'Mi', '4'=>'Do', '5'=>'Fr', '6'=>'Sa', '7'=>'So');
		foreach( $cmpEvents as $event )
		{
			$startDate = $event['DienstplanBooked']['start'];
			$endDate = $event['DienstplanBooked']['end'];

			if( $startDate == "" )
				continue;

			$timeKey = strtotime('midnight', $startDate);
			$keyInformation = array();
			if( !isset( $table[$timeKey] ) )
			{
				$keyInformation['date'] = $localWeekDay[date('N',$startDate)].date( ' d.m', $startDate );
			}
			$timeTo = date( 'H:i', $endDate );
			if( $timeTo == '00:00' )
				$timeTo = '24:00';
			$time = date( 'H:i', $startDate ).' - '.$timeTo;
			$user = $this->DienstplanUser->findById( $event['DienstplanBooked']['maintainer'] );
			if( $user != false )
			{
				$telInfo = '';
				$conTyp = '';
				if( $user['DienstplanProps']['pager'] != '' )
				{
					$telInfo = $user['DienstplanProps']['pager'];
					$contTyp = 'Pager';
				}
				else if( $user['DienstplanUser']['mobil'] != '' )
				{
					$telInfo = $user['DienstplanUser']['mobil'];
					$contTyp = 'Mobil';
				}
				else
				{
					$telInfo = $user['DienstplanUser']['telefon'];
					$contTyp = 'Telefon';
				}

				if( !isset( $table[$timeKey] ) )
				{
					$keyInformation[ $event['DienstplanBooked']['col'] ][$time]['start'] = $startDate;
					$keyInformation[ $event['DienstplanBooked']['col'] ][$time]['end'] = $endDate;
					$keyInformation[ $event['DienstplanBooked']['col'] ][$time]['id'] = $user['DienstplanUser']['id'];
					$keyInformation[ $event['DienstplanBooked']['col'] ][$time]['name'] = $user['DienstplanUser']['nachname'].', '.$user['DienstplanUser']['vorname'];
					$keyInformation[ $event['DienstplanBooked']['col'] ][$time]['tel'] = $telInfo;
					$keyInformation[ $event['DienstplanBooked']['col'] ][$time]['cont_typ'] = $contTyp;
				} else
				{
					$table[$timeKey][ $event['DienstplanBooked']['col'] ][$time]['start'] = $startDate;
					$table[$timeKey][ $event['DienstplanBooked']['col'] ][$time]['end'] = $endDate;
					$table[$timeKey][ $event['DienstplanBooked']['col'] ][$time]['id'] = $user['DienstplanUser']['id'];
					$table[$timeKey][$event['DienstplanBooked']['col']][$time]['name'] = $user['DienstplanUser']['nachname'].', '.$user['DienstplanUser']['vorname'];
					$table[$timeKey][$event['DienstplanBooked']['col']][$time]['tel'] = $telInfo;
					$table[$timeKey][$event['DienstplanBooked']['col']][$time]['cont_typ'] = $contTyp;
				}
			}

			if( $user != false )
			{
				if( !isset( $table[$timeKey] ) )
					$table[ $timeKey ] = $keyInformation;
			}
		}

		// Filter rows without current user
		if( $_currentUserOnly && $this->webmodul_id != 441 )
		{
			foreach( $table as $timekey => &$day )
			{
				$usertimepairs = array();
				foreach( $day as &$col )
				{
					foreach( $col as &$timeOnCol )
					{
						if( $timeOnCol['id'] == $userId )
							$usertimepairs[] = array($timeOnCol['start'], $timeOnCol['end']);
					}
				}
				if( count($usertimepairs) > 0 )
				{
					foreach( $day as &$col )
					{
						foreach( $col as $timekey => &$timeOnCol )
						{
							if( $timeOnCol['id'] != $userId )
							{
								$inUserTime = false;
								foreach( $usertimepairs as $pair )
								{
									if( $pair[0] < $timeOnCol['start'] && $timeOnCol['start'] < $pair[1] ||
										$pair[0] < $timeOnCol['end'] && $timeOnCol['start'] < $pair[1] ||
										$timeOnCol['start'] < $pair[0] && $pair[0] < $timeOnCol['end'] ||
										$timeOnCol['start'] < $pair[1] && $pair[1] < $timeOnCol['end'] ||
										$timeOnCol['start'] == $pair[0] && $pair[1] == $timeOnCol['end'] )
									{
										$inUserTime = true;
										break;
									}
								}
								if( !$inUserTime )
								{
									unset( $col[$timekey] );
								}
							}
						}
					}
				} else
				{
					unset( $table[$timekey] );
				}
			}
		}

		ksort($table);

		$r1Set = false;
		$r2Set = false;
		$r3Set = false;
		$r4Set = false;
		if( $config['DienstplanConfig']['col_a'] == 1 )
			$r1Set = true;
		if( $config['DienstplanConfig']['col_b'] == 1 )
			$r2Set = true;
		if( $config['DienstplanConfig']['col_c'] == 1 )
			$r3Set = true;
		if( $config['DienstplanConfig']['col_d'] == 1 )
			$r4Set = true;

		$this->set('r1Set', $r1Set);
		$this->set('r2Set', $r2Set);
		$this->set('r3Set', $r3Set);
		$this->set('r4Set', $r4Set);

	// echo '<pre>';
	// print_r($table);
	// echo '</pre>';
	// die;
		$this->set('table', $table);
		$this->set('start', $start);
		$this->set('end', $end);
		$this->set('currentUserOnly', $_currentUserOnly);

		// Extrawurst für Bergstrasse
		if( $this->webmodul_id == 441 )
		{
			$body = $this->render('overview_bergstrasse');
		}
	}

	public function overview_pdf( $_start=null, $_end=null, $_currentUserOnly=false )
	{
		$this->layout=false;

		$this->overview($_start, $_end, $_currentUserOnly);
		$view = new View($this, false);

		$body = $view->render('default/Dienstplan/overview_pdf');

		$this->response->body($body);
		$this->response->type('pdf');
		//$this->response->download('overview.pdf');

		return $this->response;
	}

	public function settings()
	{
		$this->adminOnly();

		$user = $this->DienstplanUser->find( 'all', array(
			'fields' => array(
				'DienstplanUser.id',
				'DienstplanUser.vorname',
				'DienstplanUser.nachname',
				'DienstplanUser.telefon',
				'DienstplanUser.mobil',
				'DienstplanProps.is_maintainer',
				'DienstplanProps.pager'
			),
			'conditions' => array(
				'DienstplanProps.wid' => $this->webmodul_id
			),
			'order' => array(
				'DienstplanUser.nachname',
				'DienstplanUser.vorname'
			)
		) );

		if( isset($this->request->data['submit']) )
		{
			$this->DienstplanConfig->read(null, 1);
			$this->DienstplanConfig->set(array(
				'id' => $this->webmodul_id,
				'filluser' => intval($this->request->data['filluser']),
				'delete_border' => intval($this->request->data['delete_border']),
				'delete_date' => intval($this->request->data['delete_date']),
				'editable_profile' => intval(isset($this->request->data['editable_profile'])),
				'show_h' => intval(isset($this->request->data['show_h'])),
				'allnumbers' => intval(isset($this->request->data['allnumbers'])),
				'apply_week' => intval(isset($this->request->data['apply_week'])),
			));
			if( !$this->DienstplanConfig->save() )
			{
				$this->Session->setFlash('Fehler! Die Daten konnten nicht gespeichert werden.');
			}
			else
				$this->Session->setFlash('Speichern erfolgreich.');
		}

		$config = $this->DienstplanConfig->find('first', array( 'conditions' => array( 'id' => $this->webmodul_id ) ));
		echo '<pre>';
		print_r( $this->webmodul_id);
		echo '</pre>';
		$this->set( 'filluser', $config['DienstplanConfig']['filluser'] );
		$this->set( 'delete_border', $config['DienstplanConfig']['delete_border'] );
		$this->set( 'delete_date', $config['DienstplanConfig']['delete_date'] );
		$this->set( 'delete_mode', $config['DienstplanConfig']['delete_mode'] );
		$this->set( 'editable_profile', $config['DienstplanConfig']['editable_profile'] );
		$this->set( 'show_h', $config['DienstplanConfig']['show_h'] );
		$this->set( 'allnumbers', $config['DienstplanConfig']['allnumbers'] );
		$this->set( 'apply_week', $config['DienstplanConfig']['apply_week'] );
		$this->set( 'users', $user );
	}
}
?>
