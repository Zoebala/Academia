<?php

use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Auth;
use \App\http\Controllers\OptionPage;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AnneeController;
use App\Http\Controllers\PayerController;
use App\Http\Controllers\AccueilController;
use App\Http\Controllers\AnnonceController;
use App\Http\Controllers\SectionController;
use App\Http\Controllers\EtudiantController;
use App\Http\Controllers\PromotionController;
use App\Http\Controllers\CommuniqueController;
use App\Http\Controllers\TranchepayController;
use App\Http\Controllers\DepartementController;
use App\Http\Controllers\ParametrageController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\DocumentationController;
use App\Http\Controllers\ElementsdossierController;
use App\Http\Controllers\InscriptionAdminController;
use App\Http\Controllers\TypefraisController;

// Route::view('/',"pages.affichages.Accueil");

// Route etudiants
Route::view("etudiant","pages.insertions.formEtudiant")->name('etudiant');
Route::post("insertEtudiant",[EtudiantController::class,"InsertData"]);
Route::get("accueilEtudiantInscrit/{Etudiant}",[EtudiantController::class,"accueilEtudiantInscrit"]);
Route::get("editerEtudiant/{Etudiant}",[EtudiantController::class,"Editer"]);
Route::post("updateEtud",[EtudiantController::class,"update"]);
Route::middleware("isAdmin")->group(function(){
    Route::get("afficheEtudiant",[EtudiantController::class,"showData"]);
    Route::get("deleteEtudiant/{Etudiant}",[EtudiantController::class,"delete"]);
    Route::get("ListInscrit",[EtudiantController::class,"ListInscrit"]);
    Route::get("EtudiantInscrit",[EtudiantController::class,"DetailEtudiant"]);
    Route::get("PourcentageInf",[EtudiantController::class,"PourcentageInf"]);
    Route::get("PourcentageSup",[EtudiantController::class,"PourcentageSup"]);
    Route::get("page_notification/{id}",[EtudiantController::class,"notification"]);

});
Route::middleware("isUser")->group(function(){

    // Route Dossier Etudiant
    Route::get("formUploadFiles/{idEtudiant}/{idOption}",[ElementsdossierController::class,"index"]);
    Route::post("DossierEtudiant",[ElementsdossierController::class,"create"])->name("insertdossier");

});
Route::post("updateDossierEtudiant",[ElementsdossierController::class,"updateDossier"]);
Route::get("editerDossierEtudiant/{idEtudiant}/{idOption}",[ElementsdossierController::class,"editer"]);




//middleware de group pour administrateur
Route::middleware("isAdmin")->group(function(){
    //Route inscription Admin

    Route::get("inscription_admin",[InscriptionAdminController::class,"index"])->name("inscription_admin")->middleware("isAdmin");
    Route::post("inscription_admin_create",[InscriptionAdminController::class,"create"])->name("inscription_admin_create")->middleware("isAdmin");

    // Route paramère
    Route::get("formParametre",[ParametrageController::class,"ChargementData"]);
    // Route année
    Route::post("insertAnnee",[AnneeController::class,"insertData"]);
    Route::get("afficheAnneeAcad",[AnneeController::class,"showData"]);
    Route::get("deleteAnnee/{id}",[AnneeController::class,"deleteAnnee"]);
    Route::get("editerAnnee/{id}",[AnneeController::class,"editer"]);
    Route::post("updateAnnee",[AnneeController::class,"update"]);
});


// Routes options
Route::middleware("isAdmin")->group(function(){

    Route::get("delete/{key}",[OptionPage::class,"deleteData"]);
    Route::get("editer/{key}",[OptionPage::class,"showData"]);
    Route::get("/editOption/{id}",[OptionPage::class,"editerData"]);
    Route::view("afficheOption","pages.affichages.afficheOption");
    Route::post("updateOption",[OptionPage::class,"updateData"]);
    Route::get("formOption",[OptionPage::class,"getData"]);
    Route::post("insertOption",[OptionPage::class,"insertData"]);
});

