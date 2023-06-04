<?php

use App\Modules\ClientsLogic\Controllers\ClientAddress\DeleteClientAddress;
use App\Modules\ClientsLogic\Controllers\ClientAddress\GetClientAddress;
use App\Modules\ClientsLogic\Controllers\ClientAddress\StoreClientAddress;
use App\Modules\ClientsLogic\Controllers\ClientAddress\UpdateClientAddress;
use App\Modules\ClientsLogic\Controllers\ClientContactInfo\DeleteClientContactInfo;
use App\Modules\ClientsLogic\Controllers\ClientContactInfo\GetClientContactInfo;
use App\Modules\ClientsLogic\Controllers\ClientContactInfo\StoreClientContactInfo;
use App\Modules\ClientsLogic\Controllers\ClientContactInfo\UpdateClientContactInfo;
use App\Modules\ClientsLogic\Controllers\ClientFile\StoreClientFile;
use App\Modules\ClientsLogic\Controllers\ClientPhones\DeleteClientPhone;
use App\Modules\ClientsLogic\Controllers\ClientPhones\GetClientPhone;
use App\Modules\ClientsLogic\Controllers\ClientPhones\StoreClientPhone;
use App\Modules\ClientsLogic\Controllers\ClientPhones\UpdateClientPhone;
use App\Modules\ClientsLogic\Controllers\ClientPieces\DeleteClientPiece;
use App\Modules\ClientsLogic\Controllers\ClientPieces\GetClientPiece;
use App\Modules\ClientsLogic\Controllers\ClientPieces\StoreClientPiece;
use App\Modules\ClientsLogic\Controllers\ClientPieces\UpdateClientPiece;
use App\Modules\ClientsLogic\Controllers\ClientProfile\DeleteClientProfile;
use App\Modules\ClientsLogic\Controllers\ClientProfile\GetClientProfile;
use App\Modules\ClientsLogic\Controllers\ClientProfile\StoreClientProfile;
use App\Modules\ClientsLogic\Controllers\ClientProfile\UpdateClientProfile;
use App\Modules\ClientsLogic\Controllers\FileType\DeleteClientFileType;
use App\Modules\ClientsLogic\Controllers\FileType\StoreClientFileType;
use App\Modules\ClientsLogic\Controllers\FileType\UpdateClientFileType;
use App\Modules\ClientsLogic\Controllers\Special\UpdateClientSpecialCcp;
use App\Modules\ClientsLogic\Controllers\Special\UpdateClientSpecialInformation;
use App\Modules\ClientsLogic\Controllers\Special\UpdateClientSpecialPhoto;
use App\Modules\ClientsLogic\Controllers\Special\UpdateClientSpecialTelephone;
use App\Modules\ClientsUi\Controllers\ShowClientFileType;
use App\Modules\ClientsUi\Controllers\ShowCreateClientFile;
use App\Modules\ClientsUi\Controllers\ShowCreateClientFileType;
use App\Modules\ClientsUi\Controllers\ShowEditClientFileType;
use Illuminate\Support\Facades\Route;


//Route::group(['prefix' => 'clients', 'as' => 'client.'], function () {
//    Route::post('store', StoreClient::class)->name('store');
//    Route::put('{client}/update', UpdateClient::class)->name('update');
//    Route::delete('{client}/delete', DeleteClient::class)->name('delete');
//});

Route::group(['prefix' => 'clients-phone', 'as' => 'client-phone.'], function () {
    Route::get('{client_phone}', GetClientPhone::class)->name('get');
    Route::post('client/{client}/store-phone', StoreClientPhone::class)->name('store');
    Route::put('{client_phone}/update', UpdateClientPhone::class)->name('update');
    Route::delete('{client_phone}/delete', DeleteClientPhone::class)->name('delete');
});

Route::group(['prefix' => 'clients-piece', 'as' => 'client-piece.'], function () {
    Route::get('{client_piece}', GetClientPiece::class)->name('get');
    Route::post('client/{client}/store-piece', StoreClientPiece::class)->name('store');
    Route::put('{client_piece}/update', UpdateClientPiece::class)->name('update');
    Route::delete('{client_piece}/delete', DeleteClientPiece::class)->name('delete');
});

Route::group(['prefix' => 'clients-profile', 'as' => 'client-profile.'], function () {
    Route::get('{client_profile}', GetClientProfile::class)->name('get');
    Route::post('client/{client}/store-profile', StoreClientProfile::class)->name('store');
    Route::put('{client_profile}/update', UpdateClientProfile::class)->name('update');
    Route::delete('{client_profile}/delete', DeleteClientProfile::class)->name('delete');

    Route::put('{client}/update/special/info', UpdateClientSpecialInformation::class)->name('update-special-info');
    Route::put('{client}/update/special/tele', UpdateClientSpecialTelephone::class)->name('update-special-tele');
    Route::put('{client}/update/special/ccp', UpdateClientSpecialCcp::class)->name('update-special-ccp');
    Route::put('{client}/update/special/avatar', UpdateClientSpecialPhoto::class)->name('update-special-avatar');
});


Route::group(['prefix' => 'clients-contact-info', 'as' => 'client-contact-info.'], function () {
    Route::get('{client_contact_info}', GetClientContactInfo::class)->name('get');

    Route::post('client/{client}/store-contact-info', StoreClientContactInfo::class)->name('store');
    Route::put('{client_contact_info}/update', UpdateClientContactInfo::class)->name('update');
    Route::delete('{client_contact_info}/delete', DeleteClientContactInfo::class)->name('delete');
});

Route::group(['prefix' => 'clients-contact-info', 'as' => 'client-contact-info.'], function () {
    Route::get('{client_contact_info}', GetClientContactInfo::class)->name('get');

    Route::post('client/{client}/store-contact-info', StoreClientContactInfo::class)->name('store');
    Route::put('{client_contact_info}/update', UpdateClientContactInfo::class)->name('update');
    Route::delete('{client_contact_info}/delete', DeleteClientContactInfo::class)->name('delete');
});


Route::group(['prefix' => 'clients-file_type', 'as' => 'client-file_type.'], function () {


    Route::get('', ShowClientFileType::class)->name('index');
    Route::get('create', ShowCreateClientFileType::class)->name('create');
    Route::post('store', StoreClientFileType::class)->name('store');
    Route::delete('{client_file_type}/delete', DeleteClientFileType::class)->name('delete');
    Route::get('{client_file_type}', ShowEditClientFileType::class)->name('edit');
    Route::put('{client_file_type}/update', UpdateClientFileType::class)->name('update');

});


Route::group(['prefix' => 'clients-address', 'as' => 'client-address.'], function () {

//    Route::get('', ShowClientFileType::class)->name('index');
    Route::post('{client}/store', StoreClientAddress::class)->name('store');
//    Route::post('{client}/store-many', StoreArrayClientAddressDetail::class)->name('store-many');
    Route::delete('{client_address}/delete', DeleteClientAddress::class)->name('delete');
    Route::get('{client_address}', GetClientAddress::class)->name('get');
    Route::put('{client_address}/update', UpdateClientAddress::class)->name('update');

});


