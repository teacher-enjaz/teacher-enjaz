<?php

namespace App\Http\Traits;

use App\Models\Rawafed\Grade;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

trait GeneralTrait
{

    /**
     * @param $request
     * @return mixed
     */
    public function changeStatus($request)
    {
        if (!$request->has('status'))
            return $request->request->add(['status' => 0]);
        else
            return $request->request->add(['status' => 1]);
    }

    public function scientificMaterial($request)
    {
        if (!$request->has('scientific_material'))
            return $request->request->add(['scientific_material' => 0]);
        else
            return $request->request->add(['scientific_material' => 1]);
    }

    /**
     * save image in folder
     * @param $image
     * @param $folder
     * @return string
     */
    public function saveNewImage($image,$folder)
    {
        $imageName = time().rand(1,100).'.'.$image->extension();
        $image->storeAs('/public/'.$folder,$imageName);
        return $imageName;
    }

    public function saveImage($image,$folder)
    {
        $imageName = time().rand(1,100).'.'.$image->extension();
        $image->storeAs('/public/'.$folder,$imageName);
        if($image->getSize() > 1048576)
        {
            $img = Image::make(storage_path('app/public/news/'.$imageName))->widen(1000);
            $img->save(storage_path('app/public/news/'.$imageName));
        }
        return $imageName;
    }
    /************************** functions for scripts *********************************/
    /**
     * @param $id
     * @return JsonResponse
     */
    public function getDirectorates($id)
    {
        // Fetch Directorates by geoPlace_id
        $directorates['data'] = $this->directorateRepository->getDirectorateByGeoPlace($id);

        return response()->json($directorates);
    }

    /**
     * @param $id
     * @return JsonResponse
     * get all schools for script
     */
    public function getSchools($id)
    {
        // Fetch schools by directorate_id
        $schools['data'] = $this->schoolRepository->getSchoolByDirectorate($id);

        return response()->json($schools);
    }

    /**
     * get active subjects for book
     * @param $id
     * @return JsonResponse
     */
    public function getSubjects($id)
    {
        $grade=$this->gradeRepository->getGradeId($id);
        $subjects['data'] =$grade->subject;
        return response()->json($subjects);
    }

    public function getBranches($id)
    {
        $grade=$this->gradeRepository->getGradeId($id);
        if($grade->parent_id != null)
        {
            $branches['data'] =Grade::where('parent_id',$grade->parent_id)->where('id','!=',$grade->id)->get();
            return response()->json($branches);
        }
    }

    /**
     * get active semesters for fileMaterial
     * @return JsonResponse
     */
    public function getSemesters()
    {
        $semesters['semester'] = $this->semesterRepository->getActiveSemester();
        return response()->json($semesters);
    }

    /**
     * get active semesters for fileMaterial
     * @return JsonResponse
     */
    public function getFileCategories()
    {
        $fileCategories['fileCat'] = $this->fileCategoryRepository->getActiveFileCategory();
        return response()->json($fileCategories);
    }
    /**
     * @param $id
     * @return JsonResponse
     */
    public function getLessons($id)
    {
        $data['data'] = $this->lessonRepository->getLessonsByUnit($id);

        return response()->json($data);
    }

    /**
     * @param $directorate_id
     * @return JsonResponse
     */
    public function getUsers($directorate_id)
    {
        $data['data'] = $this->userRepository->getUsers($directorate_id);

        return response()->json($data);
    }

    /**
     * @param $grade_id
     * @param $subject_id
     * @param $semester_id
     * @return JsonResponse
     */
    public function getUnits($grade_id,$subject_id,$semester_id)
    {
        $grade_subject = $this->gradeSubjectRepository->getGradeSubjectId($grade_id,$subject_id);
        if(count($grade_subject->units) == 0)
        {
            $data = $this->gradeSubjectRepository->getUnits($grade_id, $subject_id, $semester_id);
            return response()->json($data);
        }
        else
        {
            $data = $this->gradeSubjectRepository->getBranchUnits($grade_id, $subject_id, $semester_id);
            return response()->json($data);
        }
    }

    /**
     * @param $role_id
     * @return JsonResponse
     */
    public function getPermissions($role_id)
    {
        $permissions['data'] = $this->permissionRepository->allPermissions();
        $permissionsRole = $this->roleRepository->getRoleId($role_id);
        $permissions['role'] = $permissionsRole->permission->pluck('id')->toArray();
        return response()->json($permissions);
    }

    /**
     * @param $id
     * @return RedirectResponse
     */
    public function deleteFileFromDB($id,$folder)
    {
        $file = $this->resourceFileRepository->getResourceFileId($id);
        $deletedFile = $this->resourceFileRepository->deleteFileFromDB($id,$file->name,$folder);
        if($deletedFile)
            return redirect()->back();
    }

    /*public function getBaseDriveUrl($url)
    {
        $path = (string) $url;
        return Str::substr($path,-16);
    }*/

    /****************************** Laboratories ****************************************/

    public function getScienceSubjects($id)
    {
        $grade = $this->gradeRepository->getGradeId($id);
        $subjects['data'] = $grade->subject->where('scientific_material',1);
        return response()->json($subjects);
    }
}
