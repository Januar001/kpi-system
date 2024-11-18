<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BonusController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\SalaryController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\KpiPeriodController;
use App\Http\Controllers\EvaluationController;
use App\Http\Controllers\KpiCategoryController;
use App\Http\Controllers\KpiIndicatorController;
use App\Http\Controllers\PerformanceScoreController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {return view('dashboard.index');});

Route::resource('employees', EmployeeController::class);
Route::post('/employees/import', [EmployeeController::class, 'import'])->name('employees.import');


Route::resource('kpi-categories', KpiCategoryController::class);

Route::resource('kpi-indicators', KpiIndicatorController::class);

Route::resource('evaluations', EvaluationController::class);

Route::resource('performance-scores', PerformanceScoreController::class);

Route::resource('bonuses', BonusController::class);

Route::resource('salaries', SalaryController::class);

Route::resource('kpi-periods', KpiPeriodController::class);

Route::resource('reports', ReportController::class);
