<?php

namespace App\Http\Controllers;

use App\Models\Documents;
use App\Services\DocumentService;
use Barryvdh\DomPDF\Facade\Pdf;
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

    public function deleteDocument(Request $request)
    {
        $type   = $this->documentService->deleteDocument($request);
        $orderId = $request->order_id_route;
        return redirect()->route('order.detail',['id' => $orderId])->with('success' , $type.' deleted successfully!');
    }

    public function indexConfirmation(Request $request)
    {
        $detail = $this->documentService->indexConfirmation($request);
        return view('document.confirmation.index',compact('detail'));
    }

    public function indexDelivery(Request $request)
    {
        $detail = $this->documentService->indexDelivery($request);
        return view('document.delivery.index',compact('detail'));
    }

    public function indexInvoince(Request $request)
    {
        $detail = $this->documentService->indexInvoice($request);
        return view('document.invoice.index',compact('detail'));
    }
    public function editConfirmation(Request $request)
    {
        $detail = $this->documentService->editConfirmation($request);
        return view('document.confirmation.index',compact('detail'));
    }

    public function editDelivery(Request $request)
    {
        $detail = $this->documentService->editDelivery($request);
        return view('document.delivery.index',compact('detail'));
    }

    public function editInvoice(Request $request)
    {
        $detail = $this->documentService->editInvoice($request);
        return view('document.invoice.index',compact('detail'));
    }

    public function searchCustomer(Request $request)
    {
        return $this->documentService->searchCustomer($request);
    }

    public function printContent(Request $request) {


        $order = Documents::where('order_id_name', $request->order_id_name)
            ->where('type', 'confirmation')
            ->first();

        if(!$order) {
            return response()->json([
                'message' => 'Document not found'
            ], 400);
        }
        $request->id = $order->order_id;
        $detail = $this->documentService->indexConfirmation($request);
        $pdf = PDF::loadView('document.print', compact('detail'));
        return $pdf->stream();
    }


    public function saveDocumentConfirmation(Request $request) {
        $orderId = $this->documentService->saveDocument($request);
        return response()->json(['order_id' => $orderId], 200);
    }

    public function saveDocumentDelivery(Request $request) {
        $orderId = $this->documentService->saveDocumentDelivery($request);
        return response()->json(['order_id' => $orderId], 200);
    }

    public function saveDocumentInvoice(Request $request) {
        $orderId = $this->documentService->saveDocumentInvoice($request);
        return response()->json(['order_id' => $orderId], 200);
    }

    public function printControl(Request $request) {
        $order = Documents::where('order_id_name', $request->order_id_name)
            ->where('type', $request->confirmation_type)
            ->where('id', $request->id)
            ->first();

        if(!$order) {
            return response()->json([
                'message' => 'Document not found'
            ], 400);
        }
        return response()->json(['order_id' => $order->id], 200);
    }
}
