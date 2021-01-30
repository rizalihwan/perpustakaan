<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Borrowing;
use PDF;

class ReportController extends Controller
{
    public $autoNumber = 1;

    public function borrowingReport()
    {
        return view('admin.laporan.peminjaman.index');
    }

    public function borrowingReportSearch()
    {
        $search = request('borrow_date');
        return view('admin.laporan.peminjaman.index', [
            'autoNum' => $this->autoNumber,
            'borrowings' => Borrowing::with('student', 'book')->orderBy('borrow_code', 'ASC')->where('borrow_date', $search)->get()
        ]);
    }

    public function generateReportPdf()
    {
        $search = request('borrow_date');
        $borrowings = Borrowing::with('student', 'book')->orderBy('borrow_code', 'ASC')->where('borrow_date', $search)->get();
    	$pdf = PDF::loadview('admin.laporan.peminjaman.generate-pdf', [
            'autoNum' => $this->autoNumber,
            'borrowings'=> $borrowings
        ]);
    	return $pdf->stream();
    }
}
