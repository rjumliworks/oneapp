<?php

namespace App\Services\Vrams\Travel;

use Hashids\Hashids;
use App\Models\Travel;
use App\Models\TravelCode;
use App\Models\Signatory;
use App\Models\RequestDate;
use App\Models\RequestComments;
use App\Models\RequestReport;
use App\Models\RequestSignatory;
use Endroid\QrCode\QrCode;
use Endroid\QrCode\Writer\PngWriter;
use App\Http\Resources\Vrams\TravelResource;
use App\Http\Resources\Vrams\ScheduleResource;

class ViewClass
{   
    public function show($code){
    
        $hashids = new Hashids('krad',10);
        $id = $hashids->decode($code);

        $data = Travel::with([
            'mode',
            'expense',
            'request.comments.user.profile:user_id,firstname,middlename,lastname,avatar','request.comments.replies.user.profile:user_id,firstname,middlename,lastname,avatar',
            'request.tags.user:id',
            'request.tags.user.profile:user_id,firstname,middlename,lastname,avatar',
            'request.statuses.user:id',
            'request.statuses.user.profile:user_id,firstname,middlename,lastname',
            'request.statuses.status',
            'request.status',
            'request.type',
            'request.dates',
            'request.detail',
            'request.user:id',
            'request.user.profile:user_id,firstname,middlename,lastname',
            'request.signatories.division','request.signatories.approved','request.signatories.recommended',
            'request.location.region:code,name,region','request.location.province:code,name','request.location.municipality:code,name','request.location.barangay:code,name'
        ])
        ->where('id',$id[0])
        ->first();

        return new TravelResource($data);
    }

    public function travel($request){
        $data = Travel::with([
            'mode',
            'expense',
            'request.comments',
            'request.tags.user:id',
            'request.tags.user.profile:user_id,firstname,middlename,lastname,avatar',
            'request.statuses.user:id',
            'request.statuses.user.profile:user_id,firstname,middlename,lastname',
            'request.statuses.status',
            'request.status',
            'request.type',
            'request.dates',
            'request.detail',
            'request.user:id',
            'request.user.profile:user_id,firstname,middlename,lastname',
            'request.signatories.division','request.signatories.approved','request.signatories.recommended',
            'request.location.region:code,name,region','request.location.province:code,name','request.location.municipality:code,name','request.location.barangay:code,name'
        ])
        ->when($request->mode, fn($q, $mode) => $q->where('mode_id', $mode))
        ->when($request->expense, fn($q, $expense) => $q->where('expense_id', $expense))
        ->when($request->keyword, function ($query, $keyword) {
            $query->whereHas('request.user.profile', function ($q) use ($keyword) {
                $q->whereRaw('LOWER(CONCAT(firstname, " ", lastname)) LIKE ?', ['%' . strtolower($keyword) . '%'])
                ->orWhereRaw('LOWER(CONCAT(lastname, " ", firstname)) LIKE ?', ['%' . strtolower($keyword) . '%']);
            })
            ->orWhereRaw('LOWER(destination) LIKE ?', ['%' . strtolower($keyword) . '%'])
            ->orWhereRaw('LOWER(purpose) LIKE ?', ['%' . strtolower($keyword) . '%']);
        })
        ->when($request->status, function ($query, $status) {
            $query->whereHas('request', function ($query) use ($status) {
               $query->where('status_id',$status);
            });
        })
        ->latest() 
        ->paginate($request->count ?? 10);

        return TravelResource::collection($data);
    }

    public function counts($statuses){
        foreach($statuses as $status){
            $counts[] = Travel::
            whereHas('request',function ($query) use ($status){
                $query->where('status_id',$status['value']);
            })
            ->count();
        }
        return $counts;
    }

    public function schedule(){
        $data = RequestDate::with([
            'request.tags.user:id',
            'request.tags.user.profile:user_id,firstname,middlename,lastname,avatar',
            'request.statuses.user:id',
            'request.statuses.user.profile:user_id,firstname,middlename,lastname',
            'request.statuses.status',
            'request.status',
            'request.type',
            'request.dates',
            'request.detail',
            'request.user:id',
            'request.user.profile:user_id,firstname,middlename,lastname',
            'request.location.region:code,name,region','request.location.province:code,name','request.location.municipality:code,name','request.location.barangay:code,name',
            'request.travel',
            'request.reservation.vehicle'    
        ])->get();

        return ScheduleResource::collection($data);
    }

