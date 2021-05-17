<?php

namespace App\Http\Controllers;
//above in controller. có dòng này vscode mới có thể truy cập được vào webpatser
use Illuminate\Support\Str;
use App\Models\Document;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Webpatser\Uuid\Uuid;

class DocumentController extends Controller
{
    //
    public function __construct(){
        $this->middleware('auth');
    }

    public function index($malop)
    {
        $lophoc=DB::table('lop_hoc')
        ->join('mon_hoc','mon_hoc.id','=','lop_hoc.monhoc_id')
        ->select('lop_hoc.*','mon_hoc.tenmh')
        ->where('lop_hoc.id',$malop)
        ->first();
        $documents=DB::table('documents')
        ->join('users','users.id','=','documents.user_id')
        ->select('documents.*','users.name')
        ->where('malop','=',$malop)
        ->get();
        return view('documents.index',['documents'=>$documents,'lopHoc'=>$lophoc]);
        // return view('documents.index');
    }

    public function create($malop)
    {
        $lophoc=DB::table('lop_hoc')
        ->join('mon_hoc','mon_hoc.id','=','lop_hoc.monhoc_id')
        ->select('lop_hoc.*','mon_hoc.tenmh')
        ->where('lop_hoc.id',$malop)
        ->first();
        return view('documents.create',['lopHoc'=>$lophoc]);
    }
    public function store(Request $request)
    {
        $document = $request->all();
        $document['uuid'] = (string)Uuid::generate();
        if ($request->hasFile('cover')) {
            $document['malop']=$request->malop;
            $document['user_id']=$request->user_id;
            $document['cover'] = $request->cover->getClientOriginalName();
            $request->cover->storeAs('documents', $document['cover']);
        }
        Document::create($document);
        return redirect()->route('documents.index',['malop'=>$request->malop]);
    }
    public function download($uuid)
    {
        $document = Document::where('uuid', $uuid)->firstOrFail();
        $pathToFile = storage_path('app/documents/' . $document->cover);
        return response()->download($pathToFile);
    }
}
