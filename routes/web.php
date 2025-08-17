<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\GalleryController;
use App\Http\Controllers\Admin\MissionController;
use App\Http\Controllers\Admin\ProjectController;
use App\Http\Controllers\Admin\OurStoryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\DirectorsController;
use App\Http\Controllers\Admin\ManagmentTeamController;
use App\Http\Controllers\Admin\AuthenticationController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\CompanyProfileController;
use App\Http\Controllers\Admin\NewsEventController;
use App\Http\Controllers\Admin\OurStrengthController;
use App\Http\Controllers\Frontend\HomeController;
use App\Models\NewsEvent;

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

/*
|--------------------------------------------------------------------------
|   Admin panel login Route
|--------------------------------------------------------------------------
 */



 Route::get('/', [HomeController::class, 'index'])->name('index');
 Route::get('/about', [HomeController::class, 'About'])->name('about');
 Route::get('/director', [HomeController::class, 'Director'])->name('director');
 Route::get('/management-team', [HomeController::class, 'Management'])->name('management');

 Route::get('/mission-vission', [HomeController::class, 'Mission'])->name('mission.vission');
 Route::get('/all-projects', [HomeController::class, 'allproject'])->name('all.project');
 Route::get('/contact', [HomeController::class, 'Contact'])->name('contact');

Route::get('/projects/status/{status}', [HomeController::class, 'projectsByStatus'])->name('projects.by.status');
Route::get('/projects/filter', [HomeController::class, 'projectsByStatus'])->name('projects.filter');

Route::get('/project/{slug}', [HomeController::class, 'show'])->name('project.details');
Route::get('/success-stories/{id}', [HomeController::class, 'storyDetails'])->name('success-stories.show');

Route::get('/events/news', [HomeController::class, 'Event'])->name('event.show');
Route::get('/blog-events/{id}', [HomeController::class, 'blogEventDetails'])->name('blog.events.details');



// blogs section 

Route::get('blog', [HomeController::class, 'VlogSection'])->name('vlog');

Route::get('/blog/{id}', [HomeController::class, 'blogsingleDetails'])->name('blog.single.details');






    Route::group(['middleware' => 'guest'], function () {
        Route::get('/login', [AuthenticationController::class, 'login'])->name('login');
        Route::post('/login', [AuthenticationController::class, 'authCheck'])->name('login.check');
    });

/*
|--------------------------------------------------------------------------
|   Admin panel login End =================================================
|--------------------------------------------------------------------------
 */


/*
|--------------------------------------------------------------------------
|   Admin Dashboard route
|--------------------------------------------------------------------------
 */
