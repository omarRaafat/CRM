<?php

use Illuminate\Support\Facades\Route;

use App\Mail\FireMailNotification;
// use Mail;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

$controller_path = 'App\Http\Controllers';

// Main Page Route

// layout
Route::get('/layouts/without-menu', $controller_path . '\layouts\WithoutMenu@index')->name('layouts-without-menu');
Route::get('/layouts/without-navbar', $controller_path . '\layouts\WithoutNavbar@index')->name('layouts-without-navbar');
Route::get('/layouts/fluid', $controller_path . '\layouts\Fluid@index')->name('layouts-fluid');
Route::get('/layouts/container', $controller_path . '\layouts\Container@index')->name('layouts-container');
Route::get('/layouts/blank', $controller_path . '\layouts\Blank@index')->name('layouts-blank');

// pages
Route::get('/pages/account-settings-notifications', $controller_path . '\pages\AccountSettingsNotifications@index')->name('pages-account-settings-notifications');
Route::get('/pages/account-settings-connections', $controller_path . '\pages\AccountSettingsConnections@index')->name('pages-account-settings-connections');
Route::get('/pages/misc-error', $controller_path . '\pages\MiscError@index')->name('pages-misc-error');
Route::get('/pages/misc-under-maintenance', $controller_path . '\pages\MiscUnderMaintenance@index')->name('pages-misc-under-maintenance');

// authentication
Route::get('/auth/login-basic', $controller_path . '\authentications\LoginBasic@index')->name('auth-login-basic');
Route::get('/auth/register-basic', $controller_path . '\authentications\RegisterBasic@index')->name('auth-register-basic');
Route::get('/auth/forgot-password-basic', $controller_path . '\authentications\ForgotPasswordBasic@index')->name('auth-reset-password-basic');

// cards
Route::get('/cards/basic', $controller_path . '\cards\CardBasic@index')->name('cards-basic');

// User Interface
Route::get('/ui/accordion', $controller_path . '\user_interface\Accordion@index')->name('ui-accordion');
Route::get('/ui/alerts', $controller_path . '\user_interface\Alerts@index')->name('ui-alerts');
Route::get('/ui/badges', $controller_path . '\user_interface\Badges@index')->name('ui-badges');
Route::get('/ui/buttons', $controller_path . '\user_interface\Buttons@index')->name('ui-buttons');
Route::get('/ui/carousel', $controller_path . '\user_interface\Carousel@index')->name('ui-carousel');
Route::get('/ui/collapse', $controller_path . '\user_interface\Collapse@index')->name('ui-collapse');
Route::get('/ui/dropdowns', $controller_path . '\user_interface\Dropdowns@index')->name('ui-dropdowns');
Route::get('/ui/footer', $controller_path . '\user_interface\Footer@index')->name('ui-footer');
Route::get('/ui/list-groups', $controller_path . '\user_interface\ListGroups@index')->name('ui-list-groups');
Route::get('/ui/modals', $controller_path . '\user_interface\Modals@index')->name('ui-modals');
Route::get('/ui/navbar', $controller_path . '\user_interface\Navbar@index')->name('ui-navbar');
Route::get('/ui/offcanvas', $controller_path . '\user_interface\Offcanvas@index')->name('ui-offcanvas');
Route::get('/ui/pagination-breadcrumbs', $controller_path . '\user_interface\PaginationBreadcrumbs@index')->name('ui-pagination-breadcrumbs');
Route::get('/ui/progress', $controller_path . '\user_interface\Progress@index')->name('ui-progress');
Route::get('/ui/spinners', $controller_path . '\user_interface\Spinners@index')->name('ui-spinners');
Route::get('/ui/tabs-pills', $controller_path . '\user_interface\TabsPills@index')->name('ui-tabs-pills');
Route::get('/ui/toasts', $controller_path . '\user_interface\Toasts@index')->name('ui-toasts');
Route::get('/ui/tooltips-popovers', $controller_path . '\user_interface\TooltipsPopovers@index')->name('ui-tooltips-popovers');
Route::get('/ui/typography', $controller_path . '\user_interface\Typography@index')->name('ui-typography');

