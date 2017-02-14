<?php


	class ParticipantsController extends AppController
	{
		var $name="Participants";
		var $Helpers = array('Form', 'Html');

		public function beforeFilter(){
			parent::beforeFilter();
			$this->Auth->allow('add');
		}

		/* afficher la liste des participants */
		function view(){
			$q = $this->Participant->EventsParticipant->find('all', array(
				'conditions' => array('EventsParticipant.event_id' => 3, 'EventsParticipant.valide' => true, 'Participant.LISTED' => true),
				'fields' => array('Participant.FIRST_NAME', 'Participant.LAST_NAME', 'Participant.INSTITUTION', 'Participant.COUNTRY'),
				'order' => array('LAST_NAME')));
			$this->set('participant', $q);
		}

		function validation($event_id=null){
			if(!$event_id ) {
				throw new NotFoundException(__('Invalid event'));
			}

			$eventName= $this->Participant->Event->find('first', array(
													'conditions' => array('Event.ID' => $event_id),
													'fields' => array('Event.NAME'),
													'recursive' => -1
												));
			
			if (empty($this->request->data)) {
				$this->set('eventName', $eventName);
				$q = $this->Participant->EventsParticipant->find('all', array(
					'conditions' => array('EventsParticipant.valide' => 0, 'Event.ID' => $event_id),
					'fields' => array('Participant.ID', 'Participant.FIRST_NAME', 'Participant.LAST_NAME', 'Participant.INSTITUTION', 'Participant.COUNTRY','Participant.FONCTION', 'Participant.DIETARY', 'Participant.EMAIL', 'Event.NAME'),
					'order' => array('LAST_NAME'))
				);
				$this->set('participant', $q);
			}else{
				$this->Participant->EventsParticipant->updateAll(
    				array('EventsParticipant.VALIDE' => true),
    				array('Participant.ID ' => $this->request->data["choix"], 'EventsParticipant.event_id' => $event_id)
				);
				$test = $this->Participant->find('all', array(
						'conditions'=> array('Participant.ID ' => $this->request->data["choix"]),
						'fields'=> array('EMAIL')
					));
				foreach ($test as $email){
					$this->envoieValidationMail($email['Participant']['EMAIL'], $eventName['Event']['NAME']);
				}
				return $this-> redirect('/Participants/confirmation/'.$event_id);
			}

		}

		function view_admin($event_id = null){
			if(!$event_id ) {
				throw new NotFoundException(__('Invalid event'));
			}
			$eventName= $this->Participant->Event->find('first', array(
													'conditions' => array('Event.ID' => $event_id),
													'fields' => array('Event.NAME'),
													'recursive' => -1
												));
			$this->set('eventName', $eventName);

			$q = $this->Participant->EventsParticipant->find('all', array(
				'conditions' => array('EventsParticipant.VALIDE' => 1, 'Event.ID' => $event_id),
				'fields' => array('Participant.ID', 'Participant.FIRST_NAME', 'Participant.LAST_NAME', 'Participant.INSTITUTION', 'Participant.COUNTRY','Participant.FONCTION', 'Participant.DIETARY', 'Participant.EMAIL', 'Event.NAME'),
				'order' => array('LAST_NAME'))
			);

			$this->set('participant', $q);
		}

		function confirmation($event_id=null){
			if(!$event_id ) {
				throw new NotFoundException(__('Invalid event'));
			}
			$eventName= $this->Participant->Event->find('first', array(
													'conditions' => array('Event.ID' => $event_id),
													'fields' => array('Event.NAME'),
													'recursive' => -1
												));
			$this->set('eventName', $eventName['Event']['NAME']);
			$q = $this->Participant->EventsParticipant->find('all', array(
				'conditions' => array('EventsParticipant.VALIDE' => 1, 'Event.ID' => $event_id),
				'fields' => array('Participant.FIRST_NAME', 'Participant.LAST_NAME', 'Participant.INSTITUTION', 'Participant.COUNTRY' ),
				'order' => array('Participant.LAST_NAME'))
			);
			$this->set('participant', $q);
		}

		/* ajouter un participant */
		function add(){
			if($this->request->is('post'))
			{
				$this->Participant->create($this->request->data["Participant"]);
				echo empty($this->request->data['Event']['id']);
				if($this->Participant->validates() && !empty($this->request->data['Event']['id'])){
					$EventsParticipants = array(
								'event_id' => $this->request->data['Event']['id']
							);
				
					/*foreach ($this->request->data['Event']['id'] as $eventParticipant){
						$EventsParticipant = array(
								'event_id' => $eventParticipant
							);
						array_push($EventsParticipants, $EventsParticipant);
					}*/
					$this->request->data['Event'] = $EventsParticipants;
					$this->Participant->save($this->request->data);
					$evenement = $this->Participant->EventsParticipant->find('all', array('conditions' => array('participant_id'=>$this->Participant->id)));
					$this->envoieMail($this->request->data, $evenement);

					return $this-> redirect('/Home/validation');
				}else{
					$this->Participant->validationErrors;	
				}
			}
				// if($this->Participant->save($this->request->data)){	
				// 	$evenement = $this->Participant->EventsParticipant->find('all', array('conditions' => array('participant_id'=>$this->Participant->id)));
				// 	$this->envoieMail($this->request->data, $evenement);
				// 	return $this-> redirect('/Home/validation');
				// }else{
				// 	debug($this->Participant->validationErrors);					
				// }
	
				     	
		}

		function envoieValidationMail($email, $eventName=null){

			if(!$eventName ) {
				throw new NotFoundException(__('Invalid event name'));
			}

			App::uses('CakeEmail', 'Network/Email');

			$Email = new CakeEmail('snv');
			$Email->from('inscription@gbif.fr');
			// changer l'adresse avec inscription@gbif.fr
			$Email->to($email);
			$Email->bcc('labeyrie@gbif.fr');
			$Email->subject('[Formation GBIF France] Confirmation d\'inscription');
			$Email->send('Bonjour,
<p>
Votre inscription à la '.$eventName.' a été prise en compte. <br />
Le programme détaillé, ainsi que les informations pratiques sont accessibles sur le site de la <a href="http://www.gbif.fr/formation_septembre2015">formation</a>.</br>
</p>
<p>
Vous pouvez nous contacter à tout moment pour plus d\'informations à l\'adresse e-mail ecoscope@fondationbiodiversite.fr ou par téléphone : +33 (0)1 80 05 89 52.
<p>
Bien cordialement, <br />

L\'équipe d\'ECOSCOPE. <br /><br />

<strong>Ne pas répondre à inscription@gbif.fr (pas de relève de courrier).</strong>');		
		}

		function envoieValidationMail_en($email, $eventName=null){

			if(!$eventName ) {
				throw new NotFoundException(__('Invalid event name'));
			}

			App::uses('CakeEmail', 'Network/Email');

			$Email = new CakeEmail('snv');
			$Email->from('gbif@gbif.fr');
			// changer l'adresse avec inscription@gbif.fr
			$Email->to($email);
			$Email->bcc('labeyrie@gbif.fr');
			$Email->subject('[European Nodes Meeting 2015] Registration confirmation');
			$Email->send('Hello,
<p>
Your registration to the '.$eventName.' has been taken into account. <br />
The detailed programme, as well as the practical information for your travelling needs and accommodations, are available on the <a href="http://www.gbif.fr/eu_node_meeting_2015">meeting website</a></br>
</p>
<p>
You can contact us at any moment for further information, at gbif@gbif.fr or by phone: +33 (0)1 40 79 80 65.
<p>
Best regards and see you soon in Paris!<br />

The GBIF France team.');		
		}

		function envoieMail($DonneeParticipant, $DonneeEvent){
			App::uses('CakeEmail', 'Network/Email');
			$number=1;
			foreach($DonneeEvent as $event){
				
				if($number==1) $evenement = $event["Event"]["NAME"];
				else $evenement = $evenement.'<br />'.$event["Event"]["NAME"];
				$number++;
			}

			$Email = new CakeEmail('snv');
			$Email->from('inscription@gbif.fr');
			// changer l'adresse avec inscription@gbif.fr
			$Email->to(array('melecoq@gbif.fr', 'pamerlon@gbif.fr', 'archambeau@gbif.fr', 'caviere@gbif.fr'));
			$Email->subject('[Formation 2015] Nouvelle inscription');
			$Email->send('Bonjour GBIF France, 
				<p> Un nouveau participant s\'est inscrit. Vous pouvez confirmer son inscription en allant sur la partie administration du site de la<a href="http://www.gbif.fr/formation_septembre2015">formation</a>.</p> 
			<table class="table table-bordered">
				<tr>
					<td> Nom complet </td>
					<td> '.$DonneeParticipant["Participant"]["FIRST_NAME"].' '.$DonneeParticipant["Participant"]["LAST_NAME"].'</td>
				</tr>
				<tr>
					<td> Institution </td>
					<td> '.$DonneeParticipant["Participant"]["INSTITUTION"].' </td>
				</tr>
				<tr>
					<td>Régime alimentaire</td>
					<td>'.$DonneeParticipant["Participant"]["DIETARY"].'</td>
				</tr>
			</table>
			<br><br>

Bien cordialement, <br>
Marie-Elise <br /> <br />

<strong>Ne pas répondre à inscription@gbif.fr (pas de relève de courrier).</strong>');		
		}

	}

?>
