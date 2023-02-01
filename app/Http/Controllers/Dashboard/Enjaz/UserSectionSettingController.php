<?php

namespace App\Http\Controllers\Dashboard\Enjaz;

use App\Http\Controllers\Controller;
use App\Http\Requests\Enjaz\UserQualificationRequest;
use App\Models\Enjaz\GraduatedCountry;
use App\Models\Enjaz\Qualification;
use App\Models\Enjaz\Specialization;
use App\Models\Enjaz\University;
use App\Models\Enjaz\UserQualification;
use Illuminate\Support\Facades\DB;
use SAML2\Request;

class UserSectionSettingController extends Controller
{
    /**
     *
     */
    public function index()
    {

    }

    /**
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

    }

    /**
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

    }

    /**
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserQualificationRequest $request, $id)
    {

    }

    /**
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

    }

}
