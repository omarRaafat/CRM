<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Client;
use App\Models\Contact;
use App\Models\Opp;
use App\Models\OppAssign;
use App\Models\LeadAssign;
use Auth;
use App\Models\User;
use App\Models\Lead;
use App\Models\Event;
use App\Models\Notification;
use Illuminate\Support\Facades\Validator;
use App\Mail\FireMailNotification;
use Mail;
use App\Http\Traits\EmailFireTrait;
// use App\Exports\ExportUser;
use App\Imports\ImportContact;
use App\Imports\ImportClient;
use App\Models\City;
use App\Models\Country;

use Maatwebsite\Excel\Facades\Excel;

class Crm extends Controller
{
    use EmailFireTrait;
  public function index()
  {
      
      return view('content.dashboard.dashboards-crm');
  }

  public function clientAddNew(Request $request){
    if ($request->isMethod('post')) {
    //  return $request->all();
    $all_data = $request->all();
      $request->validate([
        
        'name' => 'required',
        'main_telephone' => 'required',
        'country' => 'required',
        'industry' => 'required'
    ]);
   
      Client::create($all_data);
      return redirect('/clients/all');
    }else{
      return view('content.form-layout.form-layouts-vertical-clients')->with('countries' , Country::all());
    }

   
  }


  public function clientEdit(Request $request , $client_id){
    $client = Client::find($client_id);
    $all_data = $request->all();
    // return $all_data;
    if ($request->isMethod('post')) {
     
      $request->validate([
        
        'name' => 'required',
        'main_telephone' => 'required',
        'country' => 'required',
        'industry' => 'required'
    ]);
     
   
      $client->update($all_data);
      return redirect('/clients/all');
    }else{
      return view('content.form-layout.form-layouts-vertical-clients-edit')->with(['client' => $client , 'countries' => Country::all()]);
    }

   
  }

  public function clientView(Request $request , $client_id){
    $client = Client::find($client_id);
  
      return view('content.form-layout.form-layouts-vertical-clients-view')->with('client' , $client);
    


  }

  public function ClientIndex(){
      
     $clients = Client::latest()->get();
     foreach($clients as $client){
      // return $client->country;
      $country = Country::find($client->country);
      $client->country =  $country->name_en;
     }
    return view('content.tables.tables-basic-clients')->with('clients' , $clients);
  }

  public function ClientDelete($client_id){
    $client = Client::find($client_id)->delete();
    return redirect('/clients/all');
   }

  public function ContactAddNew(Request $request){
    $all_data = $request->all();

    if ($request->isMethod('post')) {
     
      $request->validate([
        
        'first_name' => 'required',
        'last_name' => 'required',
        'mobile_telephone' => 'required',
        'email' => 'required' ,
        'client_id' => 'required'
    ]);
    $country = Country::find($request->country);
    $all_data['country'] = $country->name;
      Contact::create($all_data);
      return redirect('/contacts/all');
    }else{
      return view('content.form-layout.form-layouts-vertical-contacts')->with(['clients' => Client::latest()->get() ,'countries' => Country::all()]);
    }

   
  }

  public function ContactEdit(Request $request , $contact_id){
    $contact = Contact::find($contact_id);
    $all_data = $request->all();
    if ($request->isMethod('post')) {
     
      $request->validate([
        
        'first_name' => 'required',
        'last_name' => 'required',
        'mobile_telephone' => 'required',
        'email' => 'required' ,
        'client_id' => 'required'
    ]);
     
    $country = Country::find($request->country);
    $all_data['country'] = $country->name;
      $contact->update($all_data);
      return redirect('/contacts/all');
    }else{
      return view('content.form-layout.form-layouts-vertical-contacts-edit')->with(['clients' => Client::latest()->get() ,'contact' => $contact]);
    }
  }


  public function ContactView(Request $request , $contact_id){
    $contact = Contact::find($contact_id);
   
      return view('content.form-layout.form-layouts-vertical-contacts-view')->with(['clients' => Client::latest()->get() ,'contact' => $contact]);
    
  }

  public function ContactIndex(){
     $contacts = Contact::latest()->get();
    return view('content.tables.tables-basic-contacts')->with('contacts' , $contacts);
  }



  public function ContactDelete($contact_id){
    $contact = Contact::find($contact_id)->delete();
    return redirect('/contacts/all');
   }


    public function Contact_cities_from_country_id($country_id){
      $cities = City::where('country_id' , $country_id)->get();
      foreach($cities as $city)
       $city->name = $city->name;
         return response()->json($cities);
    }

