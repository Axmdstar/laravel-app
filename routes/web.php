 <?php
    //
    // use App\Http\Controllers\categorycontroller;
    // use App\Http\Controllers\quizcontroller;
    use App\Http\Controllers\categorycontroller;
    //
    // Route::get('/', function () {
    //     return view('welcome');
    // });
    //
    // // category routes
    // Route::get('/categories', [categorycontroller::class, 'get_all_category']);
    // Route::get('/categories/{id}', [categorycontroller::class, 'get_category_by_id']);
    // Route::post('/categories', [categorycontroller::class, 'create_category']);
    // Route::get('/categories/seed', [categorycontroller::class, 'seed_categories']);
    //
    // // quiz routes
    // Route::get('/quizzes', [quizcontroller::class, 'index']);
    // Route::get('/quizzes_category', [quizcontroller::class, 'get_all_quizzes_and_category']);
    // Route::get('/quizzes/{id}', [quizcontroller::class, 'show']);
    //
    use App\Http\Controllers\quizcontroller;
    use App\Models\category;
    use App\Models\quiz;
    use Illuminate\Support\Facades\Route;

    Route::get('/', function () {
        return view('welcome');
    });

    // View All Quizzes
    Route::get('/quizzes', function () {
        $quizzes = quiz::with('category')->get();

        return view('quizzes.index', compact('quizzes'));
    })->name('quizzes.index');

    // Show Create Form
    Route::get('/quizzes/create', function () {
        $categories = category::all(); // Get categories for the dropdown

        return view('quizzes.create', compact('categories'));
    })->name('quizzes.create');

    // Handle Form Submission (POST)
    Route::post('/quizzes', [quizcontroller::class, 'create'])->name('quizzes.store');
