<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Exports\UserFormatExport;
use Maatwebsite\Excel\Facades\Excel;

class UserExportController extends Controller
{
    public function downloadFormat()
    {
        return Excel::download(new UserFormatExport, 'format_user.xlsx');
    }
}