  public function OppAddNew(Request $request){
    if ($request->isMethod('post')) {
     $all_data = $request->all();
      $request->validate([
        
        'name' => 'required',
        'size' => 'required',
        'closing_date' => 'required',
        'source' => 'required' ,
        'clients' => 'required',
        'contacts' => 'required',
        'status' => 'required'
       
    ]);


      $user_id = Auth::user()->id; 
      $all_data['owner'] = $user_id;

      if($request->hasFile('quota')){
        $quota_file = $request->file('quota');
        $quota_file_name = time().$quota_file->getClientOriginalName();
        $quota_file->move('uploads/opp/quotas/' , $quota_file_name);
        $all_data['quota'] = '/uploads/opp/quotas/'. $quota_file_name;
       
      }
 $statue = '100%'  ; 
      if($request->status == "Qualify"){
          $statue = '10%';
          
      }
        
          elseif($request->status == "Develop"){
              $statue = '30%'   ; 
             
          }
         
          elseif($request->status == "Propose"){
              $statue = '60%' ;  
            
          }
       
          elseif($request->status == "Negotiate"){
              $statue = '80%' ;  
             
          }
        
          elseif($request->status == "Closed Won"){
              $statue = '100%' ;  
             
          }

          
        
          $all_data['percentage'] = $statue;
      $opp = Opp::create($all_data);
      OppAssign::create(['opp_id' => $opp->id , 'user_id' => $user_id]);
      Notification::create(['user'=> Auth::user()->id , 'action' =>  Auth::user()->name.' Created'.' ' .$opp->name.'#'.$opp->id]);
       if($request->lead_id)
      Lead::find($request->lead_id)->update(['request_status' => 1]);
      return redirect('/opps');
    }else{
      return view('content.form-layout.form-layouts-vertical-opps')->with(['clients' => Client::latest()->get(),'contacts' => Contact::latest()->get() , 'lead' => '']);
    }

   
  }

  public function OppEdit(Request $request , $opp_id){
    $opp = Opp::find($opp_id);
    $opp_b4_changes = $opp;
    // return $opp;
    $contacts_clients = Contact::where('client_id' , $opp->clients)->get();
   
    if ($request->isMethod('post')) {
      $all_data = $request->all();
    // return $all_data;
      $request->validate([
        
        'name' => 'required',
        'size' => 'required',
        'closing_date' => 'required',
        'source' => 'required' ,
        'clients' => 'required',
        'contacts' => 'required',
        'status' => 'required'
       
    ]);
     
      if($request->hasFile('quota')){
        $quota_file = $request->file('quota');
        $quota_file_name = time().$quota_file->getClientOriginalName();
        $quota_file->move('uploads/opp/quotas/' , $quota_file_name);
        $all_data['quota'] = '/uploads/opp/quotas/'. $quota_file_name;
       
      }

      $statue = '100%'  ; 
      if($request->status == "Qualify"){
          $statue = '10%';
          
      }
        
          elseif($request->status == "Develop"){
              $statue = '30%'   ; 
             
          }
         
          elseif($request->status == "Propose"){
              $statue = '60%' ;  
            
          }
       
          elseif($request->status == "Negotiate"){
              $statue = '80%' ;  
             
          }
        
          elseif($request->status == "Closed Won"){
              $statue = '100%' ;  
             
          }
        
          $all_data['percentage'] = $statue;
     
       $opp->update($all_data);
       $changes = $opp->getChanges();
       
       if(isset($changes['name'])){
         $change = ' Name To '.$changes['name'];
       }else if(isset($changes['size'])){
        $change = ' Size To '.$changes['size'];
       }else if(isset($changes['closing_date'])){
        $change = ' Closing Date To '.$changes['closing_date'];
       }else if(isset($changes['source'])){
        $change = ' Source To '.$changes['source'];
       }else if(isset($changes['status'])){
        $change = ' Status To '.$changes['status'];
       }else{
        $change = "OPP #" .$opp->id;
       }
      Notification::create(['user'=> Auth::user()->id , 'action' =>Auth::user()->name. ' Changed the Opp #'.$opp->id.$change ]);

      return redirect('/opps');
    }else{
      return view('content.form-layout.form-layouts-vertical-opps-edit')->with(['clients' => Client::latest()->get() , 'opp' => $opp , 'contacts_clients' => $contacts_clients]);
    }
  }