Route::group(['middleware' => 'adminAuth'], function () {
    Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');
    Route::get('/registration', [AuthenticationController::class, 'registration'])->name('admin.registration');
    Route::post('/registration', [AuthenticationController::class, 'newUser'])->name('registration.store');
    Route::get('/user/edit/{id}', [AuthenticationController::class, 'userEdit'])->name('admin.user.edit');
    Route::post('/user/update/{id}', [AuthenticationController::class, 'userUpdate'])->name('admin.user.update');
    Route::post('/user/delete', [AuthenticationController::class, 'userDelete'])->name('admin.user.delete');
    Route::put('/password', [AuthenticationController::class, 'passwordUpdate'])->name('password.change');
    Route::get('/profile', [AuthenticationController::class, 'profile'])->name('profile');
    Route::post('/profile', [AuthenticationController::class, 'profileUpdate'])->name('profile.update');
    Route::get('/logout', [AuthenticationController::class, 'logout'])->name('admin.logout');



    // web.php (admin routes)
Route::get('/managment/head-image/edit', [ManagmentTeamController::class, 'editHeadImage'])->name('managment.head_image.edit');
Route::post('/managment/head-image/update', [ManagmentTeamController::class, 'updateHeadImage'])->name('managment.head_image.update');



    // company profile 
    Route::get('/company-profile', [CompanyProfileController::class, 'index'])->name('company.index');
    Route::post('/company-profile/update', [CompanyProfileController::class, 'update'])->name('company_update');

    // why choose us 
    Route::get('/why-choose-us', [CompanyProfileController::class, 'chooseUs'])->name('chooseUs');
    Route::post('/why-choose-us/update', [CompanyProfileController::class, 'chooseUsUpdate'])->name('chooseUsUpdate');


    // messsage from ceo
    Route::get('/message-ceo', [CompanyProfileController::class, 'CeoDirector'])->name('Ceo.Director');
Route::post('/message-ceo/update', [CompanyProfileController::class, 'CeoDirectorUpdate'])->name('Ceo.DirectorUpdate');


    

    // our story route
    Route::get('/our/story', [OurStoryController::class, 'index'])->name('story.index');
    Route::post('/our/story/store', [OurStoryController::class, 'store'])->name('story.store');
    Route::get('/our/story/edit/{id}', [OurStoryController::class, 'edit'])->name('story.edit');
    Route::post('/our/story/update/{id}', [OurStoryController::class, 'update'])->name('story.update');
    Route::get('/our/story/delete/{id}', [OurStoryController::class, 'delete'])->name('story.delete');

    // our mission vision and values route
    Route::get('/our-mission-vision-values', [MissionController::class, 'index'])->name('mission.index');
    Route::post('/our-mission-vision-values/update', [MissionController::class, 'update'])->name('mission.update');

    // slider route
    Route::get('/slider', [SliderController::class, 'index'])->name('slider.index');
    Route::post('/slider/store', [SliderController::class, 'store'])->name('slider.store');
    Route::get('/slider/edit/{id}', [SliderController::class, 'edit'])->name('slider.edit');
    Route::post('/slider/update/{id}', [SliderController::class, 'update'])->name('slider.update');
    Route::get('/slider/delete/{id}', [SliderController::class, 'delete'])->name('slider.delete');

    // slider route
    Route::get('/our-strength', [OurStrengthController::class, 'index'])->name('strength.index');
    Route::post('/our-strength/store', [OurStrengthController::class, 'store'])->name('strength.store');
    Route::get('/our-strength/edit/{id}', [OurStrengthController::class, 'edit'])->name('strength.edit');
    Route::post('/our-strength/update/{id}', [OurStrengthController::class, 'update'])->name('strength.update');
    Route::get('/our-strength/delete/{id}', [OurStrengthController::class, 'delete'])->name('strength.delete');

    // Board-of-Directors route
    Route::get('/Board-of-Directors', [DirectorsController::class, 'index'])->name('directors.index');
    Route::post('/Board-of-Directors/store', [DirectorsController::class, 'store'])->name('directors.store');
    Route::get('/Board-of-Directors/edit/{id}', [DirectorsController::class, 'edit'])->name('directors.edit');
    Route::post('/Board-of-Directors/update/{id}', [DirectorsController::class, 'update'])->name('directors.update');
    Route::get('/Board-of-Directors/delete/{id}', [DirectorsController::class, 'delete'])->name('directors.delete');

    // Managment team route
    Route::get('/Managment-team', [ManagmentTeamController::class, 'index'])->name('managment.index');
    Route::post('/Managment-team/store', [ManagmentTeamController::class, 'store'])->name('managment.store');
    Route::get('/Managment-team/edit/{id}', [ManagmentTeamController::class, 'edit'])->name('managment.edit');
    Route::post('/Managment-team/update/{id}', [ManagmentTeamController::class, 'update'])->name('managment.update');
    Route::get('/Managment-team/delete/{id}', [ManagmentTeamController::class, 'delete'])->name('managment.delete');

    // our projects route 
    Route::get('/our-project', [ProjectController::class, 'index'])->name('project.index');
    Route::post('/our-project/store', [ProjectController::class, 'store'])->name('project.store');
    Route::get('/our-project/edit/{id}', [ProjectController::class, 'edit'])->name('project.edit');
    Route::post('/our-project/update/{id}', [ProjectController::class, 'update'])->name('project.update');
    Route::get('/our-project/delete/{id}', [ProjectController::class, 'delete'])->name('project.delete');

    // our projects gallery route 
    Route::get('/project-gallery', [GalleryController::class, 'index'])->name('gallery.index');
    Route::post('/project-gallery/store', [GalleryController::class, 'store'])->name('gallery.store');
    Route::get('/project-gallery/edit/{id}', [GalleryController::class, 'edit'])->name('gallery.edit');
    Route::post('/project-gallery/update/{id}', [GalleryController::class, 'update'])->name('gallery.update');
    Route::get('/project-gallery/delete-all/{project_id}', [GalleryController::class, 'deleteAllByProject'])->name('gallery.deleteAllByProject');

    // news and event route
    Route::get('/news-events', [NewsEventController::class, 'index'])->name('newsEvent.index');
    Route::post('/news-events/store', [NewsEventController::class, 'store'])->name('newsEvent.store');
    Route::get('/news-events/edit/{id}', [NewsEventController::class, 'edit'])->name('newsEvent.edit');
    Route::post('/news-events/update/{id}', [NewsEventController::class, 'update'])->name('newsEvent.update');
    Route::get('/news-events/delete/{id}', [NewsEventController::class, 'delete'])->name('newsEvent.delete');

    // news and event route
    Route::get('/news-events', [NewsEventController::class, 'index'])->name('newsEvent.index');
    Route::post('/news-events/store', [NewsEventController::class, 'store'])->name('newsEvent.store');
    Route::get('/news-events/edit/{id}', [NewsEventController::class, 'edit'])->name('newsEvent.edit');
    Route::post('/news-events/update/{id}', [NewsEventController::class, 'update'])->name('newsEvent.update');
    Route::get('/news-events/delete/{id}', [NewsEventController::class, 'delete'])->name('newsEvent.delete');

    // blog route
    Route::get('/our-blogs', [BlogController::class, 'index'])->name('blogs.index');
    Route::post('/our-blogs/store', [BlogController::class, 'store'])->name('blogs.store');
    Route::get('/our-blogs/edit/{id}', [BlogController::class, 'edit'])->name('blogs.edit');
    Route::post('/our-blogs/update/{id}', [BlogController::class, 'update'])->name('blogs.update');
    Route::get('/our-blogs/delete/{id}', [BlogController::class, 'delete'])->name('blogs.delete');
});
