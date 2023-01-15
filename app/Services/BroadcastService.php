<?php
namespace App\Services;
use App\Models\TV\BroadcastTime;
use Carbon\Carbon;

class BroadcastService
{
    public $prevTimeStart = '07:00:00'; // الوقت السابق من الحقل الحالي
    public $haveSpan = 0; // بتفحص اذا الحقل الي قبلو ماخد سبان ٢ ولا لا
    public $thisTime = []; // الوقت الحالي
    public $time_start = []; //ارراي بياخد الوقت واليوم ازا كان الوقت مش 00 او ٣٠
    public $start_time = '08:00';
    public $end_time = '23:00';
    public  $broadcastDays= [];
    public function generateBroadcastData($weekDays)
    {
        $broadcastTableData = [];
        $timeRange = (new TimeServices)->generateTimeRange($this->start_time,$this->end_time); // بجيب الاوقات كلها من الساعه ٨ ل الساعه ١١ مساء
        $broadcast_times  = BroadcastTime::where('status',1)->with('grade','subject','program','broadcast_type')
            ->orderBy('day','asc')->orderBy('start_time','asc')->get();
        foreach ($broadcast_times as $index=>$data)
        { //لاضيف بالمصفوفه البيانات وافحص اذا الساعه مش ٠٠ او ٣٠
            $split_time = explode(":", $data['start_time']);  //get array of string
            if ($split_time[1] >= 00 && $split_time[1] <=  20)
            {
                $edited_time = $split_time[0] .':'. '00'.':'.'00';
                $this->time_start[$edited_time.$data->day] = $data;
            }
            if ($split_time[1] >= 21 && $split_time[1] <= 40) {
                $edited_time = $split_time[0] .':'. '30'.':'.'00';
                $this->time_start[$edited_time.$data->day] = $data;
            }
        }
        //return $this->time_start;
        foreach ($timeRange as $time) // بجيب الوقت نص ساعه نص ساعه
        {
            $currentTimeData = '';
            $timeText = $time['start'].'-'.$time['end'];
            $broadcastTableData[$timeText] = [] ; // هاي المصفوفة الي بدي احط فيها البيانات كلها لنعمللها return
            foreach ($weekDays as $index => $day) // بمشي عايام الاسبوع كلها
            {
                $parent_id = ''; // اذا كان في للصف بيرنت للحادي عشر والثاني عشر
                $className = '';
                $subjectName = '';
                $programName = '';
                $parent_name = '';
                $thisDayTime = $time['start'].$day;
                foreach ($this->time_start as $key => $value)
                {
                    // بجيب البيانات هنا والوقت المناسب للفحص
                    if($key == $thisDayTime) {
                        $this->thisTime = $value; // الوقت الي جاي من الداتا بيز
                        $currentTimeData = $broadcast_times->where('day', $day)->where('start_time', $value->start_time)->first();
                        if($currentTimeData)
                        {
                            if ($currentTimeData->program_id != null) {
                                $programName = $currentTimeData->program->name;

                            }
                            elseif ($currentTimeData->grade_id != null) {
                                if ($currentTimeData->grade->parent_id != null) {
                                    $parent_id = $currentTimeData->grade->parent_id;
                                    $parent_name = $currentTimeData->grade->parent_name_ar;
                                } else {
                                    $parent_id = null;
                                    $parent_name = null;
                                }
                                $className = $currentTimeData->grade->name_ar;
                                $subjectName = $currentTimeData->subject->name_ar;
                            }

                            $start = date($currentTimeData->start_time) < 12 ? date('h:i ص',strtotime($currentTimeData->start_time)) : date('h:i م',strtotime($currentTimeData->start_time));
                            $end = date($currentTimeData->end_time) < 12 ? date('h:i ص',strtotime($currentTimeData->end_time)) : date('h:i م',strtotime($currentTimeData->end_time));
                            array_push($broadcastTableData[$timeText], [
                                'class_name' => $className,
                                'subject_name' => $subjectName,
                                'parent_id' => $parent_id,
                                'parent_name' => $parent_name,
                                'broadcastType' => $currentTimeData->broadcast_type->name,
                                'programName' => $programName,
                                //'start' => date("h:i", strtotime($currentTimeData->start_time)),
                                'start' => $start,
                                //'end' => date("h:i", strtotime($currentTimeData->end_time)),
                                'end' => $end,
                                'rowspan' => round($currentTimeData->difference / 30),
                                'have_span' => $this->haveSpan,
                                'day' => $currentTimeData->day,
                            ]);
                        }
                        else {
                            $previousTimeData = $broadcast_times->where('day', $day)->where('start_time', $this->prevTimeStart)->first();
                            if ($previousTimeData) {
                                if ($previousTimeData->difference / 30 == 2) {
                                    $this->haveSpan = 1;
                                } else {
                                    $this->haveSpan = 0;
                                }
                            } else {
                                $this->haveSpan = 0;
                            }
                            array_push($broadcastTableData[$timeText], [
                                'value' => 1,
                                'have_span' => $this->haveSpan,
                                'day' => $day,
                            ]);
                        }
                    }
                        /*}*/
                       /* elseif(!$currentTimeData)
                        {
                            //اذا مافي بيانات وهادا الحقل فاضي
                            $previousTimeData = $broadcast_times->where('day', $day)->where('start_time', $this->prevTimeStart)->first();
                            if ($previousTimeData) {
                                if ($previousTimeData->difference / 30 == 2) {
                                    $this->haveSpan = 1;
                                } else {
                                    $this->haveSpan = 0;
                                }
                            } else {
                                $this->haveSpan = 0;
                            }
                            array_push($broadcastTableData[$timeText], [
                                'value' => 1,
                                'have_span' => $this->haveSpan,
                                'day' => $day,
                            ]);
                        }*/
                    /*}*/

                }
                /*$previousTimeData = $broadcast_times->where('day', $day)->where('start_time', $this->prevTimeStart)->first(); //بجوف اذا فيه بيانات في الوقت السابق ليفحص اذا ماخد rowspan ولا لا
                if ($previousTimeData)
                {
                    if ($previousTimeData->difference / 30 == 2)
                    {
                        $this->haveSpan = 1;
                    }
                    else
                    {
                        $this->haveSpan = 0;
                    }
                }
                else
                {
                    $this->haveSpan = 0;
                }*/

            }
            $this->prevTimeStart = $this->thisTime ;
        }
        return $broadcastTableData;
    }
}