  public function OppView(Request $request , $opp_id){
    $opp = Opp::find($opp_id);
    $contacts_clients = Contact::where('client_id' , $opp->clients)->get();
      return view('content.form-layout.form-layouts-vertical-opps-view')->with(['clients' => Client::latest()->get() , 'opp' => $opp , 'contacts_clients' => $contacts_clients]);
    
  }

  public function OppIndex(){
    if(Auth::user()->user_has_role->name == "Super-Admin" || Auth::user()->user_has_role->name == "Sales-Manager")
    $opps_Assigns = OppAssign::latest()->get();

    else {
      $opps_Assigns = OppAssign::where('user_id' , Auth::user()->id)->latest()->get();
    }
    return view('content.tables.tables-basic-opps')->with(['opps_Assigns' => $opps_Assigns , 'users' => User::where('id' ,'!=' , Auth::user()->id)->latest()->get() , 'notification' => Notification::latest()->first()]);
  }


  public function getContactByClientID($client_id){
    // return response()->json("client_id_is".$client_id);

      return response()->json( Contact::where('client_id' , $client_id)->get());
  }

 
  public function OppDelete($opp_id){
    OppAssign::where('opp_id' , $opp_id)->delete();
    $opps = Opp::find($opp_id)->delete();
    return redirect('/opps');
   }

   public function OppAssign(Request $request , $opp_id){
    $opp = Opp::find($opp_id);
    if($opp_assign = OppAssign::where('opp_id' , $opp_id)->first()){
      $opp_assign->update(['user_id' =>$request->user ]);
    }else{
      OppAssign::create(['opp_id' => $opp_id , 'user_id' => $request->user]);
    }
    $opp->update(['owner' => $request->user]);
    return redirect('/opps');
   }

   public function settings (Request $request){
    $all_data = $request->all();
    $cur_user = User::find(Auth::user()->id);
    if($request->hasFile('image')){
      $quota_file = $request->file('image');
      $quota_file_name = time().$quota_file->getClientOriginalName();
      $quota_file->move('uploads/opp/images/' , $quota_file_name);
      $all_data['image'] = '/uploads/opp/images/'. $quota_file_name;

    }
     if($request->password){
        $all_data['password'] = Hash::make($request->password);
     }else{
       $all_data['password'] = $cur_user->password;
     }

     $cur_user->update($all_data);
     return redirect()->back();
   }


   
   public function LeadAddNew(Request $request){
    if ($request->isMethod('post')) {
    //  return $request->all();
      $request->validate([
        
        'name' => 'required',
        'client' => 'required',
        'contact' => 'required',
        'size' => 'required',
        'closing_date' => 'required',
        'sales_user' =>'required'
       
    ]);
      $user_id = Auth::user()->id; 
      $lead = Lead::create($request->all());
      $user = User::find($request->sales_user);
      try{
      LeadAssign::create(['lead_id' => $lead->id , 'user_id' => $user_id]);
       $this->fire($user->email , "Lead Creation" , "New Lead Assigned to you");
    }catch(\Exception $ex){
          return $ex;
      }
  

      return redirect('/leads/all');
    }else{
      return view('content.form-layout.form-layouts-vertical-leads')->with(['clients' => Client::latest()->get() ,'contacts' => Contact::latest()->get() , 'sales' => User::whereIn('role' , ['2','4'])->latest()->get()]);
    }

   
  }


  public function LeadEdit(Request $request , $lead_id){
    $lead = Lead::find($lead_id);
    $contacts_clients = Contact::where('client_id' , $lead->client)->get();
    if ($request->isMethod('post')) {
    //  return $request->all();
      $request->validate([
        
        'name' => 'required',
        'client' => 'required',
        'contact' => 'required',
    ]);
     
      $request['request_status'] = 0;
      $lead->update($request->all());
      return redirect('/leads/all');
    }else{
      return view('content.form-layout.form-layouts-vertical-leads-edit')->with(['clients' => Client::latest()->get() ,'contacts' => $contacts_clients , 'lead' => $lead ,  'sales' => User::whereIn('role' , ['2','4'])->latest()->get()]);
    }

   
  }

  public function LeadView(Request $request , $lead_id){
    $lead = Lead::find($lead_id);
    $contacts_clients = Contact::where('client_id' , $lead->client)->get();
   
      return view('content.form-layout.form-layouts-vertical-leads-view')->with(['clients' => Client::latest()->get() ,'contacts' => $contacts_clients , 'lead' => $lead ,  'sales' => User::whereIn('role' , ['2','4'])->latest()->get()]);
    

   
  }

