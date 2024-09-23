<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\User;
class UserController extends Controller
{


public function exportPdf()
{
    $users = User::all();
    $pdf = Pdf::loadView('users.pdf', compact('users'));
    return $pdf->download('users.pdf');
}

}