// extended ui
Route::get('/extended/ui-perfect-scrollbar', $controller_path . '\extended_ui\PerfectScrollbar@index')->name('extended-ui-perfect-scrollbar');
Route::get('/extended/ui-text-divider', $controller_path . '\extended_ui\TextDivider@index')->name('extended-ui-text-divider');

// icons
Route::get('/icons/boxicons', $controller_path . '\icons\Boxicons@index')->name('icons-boxicons');

// form elements
Route::get('/forms/basic-inputs', $controller_path . '\form_elements\BasicInput@index')->name('forms-basic-inputs');
Route::get('/forms/input-groups', $controller_path . '\form_elements\InputGroups@index')->name('forms-input-groups');

// form layouts
Route::get('/form/layouts-vertical', $controller_path . '\form_layouts\VerticalForm@index')->name('form-layouts-vertical');
Route::get('/form/layouts-horizontal', $controller_path . '\form_layouts\HorizontalForm@index')->name('form-layouts-horizontal');

// tables
Route::get('/tables/basic', $controller_path . '\tables\Basic@index')->name('tables-basic');

Route::group(['middleware' => 'auth' ] , function(){
    $controller_path = 'App\Http\Controllers';

    Route::get('/', $controller_path . '\dashboard\Analytics@index')->name('dashboard-analytics');

    
//clients 
Route::get('/clients/add/new', $controller_path . '\dashboard\Crm@clientAddNew');
Route::post('/clients/add/new', $controller_path . '\dashboard\Crm@ClientAddNew')->name('client.add');
Route::get('/clients/all' , $controller_path. '\dashboard\Crm@ClientIndex')->name('client.all');
Route::get('/client/delete/{client_id}', $controller_path . '\dashboard\Crm@ClientDelete')->name('client.delete');
Route::get('/client/edit/{client_id}', $controller_path . '\dashboard\Crm@ClientEdit')->name('client.edit');
Route::post('/client/edit/{client_id}', $controller_path . '\dashboard\Crm@ClientEdit')->name('client.update');
Route::get('/client/view/{client_id}', $controller_path . '\dashboard\Crm@ClientView')->name('client.view');
Route::post('/clients/import',$controller_path . '\dashboard\Crm@ClientsImport')->name('clients.import');  

//contacts
Route::get('/contacts/add/new', $controller_path . '\dashboard\Crm@contactAddNew');
Route::post('/contacts/add/new', $controller_path . '\dashboard\Crm@contactAddNew')->name('contact.add');
Route::get('/contacts/all' , $controller_path. '\dashboard\Crm@contactIndex')->name('contacts.all');
Route::get('/contact/delete/{contact_id}', $controller_path . '\dashboard\Crm@ContactDelete')->name('contact.delete');
Route::get('/contact/edit/{contact_id}', $controller_path . '\dashboard\Crm@ContactEdit')->name('contact.edit');
Route::post('/contact/edit/{contact_id}', $controller_path . '\dashboard\Crm@ContactEdit')->name('contact.update');
Route::get('/contact/view/{contact_id}', $controller_path . '\dashboard\Crm@ContactView')->name('contact.view');
Route::post('/contacts/import',$controller_path . '\dashboard\Crm@ContactsImport')->name('contacts.import');
Route::get('/contacts/country/cities/{country_id}', $controller_path . '\dashboard\Crm@Contact_cities_from_country_id')->name('contact.country_cities');



//Opps
Route::get('/opps/add/new', $controller_path . '\dashboard\Crm@OppAddNew')->name('opp.create');
Route::post('/opps/add/new', $controller_path . '\dashboard\Crm@OppAddNew')->name('opp.add');
Route::get('/opps' , $controller_path. '\dashboard\Crm@OppIndex')->name('opps.all');
Route::get('/opp/contact/from/clients/{client_id}' , $controller_path. '\dashboard\Crm@getContactByClientID')->name('opps.contacts.clients');
Route::get('/opp/delete/{opp_id}', $controller_path . '\dashboard\Crm@OppDelete')->name('opp.delete');
Route::get('/opp/edit/{opp_id}', $controller_path . '\dashboard\Crm@OppEdit')->name('opp.edit');
Route::post('/opp/edit/{opp_id}', $controller_path . '\dashboard\Crm@OppEdit')->name('opp.update');
Route::post('/opp/re_assign/{opp_id}', $controller_path . '\dashboard\Crm@OppAssign')->name('opp.assign');
Route::get('/opp/view/{opp_id}', $controller_path . '\dashboard\Crm@OppView')->name('opp.view');

//Leads
Route::get('/leads/add/new', $controller_path . '\dashboard\Crm@LeadAddNew')->name('lead.add');
Route::post('/leads/add/new', $controller_path . '\dashboard\Crm@LeadAddNew')->name('lead.add');
Route::get('/leads/all' , $controller_path. '\dashboard\Crm@LeadIndex')->name('lead.all');
Route::get('/lead/delete/{lead_id}', $controller_path . '\dashboard\Crm@LeadDelete')->name('lead.delete');
Route::get('/lead/edit/{lead_id}', $controller_path . '\dashboard\Crm@LeadEdit')->name('lead.edit');
Route::post('/lead/edit/{lead_id}', $controller_path . '\dashboard\Crm@LeadEdit')->name('lead.update');
Route::post('/lead/re_assign/{lead_id}', $controller_path . '\dashboard\Crm@LeadAssign')->name('lead.assign');
Route::get('/received/leads/requests' , $controller_path. '\dashboard\Crm@LeadRequests')->name('lead.requests');
Route::get('/lead/request/view/{lead_id}', $controller_path . '\dashboard\Crm@LeadRequestView')->name('lead.request.view');
Route::get('/lead/request/accept/{lead_id}', $controller_path . '\dashboard\Crm@LeadRequestAccept')->name('lead.request.accept');
Route::get('/lead/request/reject/{lead_id}', $controller_path . '\dashboard\Crm@LeadRequestReject')->name('lead.request.reject');
Route::get('/lead/view/{lead_id}', $controller_path . '\dashboard\Crm@LeadView')->name('lead.view');


//Settings
Route::post('/dasboard/user/settings', $controller_path . '\dashboard\Crm@settings')->name('dashboard.user.settings');
Route::get('/pages/account-settings-account', $controller_path . '\pages\AccountSettingsAccount@index')->name('pages-account-settings-account');
Route::get('/pages/account-settings-new-user', $controller_path . '\pages\AccountSettingsAccount@NewUser')->name('pages-account-settings-new-user');
Route::post('/pages/account-settings-new-user', $controller_path . '\pages\AccountSettingsAccount@NewUser')->name('pages-account-settings-new-user');
Route::get('/pages/account-settings-new-user-edit/{user_id}', $controller_path . '\pages\AccountSettingsAccount@EditUser')->name('pages-account-settings-new-user-edit');
Route::post('/pages/account-settings-new-user-edit/{user_id}', $controller_path . '\pages\AccountSettingsAccount@EditUser')->name('pages-account-settings-new-user-edit');
Route::get('/pages/account-settings-new-user-delete/{user_id}', $controller_path . '\pages\AccountSettingsAccount@DeleteUser')->name('pages-account-settings-new-user-delete');
Route::get('/pages/users', $controller_path . '\pages\AccountSettingsAccount@Users')->name('pages-users');


//Events
Route::get('/events/add/new', $controller_path . '\dashboard\Crm@EventAddNew')->name('event.add');
Route::post('/events/add/new', $controller_path . '\dashboard\Crm@EventAddNew')->name('event.add');
Route::get('/events/all' , $controller_path. '\dashboard\Crm@EventIndex')->name('event.all');
Route::get('/event/delete/{event_id}', $controller_path . '\dashboard\Crm@EventDelete')->name('event.delete');
Route::get('/event/edit/{event_id}', $controller_path . '\dashboard\Crm@EventEdit')->name('event.edit');
Route::post('/event/edit/{event_id}', $controller_path . '\dashboard\Crm@EventEdit')->name('event.update');




});