  public function LeadRequestView( $lead_id){
    $lead = Lead::find($lead_id);
  
      return view('content.form-layout.form-layouts-vertical-leads-request-view')->with(['clients' => Client::latest()->get() ,'contacts' => Contact::latest()->get() , 'lead' => $lead ,  'sales' => User::where('role' , '2')->latest()->get()]);
  
   
  }

  public function LeadRequestAccept($lead_id){
    $lead = Lead::find($lead_id);
    $contacts_clients = Contact::where('client_id' , $lead->client)->get();
    return view('content.form-layout.form-layouts-vertical-opps')->with(['clients' => Client::latest()->get(),'contacts' => $contacts_clients , 'lead' => $lead]);
  
   
  }

  public function LeadRequestReject($lead_id){
    $lead = Lead::find($lead_id);
    $lead->update(['request_status' => 2]);
    return redirect('/received/leads/requests');  
   
  }

  public function LeadIndex(){

    if(Auth::user()->user_has_role->name == "Super-Admin" || Auth::user()->user_has_role->name == "Marketing-Manager")
    $leads_Assigns = LeadAssign::latest()->get();

    else {
      $leads_Assigns = LeadAssign::where('user_id' , Auth::user()->id)->latest()->get();
    }
  
    return view('content.tables.tables-basic-leads')->with(['leads_assigns' => $leads_Assigns , 'users' => User::where('id' ,'!=' , Auth::user()->id)->whereIn('role' , ['2','4'])->latest()->get()]);
  }

  public function LeadRequests(){
    $leads = Lead::where(['request_status' => 0 , 'sales_user' => Auth::user()->id])->latest()->get();
   return view('content.tables.tables-basic-leads-requests')->with(['leads' => $leads , 'users' => User::where('id' ,'!=' , Auth::user()->id)->latest()->get()]);
 }

  public function LeadDelete($lead_id){
          LeadAssign::where('lead_id' , $lead_id)->delete();

    $lead = Lead::find($lead_id)->delete();
    return redirect('/leads/all');
   }


   public function LeadAssign(Request $request , $lead_id){
    $lead = Lead::find($lead_id);
    $lead->update(['sales_user' => $request->user]);
     $user = User::find($request->user);
     try{
           $this->fire($user->email , "Lead re-assign" , "New Lead Assigned to you");
   }catch(\Exception $ex){
          return $ex;
      }

    return redirect('/leads/all');
   }



   public function EventIndex(){
    $events = Event::latest()->get();
   return view('content.tables.tables-basic-events')->with(['events' => $events]);
 }

   public function EventAddNew(Request $request){
    if ($request->isMethod('post')) {
    //  return $request->all();
      $request->validate([
        
        'name' => 'required',
        'start_date' => 'required',
        'end_date' => 'required',
        'city' => 'required',
        'location' => 'required',
       
    ]);
     
    Event::create($request->all());
      return redirect('/events/all');
    }else{
      return view('content.form-layout.form-layouts-vertical-events');
    }

   
  }


  public function EventEdit(Request $request , $event_id){
    $event = Event::find($event_id);
    if ($request->isMethod('post')) {
     $all_data =  $request->all();
      $request->validate([
        
        'name' => 'required',
        'start_date' => 'required',
        'end_date' => 'required',
        'city' => 'required',
        'location' => 'required',
    ]);

     if($images = $request->file('images')){
       $event_images = [];
       foreach ($images as $image) {
         
         $image_name =  time().$image->getClientOriginalName();
         $image->move('uploads/events/images/' , $image_name);
         array_push($event_images , '/uploads/events/images/'.$image_name);
       }
       $all_data['images'] = json_encode($event_images);
     }

     if(!$request->sessions)
       $all_data['sessions'] = 0;

       if(!$request->badges)
       $all_data['badges'] = 0;

       if(!$request->landing_page)
       $all_data['landing_page'] = 0;
     
  //  return $all_data;
      $event->update($all_data);
      return redirect()->back();
    }else{
      return view('content.form-layout.form-layouts-vertical-events-edit')->with(['event' => $event]);
    }

   
  }


  public function EventDelete($event_id){
    $events = Event::find($event_id)->delete();
    return redirect('/events/all');
   }



   public function ContactImport(Request $request){
    Excel::import(new ImportContact, $request->file('file')->store('files'));
    return redirect()->back();
}

public function ClientImport(Request $request){
  Excel::import(new ImportClient, $request->file('file')->store('files'));
  return redirect()->back();
}

}
