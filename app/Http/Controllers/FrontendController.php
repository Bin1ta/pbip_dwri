<?php

namespace App\Http\Controllers;

use App\Enums\ProjectTypeEnum;
use App\Http\Requests\StoreContactMessageRequest;
use App\Models\Audio;
use App\Models\Bill;
use App\Models\Canal;
use App\Models\Committee;
use App\Models\CommitteeCategory;
use App\Models\CommitteeMember;
use App\Models\ContactMessage;
use App\Models\ContractProgress;
use App\Models\CurrentContract;
use App\Models\Document;
use App\Models\DocumentCategory;
use App\Models\Employee;
use App\Models\ExEmployee;
use App\Models\Faq;
use App\Models\ForestCategory;
use App\Models\ForestDetail;
use App\Models\Lawsuit;
use App\Models\Link;
use App\Models\OfficeDetail;
use App\Models\PhotoGallery;
use App\Models\Slider;
use App\Models\Smuggling;
use App\Models\SubDivision\SubDivision;
use App\Models\SubDivision\SubDivisionDocument;
use App\Models\SubDivision\SubDivisionEmployee;
use App\Models\TotalProgress;
use App\Models\FinishedContract;
use App\Models\VideoGallery;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;

class FrontendController extends BaseController
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        if (config('default.subDivision')) {
            $officeDetail = OfficeDetail::whereShowOnIndex(1)->whereType('Introduction')->first();
            $tickerFiles = Document::whereMarkAsNew(1)->orderBy('published_date')->get();
            $sliders = Slider::latest()->get();
            $canals = Canal::latest()->get();
            $categories = DocumentCategory::with([
                'documentCategories' => function ($query) {
                    $query->whereShowOnIndex(1)->orderBy('position');
                },
                'documentCategories.documents' => function ($query) {
                    $query->whereStatus(1)->orderByDesc('published_date');
                },
                'mainDocuments' => function ($query) {
                    $query->whereStatus(1)->orderByDesc('published_date');
                }
            ])
                ->whereShowOnIndex(1)
                ->whereNull('document_category_id')
                ->orderBy('position')
                ->get();

            $galleries = PhotoGallery::with('photos')->latest()->get();
            $noticePopups = Document::with('files')->where('popUp', 1)->get();
            $employees = Employee::with('designation', 'department')->orderBy('position')->get();
            $audios = Audio::latest()->get();
            return view('frontend.index', compact('audios', 'employees', 'officeDetail', 'tickerFiles', 'sliders', 'canals', 'categories', 'galleries', 'subDivisions', 'noticePopups'));
        } else {
            $officeDetail = OfficeDetail::whereShowOnIndex(1)->whereType('Introduction')->first();
            $tickerFiles = Document::whereMarkAsNew(1)->orderBy('published_date')->get();
            $sliders = Slider::latest()->get();
            $categories = DocumentCategory::with([
                'documentCategories' => function ($query) {
                    $query->whereShowOnIndex(1)->orderBy('position');
                },
                'documentCategories.documents' => function ($query) {
                    $query->whereStatus(1)->orderByDesc('published_date');
                },
                'mainDocuments' => function ($query) {
                    $query->whereStatus(1)->orderByDesc('published_date');
                }
            ])
                ->whereShowOnIndex(1)
                ->whereNull('document_category_id')
                ->orderBy('position')
                ->get();

            $galleries = PhotoGallery::with('photos')->latest()->get();
            $noticePopups = Document::with('files')->where('popUp', 1)->get();
            $employees = Employee::with('designation', 'department')->orderBy('position')->get();
            $audios = Audio::latest()->get();
            return view('frontend.index', compact('audios', 'employees', 'officeDetail', 'tickerFiles', 'sliders', 'categories', 'galleries', 'noticePopups'));
        }
    }

    public function search()
    {
        $keyword = request('keyword');
        if (empty($keyword)) {
            return back();
        }
        $documents = Document::search($keyword)->paginate(20);

        return view('frontend.search.search_res', compact('keyword', 'documents'));
    }

    public function officeDetails(OfficeDetail $officeDetail)
    {
        return view('frontend.officeDetail', compact('officeDetail'));
    }

    public function documentCategory(DocumentCategory $documentCategory)
    {
        //        dd( $_GET['language']);
        $documentCategory->load([
            'mainDocuments' => function ($query) {
                $query->with('mainDocumentCategory')->whereStatus(1)->orderByDesc('published_date');
            },
            'documents' => function ($query) {
                $query->with('documentCategory')->whereStatus(1)->orderByDesc('published_date');
            }
        ]);

        return view('frontend.document.document', compact('documentCategory'));
    }

    public function documentDetail(Document $document)
    {
        $document->load('files');

        $relatedDocuments = Document::with('mainDocumentCategory')->where('id', '!=', $document->id)
            ->where(function ($query) use ($document) {
                $query->where('document_category_id', $document->document_category_id);
                $query->where('main_document_category_id', $document->main_document_category_id);
            })
            ->orderByDesc('published_date')
            ->limit(5)
            ->get();

        return view('frontend.document.document_detail', compact('document', 'relatedDocuments'));
    }

    public function staticMenus($slug)
    {
        switch ($slug) {
            case 'contactUs':
                return view('frontend.contact');
                break;
            case 'photoGallery':
                $photoAlbums = PhotoGallery::with('photos')->latest()->get();
                return view('frontend.gallery.gallery', compact('photoAlbums'));
                break;
            case 'videoGallery':
                $videoGalleries = VideoGallery::latest()->get();
                return view('frontend.gallery.video', compact('videoGalleries'));
            case 'employees':
                $employees = Employee::with('designation', 'department')->orderBy('position')->get();
                return view('frontend.employee', compact('employees'));
            case 'bill':
                $bills = Bill::orderByDesc('bill_date')->get();
                return view('frontend.bill', compact('bills'));

            case 'faq':
                $faqs = Faq::latest()->get();
                return view('frontend.faq', compact('faqs'));
            case 'links':
                $importantLinks = Link::latest()->get();
                return view('frontend.links', compact('importantLinks'));

            case 'contractProgress':
                $contractProgresses = ContractProgress::where('progress_status', 1)->latest()->paginate(10);
                return view('frontend.contracts.contractProgress', compact('contractProgresses'));
            case 'totalProgress':
                $totalProgresses = TotalProgress::latest()->paginate(10);
                return view('frontend.contracts.totalProgress', compact('totalProgresses'));
            case 'finishedContract_badkapath':
                $finishedContracts = FinishedContract::where('place_id', ProjectTypeEnum::BADKAPATH->value)->latest()->paginate(10);
                return view('frontend.contracts.finishedContract', compact('finishedContracts'));
            case 'finishedContract_praganna':
                $finishedContracts = FinishedContract::where('place_id', ProjectTypeEnum::PRAGANNA->value)->latest()->paginate(10);
                return view('frontend.contracts.finishedContract', compact('finishedContracts'));
            case 'currentContract_badkapath':
                $currentContracts = CurrentContract::where('place_id', ProjectTypeEnum::BADKAPATH->value)->latest()->paginate(10);
                return view('frontend.contracts.currentContract', compact('currentContracts'));
            case 'currentContract_praganna':
                $currentContracts = CurrentContract::where('place_id', ProjectTypeEnum::PRAGANNA->value)->latest()->paginate(10);
                return view('frontend.contracts.currentContract', compact('currentContracts'));

            case 'allExEmployee':
                $exEmployees = ExEmployee::orderBy('leaving_date', 'asc')->get();
                return view('frontend.allExEmployee', compact('exEmployees'));

            case 'exEmployee':
                $exEmployees = ExEmployee::where('is_chief', 0)->orderBy('leaving_date', 'asc')->get();
                return view('frontend.allExEmployee', compact('exEmployees'));


            case 'audioGallery':
                $audios = Audio::latest()->get();
                return view('frontend.audio', compact('audios'));

            case 'exChief':
                $exEmployees = ExEmployee::where('is_chief', 1)->orderBy('leaving_date', 'asc')->get();
                return view('frontend.allExEmployee', compact('exEmployees'));

            default:
                return response(view('errors.404'), 404);
        }
    }


    public function sendMessage(StoreContactMessageRequest $request)
    {
        ContactMessage::create($request->validated());

        return back()->with('message', "Message Sent Successfully");
    }

    public function languageChange($lang)
    {

        if (config('default.dual_language')) {
            if (!empty($lang) && in_array($lang, config('app.locales'))) {
                Cache::put('language', $lang, 60 * 60 * 12);
                app()->setLocale($lang);
            } else {
                Cache::put('language', 'ne', 60 * 60 * 12);
                app()->setLocale('ne');
            }
        }
        $url = url()->previous();
        $route = app('router')->getRoutes($url)->match(app('request')->create($url))->getName();
        if ($route == 'welcome') {
            return redirect(\route($route, ['language' => $lang]));
        } else {
            $count = Str::length($url);

            $url = Str::substr($url, 0, $count - 2);
            return redirect($url . $lang ?? 'ne');
            //        dd('ads');
        }
    }

    public function committeeCategory(CommitteeCategory $committeeCategory)
    {
        $committees = Committee::with('committeeMembers')->whereHas('committeeMembers')->where('committee_category_id', $committeeCategory->id)->paginate(2);
        return view('frontend.committee.index', compact('committeeCategory', 'committees'));
    }
}
