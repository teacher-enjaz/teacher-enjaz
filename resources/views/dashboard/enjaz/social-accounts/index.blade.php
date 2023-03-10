@extends('dashboard.layouts.enjaz-layouts.layout')

@section('title'){{__('enjaz.socialAccounts')}} | {{__('enjaz.teacherEnjaz')}}@endsection

@section('content')
    <div class="container file_view mt-5 profile cpanel">
        <div class="d-flex flex-column video-show mt-3 order-0 card-body">
            <div class="row d-flex justify-content-center">
                <div class="col-md-4 col-9 d-flex flex-column justify-content-sm-center justify-content-md-center text-center"
                     style="background-color: #109f99; color: white !important; border-radius: 0px 0px 56px 56px;
                     position: relative; top: -32px;">
                    <h4 class="my-auto text-white size-18 py-2" >{{__('enjaz.enjazCpanel')}}</h4>
                </div>
            </div>
        </div>
        <div class="d-flex">
            @include('dashboard.layouts.enjaz-sidebar')
            <div class="main-content" style="width: 90%;">
                <div class=" d-flex justify-content-center">
                    <div class="container-fluid ">
                        <!-- educational data  -->
                        <section class="row section">
                            <!-- experience data start -->
                            <!-- Page Heading -->
                            <div class="section-title mb-2 ">
                                <h1 class="h3 mb-0 text-gray-800">{{__('enjaz.socialAccounts')}}</h1>
                                <p class="section-hint">
                                    {{__('enjaz.addAccountsEnjazCpanel')}}
                                </p>
                            </div>

                            <div class="d-flex justify-content-between align-items-center">
                                <a href="" class="custom-btn add-btn mt-2 create-btn"
                                   data-bs-toggle="modal"
                                   data-bs-target="#add-accounts-eModal">
                                    <i class="fas fa-plus"></i>
                                </a>
                                <div class="toggle-flip toggle-flip-section ms-4">
                                    <label>
                                        <input type="checkbox" checked>
                                        <span class="flip-indecator"
                                              data-toggle-on="?????? ???? ?????? ??????????????"
                                              data-toggle-off=" ?????????? ???? ?????? ??????????????">
                                        </span>
                                    </label>
                                </div>
                            </div>
                            <!-- DataTales Example -->
                        <div class="card shadow my-4 p-0">
                            <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-primary">{{__('enjaz.socialAccounts')}}</h6>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-hover table-bordered display" id="sampleTable" width="100%" cellspacing="" style="border-collapse:collapse;">
                                        <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>{{__('enjaz.platformName')}}</th>
                                            <th>{{__('enjaz.socialAccountLink')}}</th>
                                            <th>{{__('enjaz.actions')}}</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @if($social_accounts->count() > 0)
                                            @foreach($social_accounts as $index=>$social_account)
                                                <tr>
                                                    <td>{{$index + 1}}</td>
                                                    <td>{{$social_account->social_platform->name}}</td>
                                                    <td>{{$social_account->link}}</td>
                                                    <td class="d-flex justify-content-center">
                                                        <div class="toggle-flip">
                                                            <label>
                                                                <input type="checkbox" data-id="{{$social_account->id}}"
                                                                       {{ $social_account->status ? 'checked' : '' }}
                                                                       class="account-status">
                                                                <span class="flip-indecator"
                                                                      data-toggle-on="{{__('enjaz.published')}}"
                                                                      data-toggle-off="{{__('enjaz.unpublished')}}">
                                                                    </span>
                                                            </label>
                                                        </div>
                                                        <a href="" class="edit-btn ms-1" data-bs-toggle="modal"
                                                           data-id="{{$social_account->id}}"
                                                           data-bs-target="#edit-account-eModal" id="edit"
                                                           data-bs-html="true" title="{{__('enjaz.update')}}">
                                                            <i class="fas fa-edit"></i>
                                                        </a>
                                                        <a class="delete-btn mb-2 delete-trashed" type="button"
                                                           href="{{route('social-accounts.destroy',$social_account->id)}}">
                                                            <i class="fa fa-trash"></i>
                                                        </a>
                                                  </td>
                                              </tr>
                                          @endforeach
                                      @endif
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                            <!-- experience data end -->
                        </section>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('dashboard.enjaz.social-accounts.create')
    @include('dashboard.enjaz.social-accounts.edit')
@endsection
@section('script')
    <script type="text/javascript" src="{{asset('template/js/plugins/jquery.dataTables.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('template/js/generalScript.js')}}"></script>
    <script src="{{asset('enjaz/js/social-accounts.js')}}"></script>
@endsection
