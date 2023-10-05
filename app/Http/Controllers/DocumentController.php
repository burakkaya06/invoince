<?php

namespace App\Http\Controllers;

use App\Services\DocumentService;
use Illuminate\Http\Request;

class DocumentController extends Controller
{
    protected DocumentService $documentService;

    public function __construct (DocumentService $documentService)
    {
        $this->documentService = $documentService;
    }

    public function createConfirmation (Request $request)
    {
        $this->documentService->createConfirmation($request);
        return redirect()->route('order.detail')->with('success' , 'Confirmation created successfully!');
    }

    public function indexConfirmation(Request $request)
    {
        $detail = $this->documentService->indexConfirmation($request);
        return view('document.confirmation.index',compact('detail'));
    }

    public function searchCustomer(Request $request)
    {
        return $this->documentService->searchCustomer($request);
    }
}
