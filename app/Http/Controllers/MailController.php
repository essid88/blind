<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Mail;
use Session;
use Image;
use Storage;
use App\Mailfile;
use PhpImap\Mailbox as ImapMailbox;
use PhpImap\IncomingMail;
use PhpImap\IncomingMailAttachment;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use \stdClass;

class MailController extends Controller {
  
   public function send(Request $request)
    {
       
        return view('emails.mail'); 
     }

public function getContact(){
	return view ('emails.mail');
}

public function postContact(Request $request){
$this->validate($request, [
'email'=> 'required|email',
'subject' => 'min:0',
'message' => 'min:1',
'a_file' => 'bail|mimes:jpeg,png,gif,svg,txt,pdf,ppt,docx,doc,xls,win,zip'
]);
$requestData = $request['a_file'];
$data = array(
'email'=>$request->email,
'subject' => $request->subject,
'bodyMessage' => $request->message,
'a_file' => $request->a_file
	);
if(empty($requestData)){
$data = array(
'email'=>$request->email,
'subject' => $request->subject,
'bodyMessage' => $request->message,
'a_file' => ''
	);
Mail:: send('emails.contact', $data,function($message) use ($data){
$message->to($data['email']);
$message->subject($data['subject']);
});
}
elseif(!empty($requestData)){

Mail:: send('emails.contact', $data,function($message) use ($data){
$message->to($data['email']);
$message->subject($data['subject']);
$message->attach($data['a_file']->getRealPath(),array(
'as' => 'a_file.' .$data['a_file']->getClientOriginalExtension(),
'mime' => $data['a_file']->getMimeType()));


});
}
	session::flash('succes',"congrat! Mail Successfully!");
  return view('emails.mail'); 

}


public function getEmail(){

	$inbox = imap_open('{imap.gmail.com:993/ssl}INBOX','blindvision88@gmail.com', 'essidl123198888') or die('Cannot connect to Gmail: ' . imap_last_error());

	$emails = imap_search($inbox,'ALL');

/* If emails are returned, cycle through each... */
if($emails) {
$output = '';

/* Make the newest emails on top */
rsort($emails);

/* For each email... */
foreach($emails as $email_number) {

$headerInfo = imap_headerinfo($inbox,$email_number);
$structure = imap_fetchstructure($inbox, $email_number);
$unread_emails = imap_search($inbox,'UNSEEN');


/* get information specific to this email */
$overview = imap_fetch_overview($inbox,$email_number,0);

/* get mesage body */
$message = imap_fetchbody($inbox,$email_number,1);
 $html = strip_tags($message);

/*
// If attachment found use this one
// $message = imap_qprint(imap_fetchbody($inbox,$email_number,"1.2"));
*/



$a= new stdClass();









//  Attachments
$attachments = array();
if(isset($structure->parts) && count($structure->parts))
{
for($i = 0; $i < count($structure->parts); $i++)
{
$attachments[$i] = array(
'is_attachment' => false,
'filename' => '',
'name' => '',
'attachment' => ''
);

if($structure->parts[$i]->ifdparameters)
{
foreach($structure->parts[$i]->dparameters as $object)
{
if(strtolower($object->attribute) == 'filename')
{
$attachments[$i]['is_attachment'] = true;
$attachments[$i]['filename'] = $object->value;
}
}
}

if($structure->parts[$i]->ifparameters)
{
foreach($structure->parts[$i]->parameters as $object)
{
if(strtolower($object->attribute) == 'name')
{
$attachments[$i]['is_attachment'] = true;
$attachments[$i]['name'] = $object->value;
}
}
}

if($attachments[$i]['is_attachment'])
{
$attachments[$i]['attachment'] = imap_fetchbody($inbox, $email_number, $i+1);

/* 3 = BASE64 encoding */
if($structure->parts[$i]->encoding == 3)
{
$attachments[$i]['attachment'] = base64_decode($attachments[$i]['attachment']);

}
/* 4 = QUOTED-PRINTABLE encoding */
elseif($structure->parts[$i]->encoding == 4)
{
$attachments[$i]['attachment'] = quoted_printable_decode($attachments[$i]['attachment']);

}
}
}
}

foreach($attachments as $attachment)
{
	if($attachment['is_attachment'] == 0)
	{
	$a->filename=$filename="";
 	$a->filepath=$file_path="";
	}
	if($attachment['is_attachment'] == 1)
	{
	$filename = $attachment['name'];
	if(empty($filename)){

	$filename = $attachment['filename'];}
	$file_path = 'uploads/'; //  Upload folder
	$fp = fopen($file_path . $filename, "w+");
	fwrite($fp, $attachment['attachment']);
 	$overview[0]->attachment=$filename;
 	$a->filename=$filename;
 	$a->filepath=$file_path;
	fclose($fp);

	}
}

 

/* change the status */
$status = imap_setflag_full($inbox, $overview[0]->msgno, "\Seen \Flagged");

$count_unread=0;
if($unread_emails==0){
	$count_unread=0; 

}
else{
$count_unread= count($unread_emails);

}
if (empty($overview[0]->subject)){
	$a->subject=$overview[0]->subject='';
	$a->message=$html;
$a->from=$overview[0]->from;
$a->date=$overview[0]->date;

}else{
$a->subject=$overview[0]->subject;
$a->message=$html;
$a->from=$overview[0]->from;
$a->date=$overview[0]->date;
}
$data[]=$a;	

} 

}

return view('emails.inbox', compact('data'));
}


public function deleteall(Request $request){
$inbox = imap_open('{imap.gmail.com:993/ssl}INBOX','blindvision88@gmail.com', 'essidl123198888') or die('Cannot connect to Gmail: ' . imap_last_error());

	$emails = imap_search($inbox,'ALL');
 // if any emails found, iterate through each email
    if($emails)
        {
            $count = 1;
  // put the newest emails on top
            rsort($emails);
 // for every email...
            foreach($emails as $email_number) 
                {
                    // TESTING BOTH METHODS
                    imap_delete($inbox,$email_number);
                    //imap_mail_move($inbox, $email_number,'[Gmail]/Bin');
                    $result = "success";
                }
        } 
    // close the connection
    imap_expunge($inbox);
    imap_close($inbox,CL_EXPUNGE);
    return view('emails.inbox', compact('data'));
}



public function getSMS(){
	return view ('sms.sms');
}

public function postSMS(Request $request){
$this->validate($request, [
'sendto'=> 'required',
'message' => 'min:1',
'from' => '21655494446',
]);
$data = array(
'sendto'=>$request->sendto,
'message' => $request->message,
'from' => '21655494446',
	);
$nexmo = app('Nexmo\Client');
 $nexmo->message()->send([
    'to' => $data['sendto'],
    'from' => $data['from'],
     'text' => $data['message']
]);

  return view('sms.sms'); 

}


}