//route pour options
Route::get("afficheOption",[OptionPage::class,"index"]);
Route::get("optionpage",[OptionPage::class,"loadData"]);
//route payement
Route::get("formPayement/{idEtudiant}",[PayerController::class,"index"])->name("formPayement");
Route::post("insertPayement",[PayerController::class,"create"])->name("insertPayement");
// Middleware de group pour utilisateur authentifié
Route::middleware("isAdmin")->group(function(){
    // Routes Départements
    Route::get("afficheDepart",[DepartementController::class,"showData"]);
    Route::post("InsertDepart",[DepartementController::class,"insertDepartData"]);
    Route::get("editDepart/{id}",[DepartementController::class,"editerDep"]);
    Route::post("updateDepartement",[DepartementController::class,"updateDepart"]);
    Route::get("deleteDepart/{id}",[DepartementController::class,"deleteDepart"]);


// Routes Section
Route::middleware("isAdmin")->group(function(){

    Route::get("afficheSection",[SectionController::class,"showData"]);
    Route::post("InsertionSection",[SectionController::class,"validateSection"]);
    Route::get("editSection/{id}",[SectionController::class,"showBeforeEdit"]);
    Route::get("deleteSection/{id}",[SectionController::class,"delete"]);
    Route::post("updateSection",[SectionController::class,"editerSection"]);
});


//Routes logo
Route::view("logo","pages.affichages.afficheLogoAccueil");
// Routes payements
// Route::view("affichepayement","pages.affichages.afficheListePayement")->name("payement");

Route::middleware("isAdmin")->group(function(){

    Route::get("afficherListePayement",[PayerController::class,"AfficherListe"])->name("afficherPayement");
    Route::get("deletePayer/{id}",[PayerController::class,"deletePayer"]);
    Route::get("editPayer/{payement}",[PayerController::class,"showData"]);
    Route::post("updatePayement",[PayerController::class,"updatePayement"]);
    Route::get("afficherPromoPayer",[PayerController::class,"afficherPromoPayer"]);
    Route::get("promoPayerId/{id}",[PayerController::class,"promoPayer"]);

});
// Routes Candidats Test
Route::view("candidatTest","pages.affichages.afficheCandidatTest")->name("candidatTest");
//Routes appartenance Etudiant
Route::view("appartenanceEtudiant","pages.affichages.afficheAppartenanceEtudiant")->name("appartEtudiant");
//Route pour Tranche
// Route::view("tranche","pages.affichages.afficheListeTranche")->name("tranche");
Route::get("formTranche",[TranchepayController::class,"index"])->name("formTranche");

Route::middleware("isAdmin")->group(function(){

    //Route pour Tranche
    Route::post("createTranche",[TranchepayController::class,"create"])->name("createTranche");
    Route::get("AfficherListeTranche",[TranchepayController::class,"AfficherListe"])->name("AfficherListeTranche");
    Route::get("editTranche/{id}",[TranchepayController::class,"showData"]);
    Route::post("updateTranche",[TranchepayController::class,"updateTranche"])->name("updateTranche");
    Route::get("deleteTranche/{tranche}",[TranchepayController::class,"deleteTranche"]);

});

});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// Route page d'acc
Route::get("accueil",[AccueilController::class,"chargement"])->name('accueil');
Route::get("/",[AccueilController::class,"chargement"]);

Route::middleware("isAdmin")->group(function(){
//Route annonce
Route::get('formAnnonce',[AnnonceController::class,'index']);
Route::post('insertAnnonce',[AnnonceController::class,'create']);
Route::get('afficheAnnonce',[AnnonceController::class,"show"]);
Route::get('deleteAnnonce/{Annonce}',[AnnonceController::class,"delete"]);
Route::get('editerAnnonce/{Annonce}',[AnnonceController::class,"editer"]);
Route::post('updateAnnonce',[AnnonceController::class,"update"]);

//Routes pour les communiqués
Route::get('formCommunique',[CommuniqueController::class,'index']);
Route::post('insertIndivMessage',[CommuniqueController::class,"createIndivMessage"]);
Route::post('insertColMessage',[CommuniqueController::class,"createColMessage"]);
// Route Pour la documentation de l'isp
Route::get('Documentation',[DocumentationController::class,"affiche"]);
//envoi des sms avec laravel: se fait en ligne(avec connexion internet)
Route::get("send-sms-notification",[NotificationController::class,"sendSmsNotification"]);

// Routes pour promotion

Route::post('insertPromotion',[PromotionController::class,"create"]);
Route::get('affichePromotion',[PromotionController::class,"show"]);
Route::get('deletePromotion/{Promo}',[PromotionController::class,"delete"]);
Route::get('editerPromotion/{id}',[PromotionController::class,"editer"]);
Route::post('updatePromotion',[PromotionController::class,"update"]);


//Routes Type frais
Route::get("/formTypeFrais",[TypefraisController::class,"index"]);
Route::post("/insertTypeFrais",[TypefraisController::class,"create"]);
Route::get("/affichefrais",[TypefraisController::class,"show"]);
Route::get("deleteFrais/{frais}",[TypefraisController::class,"delete"]);
Route::get("editerFrais/{frais}",[TypefraisController::class,"editer"]);
Route::post("updateTypeFrais",[TypefraisController::class,"update"]);

});