    public function print($request){
        $hashids = new Hashids('krad',10);
        $id = $hashids->decode($request->id);
        // $travel_id = $hashids->decode($request->travel);
        $travel_id = Travel::where('request_id',$id[0])->value('id');
        $data = RequestReport::where('request_id',$id[0])->value('information');
       
        $url = $_SERVER['HTTP_HOST'].'/verification/'.$request->id;
        $qrCode = new QrCode($url);
        $qrCode->setSize(300);
        $pngWriter = new PngWriter();
        $qrCodeImageString = $pngWriter->write($qrCode)->getString();
        $base64Image = 'data:image/png;base64,' . base64_encode($qrCodeImageString);

        $travel = json_decode($data,true);
        $groupedDivisions = [];

        foreach ($travel['employees'] as $employee) {
            $division = $employee['division'];
            $approval1 = Signatory::with('user.profile','division')->where('designation_id', 43)->first();
            $approval = $approval1->user->profile;
            $approval_name = "{$approval->firstname} "
            . (!empty($approval->middlename) ? strtoupper(substr($approval->middlename, 0, 1)) . '. ' : '')
            . "{$approval->lastname}";
            $approval_oic = $approval1->is_oic;

            if($division != 'Office of the Regional Director'){
                $recommended1 = Signatory::with('user.profile','division')->where('designation_id', 44)->whereHas('division', function ($query) use ($division){
                    $query->where('name', $division);
                })->first();
                $recommended = $recommended1->user->profile;
                $recommended_id = $recommended1->user_id;
                $recommended_name = "{$recommended->firstname} "
                . (!empty( $recommended->middlename) ? strtoupper(substr( $recommended->middlename, 0, 1)) . '. ' : '')
                . "{$recommended->lastname}";
                $recommended_oic = $recommended1->is_oic;
                $recommended_others = $recommended1->division->others;
            }else{
                $recommended_id = '-';
                $recommended_name = 'Not needed';
                $recommended_oic = '-';
                $recommended_others = '-';
            }

            $signatory = RequestSignatory::with('recommended.user.profile:user_id,firstname,middlename,lastname','approved.user.profile:user_id,firstname,middlename,lastname')
            ->where('division_id',$employee['division_id'])->where('request_id',$id[0])->first();

            if (!isset($groupedDivisions[$division])) {
                $groupedDivisions[$division] = [
                    'division' => $division,
                    'employees' => [],
                    'approval' => [
                        'name' => $approval_name,
                        'oic' => $approval_oic,
                        'short' => $approval1->division->others
                    ],
                    'recommend' =>  [
                        'id' => $recommended_id,
                        'name' => $recommended_name,
                        'oic' => $recommended_oic,
                        'short' => $recommended_others
                    ],
                    'signatory' => [
                        'approved' => $signatory->approved,
                        'recommend' => $signatory->recommended,
                        'approved_only' => $signatory->is_approval_only
                    ],
                    'code' => TravelCode::where('division_id',$employee['division_id'])->where('travel_id',$travel_id)->value('code') 
                ];
            }
            $groupedDivisions[$division]['employees'][] = $employee;
        }
        
        $array = [
            'qrCodeImage' => $base64Image,
            'divisions' => array_values($groupedDivisions),
            'travel' => json_decode($data)
        ]; 

        $pdf = \PDF::loadView('reports.travel',$array)->setPaper('a4', 'portrait');
        $pdf->output();
        $dompdf = $pdf->getDomPDF();
        $canvas = $dompdf->getCanvas();
        $canvas->page_script(function ($pageNumber, $pageCount, $canvas, $fontMetrics) {
            $copies = 1;
            $totalPagesPerCopy = $pageCount / $copies;
            $currentPageInCopy = ($pageNumber - 1) % $totalPagesPerCopy + 1;
            $text = "PAGE $currentPageInCopy OF $totalPagesPerCopy";
            $font = $fontMetrics->get_font("Helvetica", "normal");
            $size = 7;
            $width = $fontMetrics->get_text_width($text, $font, $size);
            $canvas->text(106 - $width, 796, $text, $font, $size);
        });
        return $pdf->stream($travel['code'].'.pdf');
    }
}


