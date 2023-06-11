<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\DocumentCategoryResource;
use App\Http\Resources\DocumentResource;
use App\Http\Resources\EmployeeResource;
use App\Http\Resources\ImportantLinkResource;
use App\Http\Resources\OfficeDetailResource;
use App\Http\Resources\OfficeSettingResource;
use App\Http\Resources\PhotoGalleryResource;
use App\Http\Resources\SliderResource;
use App\Http\Resources\SubDivisionDocumentResource;
use App\Http\Resources\SubDivisionEmployeeResource;
use App\Http\Resources\SubDivisionResource;
use App\Http\Resources\VideoGalleryResource;
use App\Models\Document;
use App\Models\DocumentCategory;
use App\Models\Employee;
use App\Models\Link;
use App\Models\OfficeDetail;
use App\Models\OfficeSetting;
use App\Models\PhotoGallery;
use App\Models\Slider;
use App\Models\SubDivision\SubDivision;
use App\Models\SubDivision\SubDivisionDocument;
use App\Models\SubDivision\SubDivisionEmployee;
use App\Models\VideoGallery;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class PublicApiController extends Controller
{
    public function home()
    {
        $officeSetting = OfficeSetting::with('chief.designation', 'informationOfficer.designation')->latest()->first();
        $noticeCategory = DocumentCategory::with(['mainDocuments' => function ($query) {
            $query->with('mainDocumentCategory', 'documentCategory', 'files')->whereStatus(1)->orderByDesc('published_date')->take(4);
        }])
            ->where('type', "Notice")
            ->whereNull('document_category_id')
            ->first();

        return [
            'chief' => new EmployeeResource($officeSetting->chief),
            'information_officer' => new EmployeeResource($officeSetting->informationOfficer),
            'notice_slug' => $noticeCategory->slug ?? '',
            'notices' => DocumentResource::collection($noticeCategory->mainDocuments ?? collect()),
            'sliders' => SliderResource::collection(Slider::all()),
            'videos' => VideoGalleryResource::collection(VideoGallery::all())
        ];
    }

    public function introduction()
    {
        $officeSetting = OfficeSetting::with('chief.designation', 'informationOfficer.designation')->latest()->first();

        return [
            'introduction' => new OfficeDetailResource(OfficeDetail::where('type', 'Introduction')->first()),
            'cover_photo' => asset('storage/' . $officeSetting->cover_photo)
        ];
    }

    public function employees(): AnonymousResourceCollection
    {
        return EmployeeResource::collection(Employee::with('designation', 'department')->orderBy('position')->get());
    }

    public function mainCategories(): AnonymousResourceCollection
    {
        return DocumentCategoryResource::collection(DocumentCategory::with('documentCategory')->whereNull('document_category_id')->orderBy('position')->get());
    }

    public function categoryDocuments(DocumentCategory $documentCategory): AnonymousResourceCollection
    {
        $documentCategory->load([
            'mainDocuments' => function ($query) {
                $query->with('mainDocumentCategory', 'documentCategory', 'files')->whereStatus(1)->orderByDesc('published_date');
            },
            'documents' => function ($query) {
                $query->with('documentCategory', 'mainDocumentCategory', 'files')->whereStatus(1)->orderByDesc('published_date');
            }
        ]);

        return DocumentResource::collection($documentCategory->documents->count() > 0 ? $documentCategory->documents : $documentCategory->mainDocuments);
    }

    public function documentDetail(Document $document): DocumentResource
    {
        $document->load('files');

        return new DocumentResource($document);
    }

    public function photoGallery(): AnonymousResourceCollection
    {
        return PhotoGalleryResource::collection(PhotoGallery::with('photos')->get());
    }

    public function photoGalleryDetails(PhotoGallery $photoGallery): PhotoGalleryResource
    {
        $photoGallery->load('photos');

        return new PhotoGalleryResource($photoGallery);
    }

    public function videoGallery(): AnonymousResourceCollection
    {
        return VideoGalleryResource::collection(VideoGallery::all());
    }

    public function subDivisions(): AnonymousResourceCollection
    {
        return SubDivisionResource::collection(SubDivision::all());
    }

    public function subDivisionDetail(SubDivision $subDivision)
    {
        $subDivision->load(['subDivisionDocuments' => function ($query) {
            $query->with('subDivisionDocumentCategory')->whereStatus(1)->orderByDesc('date')->orderByDesc('date');
        }]);
        $subDivisionChief = SubDivisionEmployee::where('sub_division_id', $subDivision->id)->whereIsChief(1)->first();

        return [
            'chief' => new SubDivisionEmployeeResource($subDivisionChief),
            'notices' => SubDivisionDocumentResource::collection($subDivision->subDivisionDocuments),
        ];
    }

    public function subDivisionDocumentDetail(SubDivisionDocument $subDivisionDocument): SubDivisionDocumentResource
    {
        $subDivisionDocument->load('files');

        return new SubDivisionDocumentResource($subDivisionDocument);
    }

    public function importantLinks(): AnonymousResourceCollection
    {
        return ImportantLinkResource::collection(Link::latest()->get());
    }

    public function contact(): OfficeSettingResource
    {
        return new OfficeSettingResource(OfficeSetting::with(['officeSettingHeaders' => function ($query) {
            $query->orderBy('position');
        }])->first());
    }

    public function search($keyword): AnonymousResourceCollection
    {
        return DocumentResource::collection(Document::search($keyword)->query(function ($builder) {
            $builder->with('mainDocumentCategory', 'documentCategory', 'files');
        })->get()
        );
    }
}
